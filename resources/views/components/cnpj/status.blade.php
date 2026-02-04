@props(['data'])

<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
    <div class="flex items-center gap-2 text-slate-500 text-sm">
        <i class="bi bi-shield-check"></i>
        <span>Situação Cadastral</span>
    </div>
    <div class="flex items-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-medium {{ $data['situacao_cadastral_classe'] ?? 'bg-slate-100 text-slate-700' }}">
            {{ $data['situacao_cadastral'] ?? 'Não informado' }}
        </span>
        <p class="text-sm text-slate-600">Atualizada em {{ $data['data_situacao_cadastral'] ?? 'Não informado' }}</p>
    </div>
    <div class="pt-2 border-t border-slate-100 text-sm text-slate-600">
        <p>Atividades econômicas principais e secundárias são exibidas abaixo. Dados de contato e endereço completo estão ocultos.</p>
    </div>
</div>