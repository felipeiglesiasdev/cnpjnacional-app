<section class="py-24 bg-[#fffdf2] relative overflow-hidden">
    <div class="container mx-auto px-4">
        
        <!-- Header da Seção -->
        <div class="text-center mb-16 max-w-3xl mx-auto relative z-10">
            <span class="text-[#019171] font-bold tracking-wider uppercase text-xs mb-2 block">Ferramentas Pro</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#013886] mb-6">Filtros de Segmentação Avançada</h2>
            <p class="text-[#232323]/70 text-lg font-light leading-relaxed">
                Precisa gerar leads ou analisar um mercado específico? Utilize nossa busca combinada para filtrar empresas por atividade, localização, data de abertura e muito mais.
            </p>
        </div>

        <!-- Componente Visual do Formulário (Mockup com Overlay) -->
        <div class="relative max-w-5xl mx-auto">
            
            <!-- Borda decorativa externa -->
            <div class="absolute -inset-1 bg-gradient-to-r from-[#013886] to-[#019171] rounded-[2.5rem] opacity-20 blur-lg"></div>

            <div class="relative bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden">
                
                <!-- O Formulário de Fundo (Opaco/Desfocado) -->
                <!-- 'pointer-events-none' garante que o usuário não possa clicar nos inputs -->
                <div class="p-8 md:p-12 select-none pointer-events-none opacity-40 filter blur-[1px]">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-6">
                        
                        <!-- Linha 1 -->
                        <div class="lg:col-span-8 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-tag-fill"></i> CNAE Principal
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full flex items-center px-4 text-gray-400 text-sm">
                                Selecione a atividade econômica...
                            </div>
                        </div>
                        <div class="lg:col-span-4 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-building"></i> Natureza Jurídica
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full flex items-center px-4 text-gray-400 text-sm">
                                Todas as naturezas
                            </div>
                        </div>

                        <!-- Linha 2 -->
                        <div class="lg:col-span-3 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-geo-alt-fill"></i> Estado (UF)
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full flex items-center px-4 text-gray-400 text-sm">
                                SP
                            </div>
                        </div>
                        <div class="lg:col-span-5 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-map-fill"></i> Cidade
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full flex items-center px-4 text-gray-400 text-sm">
                                São Paulo
                            </div>
                        </div>
                        <div class="lg:col-span-4 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-check-circle-fill"></i> Situação Cadastral
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full flex items-center px-4 text-gray-400 text-sm">
                                Ativa
                            </div>
                        </div>

                        <!-- Linha 3 -->
                        <div class="lg:col-span-6 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-calendar-event"></i> Data de Abertura (Início)
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full"></div>
                        </div>
                        <div class="lg:col-span-6 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-calendar-event"></i> Data de Abertura (Fim)
                            </label>
                            <div class="h-12 bg-gray-50 rounded-xl border border-gray-200 w-full"></div>
                        </div>

                        <!-- Linha 4 (CNAEs Secundários) -->
                        <div class="lg:col-span-12 space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                                <i class="bi bi-tags-fill"></i> CNAEs Secundários
                            </label>
                            <div class="h-24 bg-gray-50 rounded-xl border border-gray-200 w-full p-3">
                                <div class="flex gap-2">
                                    <span class="bg-gray-200 rounded-md px-2 py-1 h-6 w-24 block"></span>
                                    <span class="bg-gray-200 rounded-md px-2 py-1 h-6 w-32 block"></span>
                                    <span class="bg-gray-200 rounded-md px-2 py-1 h-6 w-16 block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botão Fake de fundo -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                         <div class="h-12 w-48 bg-[#013886] rounded-full opacity-30"></div>
                    </div>
                </div>

                <!-- Overlay de CTA (Chamada para Ação) -->
                <!-- Gradiente ajustado para esconder suavemente o form e destacar o botão -->
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/80 to-white/40 backdrop-blur-[2px] flex flex-col items-center justify-center text-center p-6 z-20">
                    
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-xl border border-gray-50 flex items-center justify-center text-[#ffd51b] mb-6 transform hover:scale-110 transition-transform duration-500">
                        <i class="bi bi-sliders2 text-4xl text-[#013886]"></i>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-[#013886] mb-3">Busca Segmentada</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto text-base">
                        Combine múltiplos filtros para encontrar o perfil exato de empresa que você procura. Ideal para prospecção e análise.
                    </p>
                    
                    <!-- Botão CTA -->
                    <a href="#" class="group relative inline-flex items-center gap-3 bg-[#013886] text-white font-bold py-4 px-10 rounded-full shadow-[0_10px_30px_rgba(1,56,134,0.3)] hover:shadow-[0_15px_40px_rgba(1,56,134,0.4)] hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                        <!-- Brilho no botão -->
                        <div class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
                        
                        <i class="bi bi-funnel-fill text-[#ffd51b]"></i>
                        <span class="relative">Acessar Consulta Avançada</span>
                        <i class="bi bi-arrow-right opacity-0 -ml-4 group-hover:opacity-100 group-hover:ml-0 transition-all duration-300"></i>
                    </a>
                    
                    <p class="mt-6 text-xs text-gray-400 font-medium">Disponível para todo o Brasil</p>
                </div>

            </div>
        </div>
    </div>
</section>