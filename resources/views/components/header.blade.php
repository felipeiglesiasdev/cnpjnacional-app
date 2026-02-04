<header class="sticky top-0 z-50">
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 group text-decoration-none" title="CNPJ Nacional - Página Inicial">
                        <img src="{{ asset('images/cnpjnacional.png') }}" alt="CNPJ Nacional" class="h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" 
                       class="text-[#232323] hover:text-[#013886] font-medium transition-all duration-300 text-decoration-none uppercase hover:-translate-y-0.5"
                       title="Ir para a Página Inicial">
                        Início
                    </a>
                    <a href="#" 
                       class="text-[#232323] hover:text-[#013886] font-medium transition-all duration-300 text-decoration-none uppercase hover:-translate-y-0.5"
                       title="Realizar Consulta Avançada de Empresas">
                        Consulta Avançada
                    </a>
                </div>                
            </div>
        </div>
    </nav>
</header>