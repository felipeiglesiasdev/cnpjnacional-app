@props(['data'])

@if(isset($data['empresas_semelhantes']) && count($data['empresas_semelhantes']) > 0)
<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-[#232323]">Empresas Semelhantes</h2>
            <p class="text-xs text-gray-400 font-light mt-1">Negócios na mesma região com atividades parecidas</p>
        </div>
        <span class="text-xs font-semibold bg-[#e6f0ff] text-[#013886] px-3 py-1.5 rounded-full border border-blue-100">
            Relacionadas
        </span>
    </div>

    <div class="space-y-4">
        @foreach($data['empresas_semelhantes'] as $empresaSimiliar)
            {{-- Usando a URL gerada no controller --}}
            <a href="{{ $empresaSimiliar['url'] ?? '#' }}" class="block group">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-5 rounded-2xl bg-gray-50/50 hover:bg-white border border-transparent hover:border-[#013886]/20 hover:shadow-lg transition-all duration-300">
                    
                    <div class="flex items-start gap-4 mb-4 sm:mb-0">
                        <!-- Avatar/Ícone -->
                        <div class="w-12 h-12 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-[#013886] font-bold text-lg shadow-sm group-hover:bg-[#013886] group-hover:text-white transition-colors flex-shrink-0">
                            {{-- Pega a primeira letra da razão social --}}
                            {{ substr($empresaSimiliar['razao_social'] ?? 'E', 0, 1) }}
                        </div>
                        
                        <div class="space-y-1">
                            <!-- Razão Social -->
                            <h3 class="font-bold text-[#232323] text-sm group-hover:text-[#013886] transition-colors leading-tight line-clamp-1">
                                {{ $empresaSimiliar['razao_social'] ?? 'Razão Social Indisponível' }}
                            </h3>

                            <!-- CNPJ -->
                            <p class="text-xs text-gray-400 font-mono">
                                {{ $empresaSimiliar['cnpjCompletoFormatado'] ?? 'CNPJ não informado' }}
                            </p>
                            
                            <!-- Dados Destacados (Cidade e CNAE) -->
                            <div class="flex flex-wrap gap-y-2 gap-x-4 text-xs text-gray-500 pt-1">
                                <span class="flex items-center gap-1.5">
                                    <i class="bi bi-geo-alt-fill text-[#019171]"></i>
                                    {{ $empresaSimiliar['cidade_uf'] ?? 'Localização não informada' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Botão Seta (Mobile: width full, Desktop: auto) -->
                    <div class="w-full sm:w-auto flex justify-end">
                        <span class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-[#013886] group-hover:border-[#013886]/30 transition-all">
                            <i class="bi bi-arrow-right text-sm"></i>
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif