<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Estabelecimento;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Gera sitemaps ultraleves em XML puro para a região Norte/Nordeste';

    public function handle()
    {
        // OTIMIZAÇÃO DE MEMÓRIA CRÍTICA
        ini_set('memory_limit', '2G'); 
        DB::disableQueryLog(); 

        $this->info('Iniciando geração de Sitemaps Ultraleves (XML)...');

        $sitemapDir = public_path('sitemaps');
        if (!File::exists($sitemapDir)) {
            File::makeDirectory($sitemapDir, 0755, true);
        }

        // Limpa sitemaps antigos para não acumular lixo caso o número de arquivos diminua/aumente
        File::cleanDirectory($sitemapDir);

        $estadosAlvo = [
            'AC', 'AP', 'AM', 'PA', 'RO', 'RR', 'TO', // Norte
            'AL', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'RN', 'SE' // Nordeste
        ];
        
        // REDUZIDO PARA 15.000: Arquivos menores são lidos muito mais rápido pelo Googlebot
        $limitPerFile = 50000; 
        $currentFileNumber = 1;
        $urlBuffer = [];
        $baseUrl = 'https://www.cnpjnacional.com';

        $this->info('Contando total de empresas...');
        $totalEmpresas = Estabelecimento::whereIn('uf', $estadosAlvo)
            ->where('situacao_cadastral', '02')
            ->count();

        $this->info("Total de empresas: {$totalEmpresas}");
        
        if ($totalEmpresas === 0) {
            $this->error('Nenhuma empresa encontrada.');
            return;
        }

        $bar = $this->output->createProgressBar($totalEmpresas);
        $bar->start();

        $query = Estabelecimento::select('cnpj_basico', 'cnpj_ordem', 'cnpj_dv')
            ->whereIn('uf', $estadosAlvo)
            ->where('situacao_cadastral', '02')
            ->toBase(); 

        $dataPadrao = date('Y-m-d');

        foreach ($query->cursor() as $empresa) {
            $cnpj = $empresa->cnpj_basico . $empresa->cnpj_ordem . $empresa->cnpj_dv;
            $loc = "{$baseUrl}/cnpj/{$cnpj}";
            
            // Adiciona a string minificada ao array
            $urlBuffer[] = $this->formatUrlTag($loc, $dataPadrao);

            $bar->advance();

            if (count($urlBuffer) >= $limitPerFile) {
                $bar->clear(); 
                $this->saveSitemapFile($sitemapDir, $currentFileNumber, $urlBuffer);
                $bar->display(); 

                $urlBuffer = []; 
                $currentFileNumber++;
                
                gc_collect_cycles(); 
            }
        }

        if (!empty($urlBuffer)) {
            $bar->clear();
            $this->saveSitemapFile($sitemapDir, $currentFileNumber, $urlBuffer);
            $bar->display();
        } else {
            $currentFileNumber--; 
        }

        $bar->finish();
        $this->newLine();

        $this->generateSitemapIndex($currentFileNumber, $baseUrl, $dataPadrao);

        $this->info("CONCLUÍDO! Sitemaps ultraleves gerados com sucesso.");
    }

    private function saveSitemapFile($dir, $number, $urls)
    {
        $filename = "sitemap_{$number}.xml";
        
        // Monta o XML de forma compacta (sem espaços sobrando)
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        // Implode usando apenas uma quebra de linha simples
        $content .= implode("\n", $urls) . "\n";
        $content .= '</urlset>';

        // Salva diretamente o conteúdo em texto puro sem compressão
        File::put("{$dir}/{$filename}", $content);
        $this->info("Arquivo gerado: {$filename}");
    }

    private function generateSitemapIndex($totalFiles, $baseUrl, $lastmod)
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        for ($i = 1; $i <= $totalFiles; $i++) {
            $content .= "<sitemap><loc>{$baseUrl}/sitemaps/sitemap_{$i}.xml</loc><lastmod>{$lastmod}</lastmod></sitemap>\n";
        }

        $content .= '</sitemapindex>';

        File::put(public_path('sitemap_index.xml'), $content);
    }

    /**
     * formatação extrema: apenas o que o google realmente usa.
     */
    private function formatUrlTag($loc, $lastmod)
    {
        // Sem changefreq, sem priority, sem espaços. Puro e direto.
        return "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod></url>";
    }
}