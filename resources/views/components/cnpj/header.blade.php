@props(['data'])

<div class="space-y-2">
    <p class="text-sm font-semibold text-blue-700">CNPJ {{ $data['cnpj_completo'] ?? '' }}</p>
    <h1 class="text-3xl font-bold text-slate-900">{{ $data['razao_social'] ?? 'Empresa não encontrada' }}</h1>
    <p class="text-slate-600">Exibimos apenas dados públicos essenciais. Contatos, endereço completo e quadro societário foram ocultados em respeito à LGPD.</p>
</div>