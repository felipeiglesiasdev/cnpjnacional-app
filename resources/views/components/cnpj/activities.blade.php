@props(['data'])
<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
    <div class="flex items-center gap-2 text-slate-500 text-sm">
        <i class="bi bi-briefcase"></i>
        <span>Atividades econômicas</span>
    </div>
    <div class="grid gap-2 text-sm text-slate-700">
        <div>
            <p class="font-semibold text-slate-900">CNAE Principal</p>
            <p>{{ $data['cnae_principal']['codigo'] ?? 'Não informado' }} - {{ $data['cnae_principal']['descricao'] ?? '' }}</p>
        </div>
        @if(!empty($data['cnaes_secundarios']))
            <div>
                <p class="font-semibold text-slate-900">CNAEs Secundários</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($data['cnaes_secundarios'] as $cnae)
                        <li>{{ $cnae['codigo'] }} - {{ $cnae['descricao'] }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>