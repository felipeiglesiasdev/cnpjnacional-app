<header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between gap-4">
        {{-- Logo e Títulos --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('favicon.svg') }}" alt="Logo Busca CNPJs" class="h-10 w-10">
            <div>
                <p class="text-lg font-bold text-slate-900 leading-tight">Busca CNPJs</p>
                <p class="text-xs text-slate-500 font-medium">Consulta gratuita de CNPJ</p>
            </div>
        </a>

        {{-- Formulário de Busca no Header --}}
        <form action="{{ route('cnpj.consultar') }}" method="POST" class="hidden md:flex items-center w-full max-w-sm gap-2">
            @csrf
            <div class="relative w-full">
                <input 
                    type="tel" 
                    name="cnpj" 
                    id="cnpj-input-aside" 
                    placeholder="00.000.000/0000-00" 
                    class="w-full pl-4 pr-24 py-2 rounded-lg border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    required
                    aria-label="Número do CNPJ"
                >
                {{-- Botão Azul Absoluto à Direita --}}
                <button 
                    type="submit" 
                    class="cursor-pointer absolute right-1 top-1 bottom-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 rounded-md transition-colors flex items-center justify-center"
                >
                    Buscar
                </button>
            </div>
        </form>
    </div>
</header>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/7.1.3/imask.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cnpjInput = document.getElementById('cnpj-input-aside');
        if (cnpjInput) {
            const mask = IMask(cnpjInput, { mask: '00.000.000/0000-00' });
            const form = cnpjInput.closest('form');
            if (form) {
                form.addEventListener('submit', function() { mask.updateValue(); });
            }
        }
    });
</script>
@endpush