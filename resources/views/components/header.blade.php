<header class="sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <!-- Logo Area -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group text-decoration-none" title="CNPJ Nacional - Página Inicial">
                        <img src="{{ asset('images/cnpjnacional.webp') }}" alt="CNPJ Nacional" class="h-15 w-auto transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" 
                       class="text-[#232323] hover:text-[#013886] font-medium transition-all duration-300 text-decoration-none uppercase text-sm tracking-wide hover:-translate-y-0.5"
                       title="Ir para a Página Inicial">
                        Início
                    </a>
                    <a href="{{ route('consulta_avancada.index') }}" 
                       class="text-[#232323] hover:text-[#013886] font-medium transition-all duration-300 text-decoration-none uppercase text-sm tracking-wide hover:-translate-y-0.5"
                       title="Realizar Consulta Avançada de Empresas">
                        Consulta Avançada
                    </a>
                    <!-- Link API -->
                    <a href="{{ route('home') }}#api-section" 
                       class="text-[#232323] hover:text-[#013886] font-medium transition-all duration-300 text-decoration-none uppercase text-sm tracking-wide hover:-translate-y-0.5"
                       title="Documentação da API">
                        API
                    </a>
                </div>

                <!-- Mobile Menu Button (Hamburger) -->
                <div class="flex items-center md:hidden">
                    <button type="button" 
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="text-gray-500 hover:text-[#013886] focus:outline-none p-2 rounded-md hover:bg-gray-50 transition-colors" 
                            aria-controls="mobile-menu" 
                            aria-expanded="false">
                        <span class="sr-only">Abrir menu principal</span>
                        <!-- Ícone Menu -->
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Ícone Fechar -->
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="mobileMenuOpen" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Off-canvas / Gaveta) -->
    <div class="md:hidden" 
         role="dialog" 
         aria-modal="true"
         x-show="mobileMenuOpen"
         style="display: none;">
        
        <!-- Backdrop (Fundo escuro) -->
        <div class="fixed inset-0 z-50 bg-gray-900/50 backdrop-blur-sm transition-opacity" 
             x-show="mobileMenuOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen = false"></div>

        <!-- Painel Lateral -->
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 transform transition-transform"
             x-show="mobileMenuOpen"
             x-transition:enter="transform transition ease-in-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">
            
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">CNPJ Nacional</span>
                    <img class="h-15 w-auto" src="{{ asset('images/cnpjnacional.webp') }}" alt="CNPJ Nacional">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 hover:text-[#013886]" @click="mobileMenuOpen = false">
                    <span class="sr-only">Fechar menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('home') }}" 
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-[#013886] transition-colors"
                           @click="mobileMenuOpen = false">
                           Início
                        </a>
                        <a href="{{ route('consulta_avancada.index') }}" 
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-[#013886] transition-colors"
                           @click="mobileMenuOpen = false">
                           Consulta Avançada
                        </a>
                        <a href="{{ route('home') }}#api-section" 
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-[#013886] transition-colors"
                           @click="mobileMenuOpen = false">
                           API
                        </a>
                        <a href="{{ route('politica_privacidade') }}" 
                           class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 hover:text-[#013886] transition-colors"
                           @click="mobileMenuOpen = false">
                           Privacidade
                        </a>
                    </div>
                    
                    <div class="py-6">
                        <a href="{{ route('home') }}#consultar-cnpj" 
                           class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white bg-[#013886] hover:bg-[#012d6b] text-center shadow-md transition-all"
                           @click="mobileMenuOpen = false">
                           Consultar Agora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>