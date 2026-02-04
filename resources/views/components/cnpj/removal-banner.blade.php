@props(['data'])

<div class="bg-blue-50 border border-blue-100 rounded-xl p-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
    <div class="space-y-1">
        <p class="text-sm font-semibold text-blue-700">LGPD</p>
        <p class="text-lg font-bold text-slate-900">Deseja remover seus dados desta consulta?</p>
        <p class="text-sm text-slate-600">Se você é responsável por este CNPJ, solicite a remoção das informações apresentadas.</p>
    </div>
    <a href="" class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 shadow cursor-pointer">
        <i class="bi bi-shield-lock"></i>
        Solicitar Remoção de Dados
    </a>
</div>