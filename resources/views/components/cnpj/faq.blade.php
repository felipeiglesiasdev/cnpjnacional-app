@props(['data'])

<div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-4">
    <div class="flex items-center gap-2 text-slate-500 text-sm">
        <i class="bi bi-question-circle"></i>
        <span>Perguntas Frequentes</span>
    </div>
    
    <div class="space-y-4 divide-y divide-slate-100">
        {{-- Pergunta 1 --}}
        <div class="pt-3 first:pt-0">
            <h3 class="font-semibold text-slate-900 text-sm mb-1">
                Qual o nome fantasia do CNPJ {{ $data['cnpj_completo'] ?? '' }}?
            </h3>
            <p class="text-slate-600 text-sm">
                @if(!empty($data['nome_fantasia']))
                    O nome fantasia da empresa é {{ $data['nome_fantasia'] }}.
                @else
                    A empresa não possui nome fantasia cadastrado ou utiliza apenas a Razão Social.
                @endif
            </p>
        </div>

        {{-- Pergunta 2 --}}
        <div class="pt-3">
            <h3 class="font-semibold text-slate-900 text-sm mb-1">
                Qual cidade se localiza a empresa {{ $data['razao_social'] ?? 'esta empresa' }}?
            </h3>
            <p class="text-slate-600 text-sm">
                A empresa localiza-se na cidade de {{ $data['cidade_uf'] ?? 'não informada' }}.
            </p>
        </div>

        {{-- Pergunta 3 --}}
        <div class="pt-3">
            <h3 class="font-semibold text-slate-900 text-sm mb-1">
                Qual a data de abertura da empresa {{ $data['razao_social'] ?? 'esta empresa' }}?
            </h3>
            <p class="text-slate-600 text-sm">
                A empresa foi aberta em {{ $data['data_abertura'] ?? 'data não informada' }}.
            </p>
        </div>

        {{-- Pergunta 4 --}}
        <div class="pt-3">
            <h3 class="font-semibold text-slate-900 text-sm mb-1">
                Qual o capital social declarado da empresa {{ $data['cnpj_completo'] ?? '' }}?
            </h3>
            <p class="text-slate-600 text-sm">
                O capital social declarado é de {{ isset($data['capital_social']) ? 'R$ ' . $data['capital_social'] : 'valor não informado' }}.
            </p>
        </div>

        {{-- Pergunta 5 --}}
        <div class="pt-3">
            <h3 class="font-semibold text-slate-900 text-sm mb-1">
                Qual a principal atividade econômica da empresa {{ $data['cnpj_completo'] ?? '' }}?
            </h3>
            <p class="text-slate-600 text-sm">
                A atividade principal é {{ $data['cnae_principal']['descricao'] ?? 'não informada' }} (CNAE: {{ $data['cnae_principal']['codigo'] ?? 'N/A' }}).
            </p>
        </div>
    </div>
</div>