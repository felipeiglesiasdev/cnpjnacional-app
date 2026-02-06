<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use App\Models\Empresa;
use App\Models\SolicitacaoRemocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemocaoController extends Controller
{
    // EXIBE O FORMULÁRIO DE REMOÇÃO
    public function show($cnpj)
    {
        // LIMPA O CNPJ PARA GARANTIR APENAS NÚMEROS
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj); 
        // BUSCA O ESTABELECIMENTO (FILIAL OU MATRIZ)
        $estabelecimento = Estabelecimento::where('cnpj_basico', substr($cnpjLimpo, 0, 8))
            ->where('cnpj_ordem', substr($cnpjLimpo, 8, 4))
            ->where('cnpj_dv', substr($cnpjLimpo, 12, 2))
            ->first();
        // CARREGA A EMPRESA PARA PEGAR A RAZÃO SOCIAL
        $empresa = Empresa::where('cnpj_basico', $estabelecimento->cnpj_basico)->first(); 
        $razaoSocial = $empresa ? $empresa->razao_social : 'RAZÃO SOCIAL NÃO INFORMADA';
        // FORMATA O CNPJ PARA EXIBIÇÃO
        $cnpjFormatado = $estabelecimento->cnpj_completo_formatado;
        // RETORNA DADOS PRA VIEW
        return view('remocao.create', [
            'cnpj_limpo' => $cnpjLimpo,
            'cnpj_formatado' => $cnpjFormatado,
            'razao_social' => $razaoSocial
        ]);
    }

    // PROCESSA A REMOÇÃO DO CNPJ
    public function store(Request $request, $cnpj)
    {
        // VALIDAÇÃO RIGOROSA DOS CHECKBOXES
        $request->validate([
            'termos_publicos' => 'required|accepted',
            'termos_google' => 'required|accepted',
        ], [
            'termos_publicos.accepted' => 'Você precisa confirmar que entende a origem pública dos dados.',
            'termos_google.accepted' => 'Você precisa confirmar que entende o prazo de atualização do Google.',
        ]);

        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj); // LIMPA O CNPJ

        // INICIA TRANSAÇÃO PARA GARANTIR INTEGRIDADE (LOGAR PRIMEIRO, APAGAR DEPOIS)
        DB::transaction(function () use ($cnpjLimpo, $request) {
            
            // 1. BUSCA OS DADOS NOVAMENTE PARA GARANTIR EXISTÊNCIA
            $estabelecimento = Estabelecimento::where('cnpj_basico', substr($cnpjLimpo, 0, 8))
                ->where('cnpj_ordem', substr($cnpjLimpo, 8, 4))
                ->where('cnpj_dv', substr($cnpjLimpo, 12, 2))
                ->first();

            if ($estabelecimento) {
                $empresa = Empresa::where('cnpj_basico', $estabelecimento->cnpj_basico)->first();
                $razaoSocial = $empresa ? $empresa->razao_social : 'PROCESSADO_PELO_SISTEMA';

                // 2. REGISTRA O LOG NA TABELA DE CONTROLE (BANCO CNPJNACIONAL_LARAVEL)
                SolicitacaoRemocao::create([
                    'cnpj' => $cnpjLimpo,
                    'razao_social' => $razaoSocial,
                    'ip_solicitante' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'aceitou_termos_dados_publicos' => true,
                    'aceitou_termos_google' => true,
                ]);

                // 3. APAGA O REGISTRO DA TABELA DE ESTABELECIMENTOS (HARD DELETE)
                $empresa->delete();
            }
        });

        // REDIRECIONA PARA HOME COM MENSAGEM DE SUCESSO
        return redirect()->route('home')->with('success_remocao', 'Solicitação processada com sucesso. Os dados foram removidos da nossa base.');
    }
}