<section class="py-32 bg-[#fffdf2] relative overflow-hidden">
    <div class="container mx-auto px-4">
        
        <!-- Header da Seção -->
        <div class="text-center mb-20 max-w-3xl mx-auto relative z-10">
            <span class="text-[#019171] font-bold tracking-wider uppercase text-xs mb-3 block">Ferramentas Pro</span>
            <h2 class="text-3xl md:text-5xl font-bold text-[#013886] mb-6 tracking-tight">Filtros de Segmentação Avançada</h2>
            <p class="text-[#232323]/70 text-lg font-light leading-relaxed">
                Precisa gerar leads ou analisar um mercado específico? Utilize nossa busca combinada para filtrar empresas por atividade, localização, data de abertura e muito mais.
            </p>
        </div>

        <!-- Componente Visual do Formulário (Mockup com Overlay) -->
        <div class="relative max-w-6xl mx-auto">
            
            <!-- Borda decorativa externa -->
            <div class="absolute -inset-1 bg-gradient-to-r from-[#013886] via-[#019171] to-[#ffd51b] rounded-[3rem] opacity-20 blur-xl"></div>

            <!-- Fundo ajustado: menos opaco (white/60) e mais blur -->
            <div class="relative bg-white/80 backdrop-blur-md rounded-[2.5rem] shadow-2xl border border-white/50 overflow-hidden min-h-[650px]">
                
                <!-- O Formulário de Fundo (Opaco/Desfocado - Mockup Visual) -->
                <!-- Aumentei o padding vertical para p-20 para o card ficar maior -->
                <div class="p-10 md:p-20 select-none pointer-events-none opacity-60 filter blur-[1px] grayscale-[20%]">
                    
                    <!-- LINHA 1: Localização -->
                    <div class="mb-12 border-b border-gray-300/50 pb-12">
                        <h3 class="text-gray-500 font-bold text-xl flex items-center gap-3 mb-8">
                            <div class="w-6 h-6 bg-gray-400 rounded-md"></div> Localização
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                            <div class="md:col-span-6">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Estado (UF)</label>
                                <div class="h-14 bg-white/50 rounded-2xl border border-gray-300 w-full flex items-center px-6 text-gray-500 text-sm justify-between">
                                    <span>Selecione o Estado</span>
                                    <i class="bi bi-chevron-down text-xs"></i>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Cidade</label>
                                <div class="h-14 bg-white/50 rounded-2xl border border-gray-300 w-full flex items-center px-6 text-gray-500 text-sm">
                                    <span>Selecione a cidade</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LINHA 2: Informações Cadastrais -->
                    <div class="mb-12 border-b border-gray-300/50 pb-12">
                        <h3 class="text-gray-500 font-bold text-xl flex items-center gap-3 mb-8">
                            <div class="w-6 h-6 bg-gray-400 rounded-md"></div> Informações Cadastrais
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                            <!-- Status Checkboxes (Mockup) -->
                            <div class="md:col-span-5">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Situação Cadastral</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="h-12 rounded-xl border border-gray-300 bg-white/50 flex items-center justify-center gap-2">
                                        <div class="w-4 h-4 rounded-full bg-gray-400"></div> <span class="text-xs text-gray-600 font-bold">Ativa</span>
                                    </div>
                                    <div class="h-12 rounded-xl border border-gray-300 bg-white/50 flex items-center justify-center gap-2">
                                        <div class="w-4 h-4 rounded-full bg-gray-300"></div> <span class="text-xs text-gray-500 font-bold">Baixada</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Natureza -->
                            <div class="md:col-span-4">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Natureza Jurídica</label>
                                <div class="h-14 bg-white/50 rounded-2xl border border-gray-300 w-full flex items-center px-6 justify-between">
                                    <div class="w-32 h-3 bg-gray-300 rounded-full"></div>
                                    <i class="bi bi-chevron-down text-xs text-gray-500"></i>
                                </div>
                            </div>
                            <!-- Porte -->
                            <div class="md:col-span-3">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Porte</label>
                                <div class="h-14 bg-white/50 rounded-2xl border border-gray-300 w-full flex items-center px-6 justify-between">
                                    <div class="w-20 h-3 bg-gray-300 rounded-full"></div>
                                    <i class="bi bi-chevron-down text-xs text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LINHA 3: Atividade -->
                    <div class="mb-6">
                        <h3 class="text-gray-500 font-bold text-xl flex items-center gap-3 mb-8">
                            <div class="w-6 h-6 bg-gray-400 rounded-md"></div> Atividade Econômica
                        </h3>
                        <div class="grid grid-cols-1 gap-8">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Atividade Principal</label>
                                <div class="h-14 bg-white/50 rounded-2xl border border-gray-300 w-full flex items-center px-6">
                                    <div class="w-1/3 h-3 bg-gray-300 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Overlay de CTA (Chamada para Ação) -->
                <!-- Ajustei o gradiente para ser mais sutil e permitir ver o fundo -->
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 to-transparent backdrop-blur-[1px] flex flex-col items-center justify-center text-center p-8 z-20">
                    
                    <div class="w-24 h-24 bg-white rounded-3xl shadow-xl border border-gray-100 flex items-center justify-center text-[#ffd51b] mb-8 transform hover:scale-110 transition-transform duration-500 ring-4 ring-white/50">
                        <i class="bi bi-sliders2 text-5xl text-[#013886]"></i>
                    </div>
                    
                    <h3 class="text-3xl md:text-4xl font-bold text-[#013886] mb-4 tracking-tight">Busca Segmentada</h3>
                    <p class="text-gray-600 mb-10 max-w-lg mx-auto text-lg leading-relaxed font-medium">
                        Combine múltiplos filtros para encontrar o perfil exato de empresa que você procura. Ideal para prospecção e análise.
                    </p>
                    
                    <!-- Botão CTA com Link Correto -->
                    <a href="{{ route('consulta_avancada.index') }}" class="group relative inline-flex items-center gap-4 bg-[#013886] text-white font-bold py-5 px-12 rounded-2xl shadow-[0_20px_40px_-10px_rgba(1,56,134,0.4)] hover:shadow-[0_25px_50px_-10px_rgba(1,56,134,0.5)] hover:-translate-y-1 transition-all duration-300 overflow-hidden text-decoration-none text-lg">
                        <!-- Brilho no botão -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700 ease-in-out"></div>
                        
                        <i class="bi bi-funnel-fill text-[#ffd51b]"></i>
                        <span class="relative">Acessar Consulta Avançada</span>
                        <i class="bi bi-arrow-right opacity-0 -ml-4 group-hover:opacity-100 group-hover:ml-0 transition-all duration-300"></i>
                    </a>
                    
                    <p class="mt-8 text-sm text-gray-500 font-medium tracking-wide uppercase">Disponível para todo o Brasil</p>
                </div>

            </div>
        </div>
    </div>
</section>