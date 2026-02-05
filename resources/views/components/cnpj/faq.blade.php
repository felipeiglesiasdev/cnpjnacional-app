@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
    <h2 class="text-xl font-bold text-[#232323] mb-6">Perguntas Frequentes sobre {{ $data['razao_social'] ?? 'esta empresa' }}</h2>
    
    <div class="space-y-3">
        
        {{-- Pergunta 1: Nome Fantasia (Keyword: Nome Fantasia + Razão Social) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">A empresa {{ $data['razao_social'] ?? '' }} possui nome fantasia?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                @if(!empty($data['nome_fantasia']))
                    Sim, a empresa possui o nome fantasia <strong>{{ $data['nome_fantasia'] }}</strong> cadastrado na Receita Federal.
                @else
                    Não, atualmente a empresa não possui nome fantasia cadastrado, sendo identificada apenas pela razão social <strong>{{ $data['razao_social'] ?? '' }}</strong>.
                @endif
            </p>
        </details>

        {{-- Pergunta 2: Capital Social (Keyword: Capital Social + CNPJ) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">Qual o capital social do CNPJ {{ $data['cnpj_completo'] ?? '' }}?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                O capital social registrado para o CNPJ {{ $data['cnpj_completo'] ?? '' }} é de <strong>R$ {{ $data['capital_social'] ?? '0,00' }}</strong>. Este valor representa o investimento inicial aportado pelos sócios ou acionistas.
            </p>
        </details>

        {{-- Pergunta 3: Localização (Keyword: Onde fica + Razão Social) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">Onde fica localizada a empresa {{ $data['razao_social'] ?? '' }}?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                A empresa encontra-se cadastrada na localidade de <strong>{{ $data['cidade_uf'] ?? ($data['cidade'] ?? 'Localização não informada') }}</strong>.
            </p>
        </details>

        {{-- Pergunta 4: Situação Cadastral (Keyword: CNPJ + Ativo) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">O CNPJ {{ $data['cnpj_completo'] ?? '' }} está ativo?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                Conforme dados da Receita Federal, a situação cadastral é <strong>{{ $data['situacao_cadastral'] ?? 'Não informado' }}</strong>. A última atualização dessa situação ocorreu em {{ $data['data_situacao_cadastral'] ?? 'data não disponível' }}.
            </p>
        </details>

        {{-- Pergunta 5: Atividade Principal (Keyword: Atividade + Razão Social) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">Qual a atividade principal da {{ $data['razao_social'] ?? 'empresa' }}?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                A atividade econômica principal (CNAE) identificada é: <strong>{{ $data['cnae_principal']['descricao'] ?? 'Não informado' }}</strong>.
            </p>
        </details>

        {{-- Pergunta 6: Data de Abertura (Keyword: Quando abriu + Razão Social) --}}
        <details class="group bg-gray-50 rounded-xl p-4 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between font-medium text-gray-700 group-hover:text-[#013886] transition-colors">
                <span class="pr-4">Quando a empresa {{ $data['razao_social'] ?? '' }} foi aberta?</span>
                <span class="transition group-open:rotate-180 flex-shrink-0 text-gray-400 group-hover:text-[#013886]">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </summary>
            <p class="mt-4 leading-relaxed text-gray-500 text-sm border-t border-gray-200 pt-3">
                A empresa foi fundada em <strong>{{ $data['data_inicio_atividade'] ?? 'data não informada' }}</strong>, de acordo com o registro oficial na Receita Federal.
            </p>
        </details>

    </div>
</div>