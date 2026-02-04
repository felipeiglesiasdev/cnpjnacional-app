@props(['data'])

<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
    <div class="flex items-center gap-2 text-slate-500 text-sm">
        <i class="bi bi-geo-alt"></i>
        <span>Localização (dados reduzidos)</span>
    </div>
    <p class="text-sm text-slate-700">Cidade/UF: <span class="font-semibold text-slate-900">{{ $data['cidade_uf'] ?? 'Não informado' }}</span></p>
    <p class="text-xs text-slate-500">Endereço completo, telefones e e-mails não são exibidos para proteger a privacidade.</p>
</div>