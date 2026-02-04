<footer class="bg-[#171717] text-slate-300 py-10 border-t border-neutral-800">
    <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row justify-between gap-8">
        
        {{-- Seção Sobre e Dados Públicos --}}
        <div class="space-y-4 max-w-lg">
            <h3 class="text-white font-semibold text-lg">Sobre o Busca CNPJs</h3>
            <p class="text-sm leading-relaxed text-neutral-400">
                Somos um site de consulta gratuita de CNPJs. Divulgamos apenas dados que já são tornados públicos pelo Governo Federal, facilitando o acesso à informação de forma organizada.
            </p>
            
            {{-- Fontes Legais (Texto menor para dar respaldo) --}}
            <div class="text-sm text-white space-y-1">
                <p>Base de dados conforme:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    <li><a href="https://dados.gov.br/dados/conjuntos-dados/cadastro-nacional-da-pessoa-juridica---cnpj" target="_blank" rel="nofollow noopener" class="hover:text-blue-400 transition-colors">Dados Abertos (dados.gov.br)</a></li>
                    <li><a href="https://www.planalto.gov.br/ccivil_03/_ato2019-2022/2021/lei/l14129.htm" target="_blank" rel="nofollow noopener" class="hover:text-blue-400 transition-colors">Lei nº 14.129/2021 (Governo Digital)</a></li>
                    <li><a href="https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm" target="_blank" rel="nofollow noopener" class="hover:text-blue-400 transition-colors">Lei Geral de Proteção de Dados (LGPD)</a></li>
                </ul>
            </div>
        </div>

        {{-- Links Úteis --}}
        <div class="flex flex-col gap-3 min-w-[200px]">
            <h3 class="text-white font-semibold text-lg">Links Úteis</h3>
            <a href="{{ route('privacidade') }}" class="text-sm hover:text-white transition-colors">Política de Privacidade</a>
            {{-- Link âncora para remoção, conforme solicitado --}}
            <a href="{{ route('privacidade') }}#remocao" class="text-sm hover:text-white transition-colors">Remoção de Dados</a>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="max-w-5xl mx-auto px-4 mt-10 pt-6 border-t border-neutral-800 text-center md:text-left">
        <p class="text-xs text-neutral-600">
            &copy; {{ date('Y') }} Busca CNPJs. Todos os direitos reservados.
        </p>
    </div>
</footer>