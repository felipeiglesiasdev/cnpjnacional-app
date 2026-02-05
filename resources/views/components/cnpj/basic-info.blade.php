@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-50 pb-4">
        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-[#013886]">
            <i class="bi bi-info-circle-fill"></i>
        </div>
        <h2 class="text-xl font-bold text-[#232323]">Informações Cadastrais</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-6 gap-x-8">
        
        <div class="group">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 group-hover:text-[#013886] transition-colors">Data de Abertura</p>
            {{-- Chave atualizada e valor já vem formatado --}}
            <p class="font-medium text-[#232323]">{{ $data['data_inicio_atividade'] ?? 'Não informada' }}</p>
        </div>

        <div class="group">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 group-hover:text-[#013886] transition-colors">Porte da Empresa</p>
            <p class="font-medium text-[#232323]">{{ $data['porte'] ?? 'Não informado' }}</p>
        </div>

        <div class="group">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 group-hover:text-[#013886] transition-colors">Natureza Jurídica</p>
            <p class="font-medium text-[#232323]">{{ $data['natureza_juridica'] ?? 'Não informada' }}</p>
        </div>

        <div class="group">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 group-hover:text-[#013886] transition-colors">Capital Social</p>
            {{-- Removido number_format do Blade pois o controller já envia formatado --}}
            <p class="font-medium text-[#232323]">R$ {{ $data['capital_social'] ?? '0,00' }}</p>
        </div>

        <div class="group md:col-span-2">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 group-hover:text-[#013886] transition-colors">Matriz ou Filial</p>
            {{-- Chave atualizada para matriz_ou_filial --}}
            <p class="font-medium text-[#232323]">{{ $data['matriz_ou_filial'] ?? 'Não informado' }}</p>
        </div>

    </div>
</div>