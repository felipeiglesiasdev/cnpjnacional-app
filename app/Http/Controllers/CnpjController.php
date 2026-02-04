<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Estabelecimento;
use App\Models\Cnae;
use App\Models\SolicitacaoRemocao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CnpjController extends Controller
{

    // FUNÇÃO UTILIZADA PARA ENCONTRAR UM ESTABELECIMENTO VÁLIDO, VERIFICAR SE EXISTE NA TABELA 'estabelecimentos'
    private function findValidEstabelecimento(string $cnpj): ?Estabelecimento
    {
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        /*
        if (SolicitacaoRemocao::where('cnpj', $cnpjLimpo)->exists()) {
            return null;
        }*/

        $cnpjBase = substr($cnpjLimpo, 0, 8);
        $cnpjOrdem = substr($cnpjLimpo, 8, 4);
        $cnpjDv = substr($cnpjLimpo, 12, 2);
        $estabelecimento = Estabelecimento::where('cnpj_basico', $cnpjBase)->where('cnpj_ordem', $cnpjOrdem)->where('cnpj_dv', $cnpjDv)->first();
        return $estabelecimento;
    }
    //################################################################################################
    //################################################################################################
    // FUNÇÃO PARA PROCESSAR O FORMULÁRIO DE CONSULTA
    // SE ENCONTRAR, REIRECIONA, SE NÃO, VOLTA O ERRO PRO POPUP
    public function consultar(Request $request): RedirectResponse
    {
        $request->validate(['cnpj' => 'required|string|max:18'], [
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.string' => 'O CNPJ deve ser um texto.',
            'cnpj.max' => 'O CNPJ não pode ter mais que 18 caracteres.',
        ]);
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $request->input('cnpj'));
        if (strlen($cnpjLimpo) !== 14) {
            return redirect()->back()->withInput($request->only('cnpj'))->with('error', 'CNPJ inválido. Por favor, digite os 14 números do CNPJ.');
        }
        $estabelecimento = $this->findValidEstabelecimento($cnpjLimpo);
        // Se encontrou o estabelecimento...
        if ($estabelecimento) {
            // Pega a empresa relacionada (já deve estar carregada ou será lazy loaded)
            $empresa = $estabelecimento->empresa()->first(); // Garante que temos o objeto Empresa
            return redirect()->route('cnpj.show', ['cnpj' => $cnpjLimpo])
                             ->with([
                                 'found_estabelecimento' => $estabelecimento,
                                 'found_empresa' => $empresa 
                             ]);
        } 
        // Se não encontrou...
        else {
            return redirect()->back()
                             ->withInput($request->only('cnpj')) 
                             ->with('error', 'CNPJ não encontrado em nossa base de dados.');
        }
    }
    //################################################################################################
    //################################################################################################
    // FUNÇÃO QUE EXIBE RETORNANDO OS DADOS DA EMPRESA PARA VIEW
    public function show(string $cnpj): View
    {
        // GARANTE A LIMPEZA DO CNPJ
        $cnpjApenasNumeros = preg_replace('/[^0-9]/', '', $cnpj);
        //------------------------------------------------------------------------------------------
        // VERIFICA SE O CNPJ TA NA LISTA DE REMOVIDOS
        /*
        if (SolicitacaoRemocao::where('cnpj', $cnpjApenasNumeros)->exists()) {
            abort(404);
        }*/
        //------------------------------------------------------------------------------------------
        if (session()->has('found_estabelecimento') && session()->has('found_empresa')) {
            $estabelecimento = session('found_estabelecimento');
            $empresa = session('found_empresa');
            $empresa->load('socios.qualificacao'); 
            $estabelecimento->loadMissing('municipioRel'); 
        } 
        else {
            // Busca o estabelecimento específico
            $estabelecimento = Estabelecimento::where('cnpj_basico', substr($cnpjApenasNumeros, 0, 8))
                                    ->where('cnpj_ordem', substr($cnpjApenasNumeros, 8, 4))
                                    ->where('cnpj_dv', substr($cnpjApenasNumeros, 12, 2))
                                    ->with('municipioRel')
                                    ->first();
            // Busca a empresa e carrega as relações
            $empresa = Empresa::with('socios.qualificacao', 'naturezaJuridica')->find(substr($cnpjApenasNumeros, 0, 8));
        }
        //------------------------------------------------------------------------------------------
        if (!$estabelecimento || !$empresa) {
            abort(404);
        }
        //------------------------------------------------------------------------------------------
        $situacao = $this->traduzirSituacaoCadastral($estabelecimento->situacao_cadastral);             // SITUAÇÃO CADASTRAL
        $cnaePrincipal = Cnae::find($estabelecimento->cnae_fiscal_principal);                           // CNAE PRINCIPAL
        $cnaesSecundarios = [];                                                                         // CNAEs SECUNDÁRIOS
        if (!empty($estabelecimento->cnae_fiscal_secundaria)) {
            $codigosSecundarios = explode(',', $estabelecimento->cnae_fiscal_secundaria);
            $cnaeObjects = Cnae::whereIn('codigo', $codigosSecundarios)->get();
            $cnaesSecundarios = $cnaeObjects->map(function ($cnae) {
                return [
                    'codigo' => $this->formatarCnae($cnae->codigo),
                    'descricao' => $cnae->descricao
                ];
            })->toArray();
        }
        $nomeMunicipio = $estabelecimento->municipioRel->descricao;                      // NOME MUNICIPIO (MAISCULO)
        $cidadeUf = trim($nomeMunicipio . ' / ' . $estabelecimento->uf);                 // CIDADE / UF
        $empresasSemelhantes = $this->findSimilarCompanies($estabelecimento);            // EMPRESAS SEMELHANTES
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $empresa->razao_social,
            'foundingDate' => $estabelecimento->data_inicio_atividade,
            'legalName' => $empresa->razao_social,
            'url' => url()->current(),
            'vatID' => $cnpjApenasNumeros,
        ];


        $metaData = [
            //VIVA ON BENEFICIOS, TECNOLOGIA E SERVICOS LTDA - 57.728.744/0001-44
            'title' => $empresa->razao_social . ' - CNPJ ' . $this->formatarCnpj($cnpjApenasNumeros),
            'description' => 'Veja detalhes sobre a empresa ' . $empresa->razao_social . ', inscrita no CNPJ ' . $this->formatarCnpj($cnpjApenasNumeros) .', endereço, atividades e situação cadastral.',
            'keywords' => implode(', ', array_filter([
                $cnpjApenasNumeros,
                $this->formatarCnpj($cnpjApenasNumeros),
                $empresa->razao_social,
                $estabelecimento->nome_fantasia,
                'cnpj ' . $this->formatarCnpj($cnpjApenasNumeros),
                'consulta cnpj',
            ]))
        ];

        $dadosParaExibir = [
            'cnpj_completo' => $this->formatarCnpj($cnpjApenasNumeros),
            'cnpj_limpo' => $cnpjApenasNumeros,
            'razao_social' => $empresa->razao_social,
            'nome_fantasia' => $estabelecimento->nome_fantasia,
            'natureza_juridica' => $empresa->naturezaJuridica->descricao ?? 'Não informado',
            'capital_social' => number_format($empresa->capital_social, 2, ',', '.'),
            'porte' => $this->traduzirPorte($empresa->porte_empresa),
            'matriz_ou_filial' => $estabelecimento->identificador_matriz_filial == 1 ? 'Matriz' : 'Filial',
            'data_abertura' => date('d/m/Y', strtotime($estabelecimento->data_inicio_atividade)),
            // Card: Situação Cadastral (NOVOS DADOS)
            'situacao_cadastral' => $situacao['texto'],
            'situacao_cadastral_classe' => $situacao['classe'],
            'data_situacao_cadastral' => date('d/m/Y', strtotime($estabelecimento->data_situacao_cadastral)),
            // Card: Atividades Econômicas (DADOS ATUALIZADOS)
            'cnae_principal' => [
                'codigo' => $cnaePrincipal ? $this->formatarCnae($cnaePrincipal->codigo) : 'Não informado',
                'descricao' => $cnaePrincipal->descricao ?? 'Não informado'
            ],
            'cnaes_secundarios' => $cnaesSecundarios,
            // Card: Endereço (NOVOS DADOS)
            'cidade_uf' => $cidadeUf,
            'cidade' => $nomeMunicipio,
            'empresas_semelhantes' => $empresasSemelhantes,
            'structured_data' => $structuredData,
            'meta_data' => $metaData
        ];
        return view('cnpj.cnpj-show', ['data' => $dadosParaExibir]);
    }
    
    private function findSimilarCompanies(Estabelecimento $estabelecimento): array
    {
        $cnaePrincipal = $estabelecimento->cnae_fiscal_principal;
        $municipio = $estabelecimento->municipio;
        $situacao_cadastral = $estabelecimento->situacao_cadastral;
        $uf = $estabelecimento->uf;
        $cnpjBaseAtual = $estabelecimento->cnpj_basico;
        $limit = 6;


        // ETAPA 1: Busca na mesma CIDADE
        $semelhantesNaCidade = Estabelecimento::where('municipio', $municipio)
            ->where('situacao_cadastral', '=', 2)
            ->where('cnae_fiscal_principal', $cnaePrincipal)
            ->where('cnpj_basico', '!=', $cnpjBaseAtual)
            ->with('empresa:cnpj_basico,razao_social')
            ->limit($limit)
            ->get();
            
        if ($semelhantesNaCidade->count() >= $limit) {
            return $this->formatSimilarCompanies($semelhantesNaCidade);
        }

        // ETAPA 2: Busca no ESTADO para completar
        $necessarios = $limit - $semelhantesNaCidade->count();
        $cnpjsJaEncontrados = $semelhantesNaCidade->pluck('cnpj_basico')->push($cnpjBaseAtual);
        $semelhantesNoEstado = Estabelecimento::where('uf', $uf)
            ->where('situacao_cadastral', '=', 2)
            ->where('cnae_fiscal_principal', $cnaePrincipal)
            ->whereNotIn('cnpj_basico', $cnpjsJaEncontrados)
            ->with('empresa:cnpj_basico,razao_social')
            ->limit($necessarios)
            ->get();
        $empresasSemelhantes = $semelhantesNaCidade->merge($semelhantesNoEstado);
        return $this->formatSimilarCompanies($empresasSemelhantes);
    }


    private function formatSimilarCompanies($collection): array
    {
        return $collection->map(function ($est) {
            $cnpjCompleto = $est->cnpj_basico . $est->cnpj_ordem . $est->cnpj_dv;
            return [
                'cnpjCompleto' => $est->cnpj_basico . $est->cnpj_ordem . $est->cnpj_dv,
                'cnpjCompletoFormatado' => $this->formatarCnpj($cnpjCompleto),
                'razao_social' => $est->empresa->razao_social,
                'cidade_uf' => ($est->municipioRel->descricao ?? '') . ' / ' . $est->uf,
                'url' => route('cnpj.show', ['cnpj' => $cnpjCompleto]),
            ];
        })->toArray();
    }

    // ###########################################################################################################################
    private function formatarCep(string $cep): string
    {
        $cepLimpo = preg_replace('/[^0-9]/', '', $cep);
        if (strlen($cepLimpo) === 8) {
            return vsprintf('%s%s.%s%s%s-%s%s%s', str_split($cepLimpo));
        }
        return $cep;
    }
    // ###########################################################################################################################
    // FUNÇÃO FORMATAR CNAE
    private function formatarCnae(string $codigo): string
    {
        // 1. Remove qualquer caractere que não seja um dígito
        $codigoLimpo = preg_replace('/\D/', '', $codigo);

        // 2. Se o código tiver 6 dígitos, adiciona um zero à esquerda para normalizar.
        if (strlen($codigoLimpo) === 6) {
            $codigoLimpo = '0' . $codigoLimpo;
        }

        // 3. Verifica se o código agora tem 7 dígitos
        if (strlen($codigoLimpo) === 7) {
            // 4. Aplica a formatação padrão XXXX-X/XX usando substr, que é mais seguro
            return substr($codigoLimpo, 0, 4) . '-' . substr($codigoLimpo, 4, 1) . '/' . substr($codigoLimpo, 5, 2);
        }

        // 5. Se o código não se encaixar no padrão, retorna o original para evitar quebrar a aplicação.
        return $codigo;
    }
    // ###########################################################################################################################
    // FUNÇÃO TRADUZIR PORTE DA EMPRESA
    private function traduzirPorte(int $codigoPorte): string
    {
        switch ($codigoPorte) {
            case 1:
                return 'Micro Empresa';
            case 3:
                return 'Empresa de Pequeno Porte';
            case 5:
                return 'Demais';
            default:
                return 'Não Informado';
        }
    }
    // ###########################################################################################################################
    // FUNÇÃO TRADUZIR SITUAÇÃO CADASTRAL
    private function traduzirSituacaoCadastral(int $codigo): array
    {
        switch ($codigo) {
            case 2:
                return ['texto' => 'ATIVA', 'classe' => 'status-active'];
            case 3:
                return ['texto' => 'SUSPENSA', 'classe' => 'status-suspended'];
            case 4:
                return ['texto' => 'BAIXADA', 'classe' => 'status-inactive'];
            case 8:
                return ['texto' => 'NULA', 'classe' => 'status-inactive'];
            default:
                return ['texto' => 'NÃO INFORMADO', 'classe' => 'status-inactive'];
        }
    }
    // ###########################################################################################################################
    // FUNÇÃO FORMATAR CNPJ
    private function formatarCnpj(string $cnpj): string
    {
        return vsprintf('%s.%s.%s/%s-%s', [
            substr($cnpj, 0, 2), substr($cnpj, 2, 3), substr($cnpj, 5, 3),
            substr($cnpj, 8, 4), substr($cnpj, 12, 2)
        ]);
    }
    // ###########################################################################################################################

}