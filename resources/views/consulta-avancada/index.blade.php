@extends('layouts.app')
@push('seo')
    @include('components.consulta-avancada.tags')
@endpush
@section('content')
<div class="bg-brand-cream min-h-screen py-12">

    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10">
                <span class="bg-[#e6fcf5] text-[#019171] text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block">
                    Ferramenta Pro
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-[#013886] mb-4">Segmentação de Mercado</h1>
                <p class="text-gray-500 text-lg font-light max-w-2xl mx-auto">
                    Utilize os filtros abaixo para encontrar empresas com precisão cirúrgica. Combine localização e atividade para gerar listas qualificadas.
                </p>
            </div>
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 overflow-hidden relative">
                <div class="h-2 w-full bg-gradient-to-r from-[#013886] via-[#019171] to-[#ffd51b]"></div>
                <form action="{{ route('consulta_avancada.search') }}" method="GET" class="p-8 md:p-12">
                    <!-- LINHA 1: Localização (Estado e Cidade) -->
                    <x-consulta-avancada.location-filter :estados="$estados" :cidadesPorEstado="$cidadesPorEstado" />
                    <!-- LINHA 2: Informações Cadastrais (Status, Natureza, Porte) -->
                    <x-consulta-avancada.informations :naturezasJuridicas="$naturezasJuridicas" />
                    <!-- LINHA 3: Atividade (CNAEs) -->
                    <x-consulta-avancada.activity-filter :cnaes="$cnaes" />
                    <!-- LINHA 4: Datas -->
                    <x-consulta-avancada.date-filter />
                    <!-- Botões de Ação -->
                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 border-t border-gray-100 pt-8">
                        <button type="reset" class="text-gray-500 font-semibold text-sm hover:text-[#013886] transition-colors px-6 py-3 cursor-pointer">
                            Limpar Filtros
                        </button>
                        <button type="submit" class="w-full md:w-auto bg-[#013886] hover:bg-[#00285f] text-white font-bold py-4 px-10 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 cursor-pointer">
                            <i class="bi bi-search"></i>
                            Buscar Empresas
                        </button>
                    </div>
                </form>
            </div>
         @if(isset($resultados) && $resultados->count() > 0)
                <div id="resultsArea" class="mt-12 animate-fade-in-up scroll-mt-24">
                    
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                        <h2 class="text-xl md:text-2xl font-bold text-[#013886] flex items-center gap-2">
                            <i class="bi bi-list-check"></i> Resultados Encontrados <span class="text-sm font-normal text-gray-500 ml-2">({{ $resultados->total() }} empresas)</span>
                        </h2>
                        
                        <!-- Aviso de Limite -->
                        <div class="inline-flex items-center gap-2 bg-yellow-50 text-yellow-700 px-3 py-1.5 rounded-lg border border-yellow-100 text-xs font-semibold">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            Limitamos essa pesquisa a somente 10 resultados
                        </div>
                    </div>

                    <div class="space-y-4">
                        @foreach($resultados as $empresa)
                            <a href="{{ route('cnpj.show', ['cnpj' => $empresa->cnpj_basico . $empresa->cnpj_ordem . $empresa->cnpj_dv]) }}" class="block bg-white p-4 md:p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#013886]/30 transition-all group text-decoration-none">
                                <div class="flex flex-col md:flex-row justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1.5">
                                            <span class="bg-blue-50 text-[#013886] text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-blue-100">
                                                {{ $empresa->identificador_matriz_filial == 1 ? 'Matriz' : 'Filial' }}
                                            </span>
                                            <span class="text-xs text-gray-400 font-mono">
                                                {{ preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $empresa->cnpj_basico . $empresa->cnpj_ordem . $empresa->cnpj_dv) }}
                                            </span>
                                        </div>
                                        <h3 class="text-base md:text-lg font-bold text-[#232323] group-hover:text-[#013886] transition-colors mb-1 leading-snug">
                                            {{ $empresa->empresa->razao_social ?? 'Razão Social Não Disponível' }}
                                        </h3>
                                        <p class="text-xs md:text-sm text-gray-500 flex items-center gap-2">
                                            <i class="bi bi-geo-alt-fill text-[#019171] text-xs"></i>
                                            {{ $empresa->municipioRel->descricao ?? 'Cidade' }} / {{ $empresa->uf }}
                                        </p>
                                    </div>
                                    <div class="flex flex-row md:flex-col justify-between items-center md:items-end mt-2 md:mt-0 border-t md:border-t-0 border-gray-50 pt-3 md:pt-0">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] md:text-xs font-semibold {{ $empresa->situacao_cadastral == '02' ? 'bg-green-50 text-green-700 border border-green-100' : 'bg-red-50 text-red-700 border border-red-100' }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $empresa->situacao_cadastral == '02' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            {{ $empresa->situacao_cadastral == '02' ? 'Ativa' : 'Inativa' }}
                                        </span>
                                        <span class="text-[10px] md:text-xs text-gray-400 md:mt-2">Desde {{ date('d/m/Y', strtotime($empresa->data_inicio_atividade)) }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Paginação (Opcional, se quiser remover para forçar apenas 10, basta deletar este bloco) -->
                    <div class="mt-8">
                        {{ $resultados->links() }}
                    </div>
                </div>
            @elseif(isset($resultados) && $resultados->count() == 0)
                <div id="resultsArea" class="mt-12 bg-white p-12 rounded-2xl text-center border border-gray-100 shadow-sm animate-fade-in-up scroll-mt-24">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <i class="bi bi-search text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700 mb-2">Nenhum resultado encontrado</h3>
                    <p class="text-gray-500">Tente ajustar os filtros para encontrar o que procura.</p>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Rolagem Automática para Resultados
        const resultsArea = document.getElementById('resultsArea');
        if (resultsArea) {
            // Pequeno delay para garantir renderização, scroll suave
            setTimeout(() => {
                resultsArea.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }
    });
</script>
@endsection