@props(['data'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Situação Cadastral</p>
            <p class="text-lg font-bold {{ ($data['situacao_cadastral'] ?? '') == 'Ativa' ? 'text-[#019171]' : (($data['situacao_cadastral'] ?? '') == 'ATIVA' ? 'text-[#019171]' : 'text-red-500') }}">
                {{ $data['situacao_cadastral'] ?? 'Não informado' }}
            </p>
        </div>
        <div class="w-10 h-10 rounded-full {{ ($data['situacao_cadastral'] ?? '') == 'Ativa' || ($data['situacao_cadastral'] ?? '') == 'ATIVA' ? 'bg-[#e6fcf5] text-[#019171]' : 'bg-red-50 text-red-500' }} flex items-center justify-center text-xl">
            <i class="bi {{ ($data['situacao_cadastral'] ?? '') == 'Ativa' || ($data['situacao_cadastral'] ?? '') == 'ATIVA' ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }}"></i>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Data da Situação</p>
            {{-- Valor já vem formatado do controller --}}
            <p class="text-lg font-bold text-[#232323]">
                {{ $data['data_situacao_cadastral'] ?? 'Não informado' }}
            </p>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center text-xl">
            <i class="bi bi-calendar-event"></i>
        </div>
    </div>
</div>