@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-50 pb-4">
        <div class="w-8 h-8 rounded-lg bg-[#e6fcf5] flex items-center justify-center text-[#019171]">
            <i class="bi bi-geo-alt-fill"></i>
        </div>
        <h2 class="text-xl font-bold text-[#232323]">Localização</h2>
    </div>

    <div class="space-y-6">
        <!-- Cidade e Estado com destaque -->
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-[#013886] flex-shrink-0">
                <i class="bi bi-building"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Município / UF</p>
                <p class="font-bold text-[#232323] text-xl">
                    {{ $data['cidade_uf'] ?? ($data['cidade'] ?? 'Localização não informada') }}
                </p>
            </div>
        </div>

        <!-- Aviso LGPD -->
        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3">
            <div class="text-[#013886] mt-0.5">
                <i class="bi bi-shield-lock-fill text-lg"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-[#013886] mb-1">Endereço Protegido</h4>
                <p class="text-xs text-blue-800/80 leading-relaxed">
                    Para garantir a privacidade e em conformidade com a <strong>LGPD (Lei Geral de Proteção de Dados)</strong>, os detalhes completos do endereço (rua, número, bairro e CEP) foram ocultados na visualização pública.
                </p>
            </div>
        </div>
    </div>
</div>