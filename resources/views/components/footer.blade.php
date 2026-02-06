<footer class="bg-white border-t border-gray-100 pt-16 pb-8">
    <div class="container mx-auto px-4">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            
            <!-- Coluna 1: Marca e Missão -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <img src="{{ asset('images/cnpjnacional.webp') }}" alt="CNPJ Nacional" class="h-22 w-auto">
                </div>
                <p class="text-sm text-gray-500 leading-relaxed mb-6 font-light">
                    Facilitamos o acesso a dados públicos de empresas brasileiras com tecnologia e transparência.
                </p>
                <div class="text-xs text-gray-400">
                    &copy; {{ date('Y') }} CNPJ Nacional.<br>Todos os direitos reservados.
                </div>
            </div>

            <!-- Coluna 2: Consultas Rápidas (Links Âncora e Diretos) -->
            <div>
                <h4 class="text-[#013886] font-bold text-sm uppercase tracking-wider mb-6">Consultas</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li>
                        <!-- Âncora ajustada para #consultar-cnpj (ID do formulário na home) -->
                        <a href="{{ route('home') }}#consultar-cnpj" class="hover:text-[#019171] transition-colors flex items-center gap-2 group">
                            <i class="bi bi-search text-gray-300 group-hover:text-[#019171]"></i>
                            Consultar CNPJ Grátis
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('consulta_avancada.index') }}" class="hover:text-[#019171] transition-colors flex items-center gap-2 group">
                            <i class="bi bi-funnel text-gray-300 group-hover:text-[#019171]"></i>
                            Busca Avançada
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('consulta_avancada.index') }}" class="hover:text-[#019171] transition-colors flex items-center gap-2 group">
                            <i class="bi bi-geo-alt text-gray-300 group-hover:text-[#019171]"></i>
                            Consultar por Estado
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('consulta_avancada.index') }}" class="hover:text-[#019171] transition-colors flex items-center gap-2 group">
                            <i class="bi bi-briefcase text-gray-300 group-hover:text-[#019171]"></i>
                            Consultar por Atividade
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Coluna 3: Institucional e Desenvolvedores -->
            <div>
                <h4 class="text-[#013886] font-bold text-sm uppercase tracking-wider mb-6">Institucional</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li>
                        <a href="{{ route('politica_privacidade') }}" class="hover:text-[#019171] transition-colors">Política de Privacidade</a>
                    </li>
                    <li>
                        <a href="{{ route('politica_privacidade') }}" class="hover:text-[#019171] transition-colors">Termos de Uso</a>
                    </li>
                    <li>
                        <!-- Link para API (Âncora para a seção de API na Home) -->
                        <a href="{{ route('home') }}#api-section" class="hover:text-[#019171] transition-colors flex items-center gap-2">
                            <i class="bi bi-code-square text-gray-300"></i> API para Desenvolvedores
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Coluna 4: Selos / LGPD -->
            <div>
                <h4 class="text-[#013886] font-bold text-sm uppercase tracking-wider mb-6">Segurança e Dados</h4>
                <!-- Aumentei padding e tamanho de fonte para legibilidade -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="bi bi-shield-check text-[#019171] text-2xl"></i>
                        <span class="text-sm font-bold text-gray-700">Dados Públicos Oficiais</span>
                    </div>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Todas as informações exibidas são de domínio público, extraídas da base da Receita Federal do Brasil, em conformidade com a LGPD e Lei de Acesso à Informação.
                    </p>
                </div>
            </div>

        </div>

        <!-- Linha Final -->
        <div class="border-t border-gray-100 pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center text-xs text-gray-400">
            <p>CNPJ Nacional - O seu buscador de empresas.</p>
            <div class="mt-2 md:mt-0 flex items-center gap-1">
                Feito com <i class="bi bi-heart-fill text-red-400 text-[10px]"></i> para o empreendedor brasileiro.
            </div>
        </div>
    </div>
</footer>