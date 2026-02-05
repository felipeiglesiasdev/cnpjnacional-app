@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-50 pb-4">
        <div class="w-8 h-8 rounded-lg bg-[#fffbea] flex items-center justify-center text-[#d4af00]">
            <i class="bi bi-briefcase-fill"></i>
        </div>
        <h2 class="text-xl font-bold text-[#232323]">Atividade Econômica (CNAE)</h2>
    </div>

    <!-- Principal -->
    <div class="mb-8">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Atividade Principal</p>
        <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-[#ffd51b] transition-colors">
            <div class="mt-1 text-[#013886]">
                <i class="bi bi-star-fill"></i>
            </div>
            <div>
                {{-- Acesso ajustado para o array aninhado 'cnae_principal' --}}
                <span class="font-bold text-[#013886] mr-2">{{ $data['cnae_principal']['codigo'] ?? 'Não informado' }}</span>
                <span class="text-gray-700">{{ $data['cnae_principal']['descricao'] ?? 'Não informado' }}</span>
            </div>
        </div>
    </div>

    <!-- Secundárias -->
    @if(isset($data['cnaes_secundarios']) && is_array($data['cnaes_secundarios']) && count($data['cnaes_secundarios']) > 0)
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Atividades Secundárias</p>
            <ul class="space-y-2">
                @foreach($data['cnaes_secundarios'] as $cnae)
                <li class="flex items-start gap-3 text-sm text-gray-600 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                    <i class="bi bi-circle-fill text-[6px] mt-2 text-gray-300"></i>
                    <span>
                        <strong class="text-gray-800">
                            {{ is_array($cnae) ? ($cnae['codigo'] ?? '') : ($cnae->codigo ?? '') }}
                        </strong> 
                        - 
                        {{ is_array($cnae) ? ($cnae['descricao'] ?? '') : ($cnae->descricao ?? '') }}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>