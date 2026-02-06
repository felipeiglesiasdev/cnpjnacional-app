@extends('layouts.app')

@section('content')
<div class="bg-brand-cream min-h-screen py-16 flex items-center justify-center">
    <div class="container mx-auto px-4 max-w-2xl">
        
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header Vermelho -->
            <div class="bg-red-50 p-8 border-b border-red-100 text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center text-red-600 mx-auto mb-4 shadow-sm">
                    <i class="bi bi-trash3-fill text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-red-700">Remoção Automática de Dados</h1>
                <p class="text-red-600/80 text-sm mt-2 max-w-md mx-auto">
                    Área exclusiva para titulares de CNPJ. O processo é irreversível e imediato em nossa base.
                </p>
            </div>

            <div class="p-8 md:p-10">
                <form action="{{ route('remocao.store', $cnpj_limpo) }}" method="POST">
                    @csrf

                    <!-- Dados da Empresa (Readonly) -->
                    <div class="space-y-6 mb-8">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">CNPJ (Somente Leitura)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <i class="bi bi-hash"></i>
                                </div>
                                <input type="text" value="{{ $cnpj_formatado }}" readonly class="w-full bg-gray-50 border border-gray-200 text-gray-500 text-lg font-mono rounded-xl py-3 pl-10 pr-4 focus:ring-0 focus:border-gray-200 cursor-not-allowed select-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Razão Social (Somente Leitura)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <i class="bi bi-building"></i>
                                </div>
                                <input type="text" value="{{ $razao_social }}" readonly class="w-full bg-gray-50 border border-gray-200 text-gray-500 font-medium rounded-xl py-3 pl-10 pr-4 focus:ring-0 focus:border-gray-200 cursor-not-allowed select-none">
                            </div>
                        </div>
                    </div>

                    <!-- Termos de Ciência (Checkboxes Obrigatórios) -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 space-y-5 mb-8">
                        <h3 class="text-[#013886] font-bold text-sm flex items-center gap-2">
                            <i class="bi bi-check-all text-lg"></i> Termos de Ciência
                        </h3>

                        <!-- Termo 1: Dados Públicos -->
                        <div class="flex items-start gap-3">
                            <div class="flex h-6 items-center">
                                <input id="termos_publicos" name="termos_publicos" type="checkbox" required class="h-5 w-5 rounded border-gray-300 text-[#013886] focus:ring-[#013886] cursor-pointer">
                            </div>
                            <div class="text-sm leading-relaxed">
                                <label for="termos_publicos" class="font-medium text-gray-700 cursor-pointer">
                                    Compreendo a natureza pública dos dados
                                </label>
                                <p class="text-gray-500 mt-1 text-xs">
                                    Declaro estar ciente de que o <strong>CNPJ Nacional</strong> utiliza apenas dados públicos fornecidos pela Receita Federal, conforme permitido pela legislação brasileira. Entendo que o site não divulga dados sigilosos (como quadro societário completo com endereços residenciais) e que o endereço comercial já é exibido de forma parcial.
                                </p>
                            </div>
                        </div>

                        <!-- Termo 2: Google Cache -->
                        <div class="flex items-start gap-3">
                            <div class="flex h-6 items-center">
                                <input id="termos_google" name="termos_google" type="checkbox" required class="h-5 w-5 rounded border-gray-300 text-[#013886] focus:ring-[#013886] cursor-pointer">
                            </div>
                            <div class="text-sm leading-relaxed">
                                <label for="termos_google" class="font-medium text-gray-700 cursor-pointer">
                                    Estou ciente sobre o Google e Mecanismos de Busca
                                </label>
                                <p class="text-gray-500 mt-1 text-xs">
                                    Entendo que ao remover os dados aqui, a página deixará de existir no site <strong>imediatamente</strong>. No entanto, compreendo que o Google e outros buscadores podem levar <strong>até 15 dias ou mais</strong> para atualizar seus índices e remover o resultado do cache, e que o CNPJ Nacional não possui controle sobre esse processo externo.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Mensagem de Erro (Validação) -->
                    @if ($errors->any())
                        <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-2">
                            <i class="bi bi-exclamation-circle-fill mt-0.5"></i>
                            <div>
                                <span class="font-bold">Atenção:</span>
                                Você precisa aceitar todos os termos acima para prosseguir.
                            </div>
                        </div>
                    @endif

                    <!-- Botão de Ação -->
                    <button type="submit" class="cursor-pointer w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-red-200 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3">
                        <i class="bi bi-trash3"></i>
                        Confirmar Exclusão Definitiva
                    </button>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ url()->previous() }}" class="text-sm text-gray-400 hover:text-gray-600 underline decoration-dotted">Cancelar e voltar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection