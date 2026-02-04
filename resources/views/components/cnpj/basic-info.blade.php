@props(['data'])

<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
    <div class="flex items-center gap-2 text-slate-500 text-sm">
        <i class="bi bi-building"></i>
        <span class="font-medium">Informações básicas</span>
    </div>
    
    {{-- Substituído <dl> por <div> para estrutura mais genérica --}}
    <div class="grid grid-cols-1 gap-2 text-sm text-slate-700">
        <div>
            {{-- Substituído <dt> e <dd> por <p> com classes de estilo --}}
            <p class="font-semibold text-slate-900">CNPJ</p>
            <p>{{ $data['cnpj_completo'] ?? 'Não informado' }}</p>
        </div>
        <div>
            <p class="font-semibold text-slate-900">Nome Fantasia</p>
            <p>{{ $data['nome_fantasia'] ?? 'Não informado' }}</p>
        </div>
        <div>
            <p class="font-semibold text-slate-900">Natureza Jurídica</p>
            <p>{{ $data['natureza_juridica'] ?? 'Não informado' }}</p>
        </div>
        
        <div class="grid grid-cols-2 gap-2">
            <div>
                <p class="font-semibold text-slate-900">Porte</p>
                <p>{{ $data['porte'] ?? 'Não informado' }}</p>
            </div>
            <div>
                <p class="font-semibold text-slate-900">Matriz/Filial</p>
                <p>{{ $data['matriz_ou_filial'] ?? 'Não informado' }}</p>
            </div>
        </div>
        
        <div>
            <p class="font-semibold text-slate-900">Data de Abertura</p>
            <p>{{ $data['data_abertura'] ?? 'Não informado' }}</p>
        </div>
    </div>
</div>