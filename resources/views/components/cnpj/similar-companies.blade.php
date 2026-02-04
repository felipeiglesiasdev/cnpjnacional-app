@props(['data'])

@if(!empty($data['empresas_semelhantes']) && count($data['empresas_semelhantes']) > 0)
<section class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-4" aria-labelledby="similar-companies-title">
    <h2 id="similar-companies-title" class="flex items-center gap-2 text-slate-500 text-sm font-normal m-0">
        <i class="bi bi-diagram-3"></i>
        <span>Empresas Semelhantes na Região</span>
    </h2>
    
    <div class="grid gap-3 sm:grid-cols-2">
        @foreach($data['empresas_semelhantes'] as $empresa)
            <a href="{{ route('cnpj.show', ['cnpj' => $empresa['url']]) }}" 
               title="Ver detalhes da empresa {{ $empresa['razao_social'] }}"
               class="block p-3 rounded-lg border border-slate-100 hover:border-blue-200 hover:bg-blue-50 transition-colors group">
                <div class="space-y-1">
                    {{-- Removido 'truncate' e adicionado 'break-words' para garantir quebra de linha em mobile --}}
                    <h3 class="font-semibold text-slate-900 text-sm group-hover:text-blue-700 break-words leading-tight">
                        {{ $empresa['razao_social'] }}
                    </h3>
                    {{-- Adicionado 'flex-wrap' para evitar estouro horizontal nos detalhes --}}
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-slate-500">
                        <span class="font-mono whitespace-nowrap">{{ $empresa['cnpjCompletoFormatado'] }}</span>
                        <span class="sm:inline">&bull;</span>
                        <span>{{ $empresa['cidade_uf'] }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endif