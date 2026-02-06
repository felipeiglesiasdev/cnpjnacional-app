<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Estabelecimento;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera sitemaps em massa para empresas das regiões Norte e Nordeste em public/sitemaps';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // AJUSTE DE PERFORMANCE CRÍTICO
        ini_set('memory_limit', '2G'); // Aumenta limite para 2GB
        DB::disableQueryLog(); // Desabilita log de queries para economizar RAM

        $this->info('Iniciando geração de Sitemaps (Regiões Norte e Nordeste)...');

        // 1. Prepara o diretório
        $sitemapDir = public_path('sitemaps');
        if (!File::exists($sitemapDir)) {
            File::makeDirectory($sitemapDir, 0755, true);
            $this->info('Diretório public/sitemaps criado.');
        }

        // 2. Configurações
        // Norte + Nordeste
        $estadosAlvo = [
            'AC', 'AP', 'AM', 'PA', 'RO', 'RR', 'TO', // Norte
            'AL', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'RN', 'SE' // Nordeste
        ];
        
        $limitPerFile = 50000; // 50.000 URLs por arquivo
        $currentFileNumber = 1;
        $urlBuffer = [];
        $baseUrl = 'https://www.cnpjnacional.com';

        // 3. Contagem Total para Barra de Progresso
        $this->info('Contando total de empresas para processar...');
        
        // Count direto no banco é leve
        $totalEmpresas = Estabelecimento::whereIn('uf', $estadosAlvo)
            ->where('situacao_cadastral', '02')
            ->count();

        $this->info("Total de empresas encontradas: {$totalEmpresas}");
        
        if ($totalEmpresas === 0) {
            $this->error('Nenhuma empresa encontrada com os critérios selecionados.');
            return;
        }

        // Inicia a barra de progresso
        $bar = $this->output->createProgressBar($totalEmpresas);
        $bar->start();

        // 4. Query Otimizada com Cursor e toBase()
        // toBase() retorna stdClass em vez de Models Eloquent (Muito mais leve)
        $query = Estabelecimento::select('cnpj_basico', 'cnpj_ordem', 'cnpj_dv')
            ->whereIn('uf', $estadosAlvo)
            ->where('situacao_cadastral', '02')
            ->toBase(); 

        foreach ($query->cursor() as $empresa) {
            $cnpj = $empresa->cnpj_basico . $empresa->cnpj_ordem . $empresa->cnpj_dv;
            
            // Monta a URL manual
            $loc = "{$baseUrl}/cnpj/{$cnpj}";
            // Lastmod definido como a data atual (hoje)
            $lastmod = date('c'); 

            // Adiciona ao buffer
            $urlBuffer[] = $this->formatUrlTag($loc, $lastmod);

            // Avança a barra de progresso
            $bar->advance();

            // Se encheu o arquivo (50.000), salva e reseta
            if (count($urlBuffer) >= $limitPerFile) {
                // Pausa a barra para imprimir log limpo
                $bar->clear(); 
                $this->saveSitemapFile($sitemapDir, $currentFileNumber, $urlBuffer);
                $bar->display(); // Restaura a barra

                $urlBuffer = []; // Limpa memória
                $currentFileNumber++;
                
                // Força coleta de lixo do PHP para liberar memória
                gc_collect_cycles();
            }
        }

        // Salva o restante que sobrou no buffer
        if (!empty($urlBuffer)) {
            $bar->clear();
            $this->saveSitemapFile($sitemapDir, $currentFileNumber, $urlBuffer);
            $bar->display();
        } else {
            // Se terminou exato e incrementou, volta um para o index ficar correto
            $currentFileNumber--; 
        }

        $bar->finish();
        $this->newLine(); // Pula linha após a barra terminar

        // 5. Gera o Sitemap Index
        $this->generateSitemapIndex($currentFileNumber, $baseUrl);

        $this->info("CONCLUÍDO!");
        $this->info("Arquivos gerados em: {$sitemapDir}");
        $this->info("Index gerado em: public/sitemap_index.xml");
    }

    /**
     * Salva um arquivo sitemap_X.xml
     */
    private function saveSitemapFile($dir, $number, $urls)
    {
        $filename = "sitemap_{$number}.xml";
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        $content .= implode(PHP_EOL, $urls) . PHP_EOL;
        $content .= '</urlset>';

        File::put("{$dir}/{$filename}", $content);
        $this->info("Arquivo gerado: {$filename} (" . count($urls) . " URLs)");
    }

    /**
     * Gera o arquivo sitemap_index.xml na raiz do public
     */
    private function generateSitemapIndex($totalFiles, $baseUrl)
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $content .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        for ($i = 1; $i <= $totalFiles; $i++) {
            $content .= "  <sitemap>" . PHP_EOL;
            $content .= "    <loc>{$baseUrl}/sitemaps/sitemap_{$i}.xml</loc>" . PHP_EOL;
            $content .= "    <lastmod>" . date('c') . "</lastmod>" . PHP_EOL;
            $content .= "  </sitemap>" . PHP_EOL;
        }

        $content .= '</sitemapindex>';

        File::put(public_path('sitemap_index.xml'), $content);
        $this->info("Sitemap Index gerado com {$totalFiles} sitemaps listados.");
    }

    /**
     * Formata uma tag <url> individual
     */
    private function formatUrlTag($loc, $lastmod)
    {
        return "  <url>
    <loc>{$loc}</loc>
    <lastmod>{$lastmod}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>";
    }
}