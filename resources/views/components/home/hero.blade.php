<section class="relative w-full bg-[#019171] min-h-[650px] flex items-center overflow-hidden py-20 lg:py-0" id="consultar-cnpj">
    
    <!-- Canvas Background -->
    <canvas id="neuralNetworkCanvas" class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-60"></canvas>

    <!-- Conteúdo Principal -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <!-- Coluna da Esquerda: Texto de Impacto -->
            <div class="text-left">
                <!-- Badge SEO Friendly -->
                <div class="inline-flex items-center gap-2 bg-[#ffffff15] backdrop-blur-sm border border-[#ffffff30] rounded-full px-4 py-1.5 mb-8 animate-fade-in-down">
                    <span class="w-2 h-2 rounded-full bg-[#ffd51b] animate-pulse"></span>
                    <span class="text-white/90 text-sm font-medium tracking-wide">Dados do <strong>CNPJ Receita Federal</strong></span>
                </div>

                <!-- H1 Otimizado para SEO -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 tracking-tight leading-tight">
                    A melhor ferramenta de
                    <span class="text-[#ffd51b] relative inline-block">
                        Consulta CNPJ
                        <!-- Sublinhado decorativo -->
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-[#ffd51b] opacity-40" viewBox="0 0 100 10" preserveAspectRatio="none">
                            <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                        </svg>
                    </span>
                </h1>

                <!-- Parágrafo com Keywords e Limitações de Dados -->
                <p class="text-lg text-white/80 mb-8 max-w-lg font-light leading-relaxed">
                    A maneira mais simples de <strong>consultar empresas grátis</strong>. Acesse dados essenciais como Capital Social, Atividades Econômicas e localização (Cidade/Estado) em tempo real.
                </p>

                <!-- Ícones de features rápidas (Agora com Bootstrap Icons) -->
                <div class="flex flex-col sm:flex-row flex-wrap gap-6 text-white/80 text-sm font-medium">
                    <div class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-[#ffffff10] border border-[#ffffff20] flex items-center justify-center text-[#ffd51b] group-hover:scale-110 transition-transform">
                            <i class="bi bi-shield-check text-xl"></i>
                        </div>
                        <span>Dados Públicos<br>Oficiais</span>
                    </div>
                    <div class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-[#ffffff10] border border-[#ffffff20] flex items-center justify-center text-[#ffd51b] group-hover:scale-110 transition-transform">
                            <i class="bi bi-lightning-charge text-xl"></i>
                        </div>
                        <span>Consulta CNPJ<br>Rápida</span>
                    </div>
                    <div class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-[#ffffff10] border border-[#ffffff20] flex items-center justify-center text-[#ffd51b] group-hover:scale-110 transition-transform">
                            <i class="bi bi-infinity text-xl"></i>
                        </div>
                        <span>Buscas<br>Ilimitadas</span>
                    </div>
                </div>
            </div>

            <!-- Coluna da Direita: Card de Busca Flutuante -->
            <div class="relative">
                <!-- Efeito Glow atrás do card -->
                <div class="absolute -inset-2 bg-gradient-to-tr from-[#ffd51b]/40 to-white/10 rounded-[2rem] blur-2xl opacity-40 animate-pulse"></div>

                <div class="relative bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-[2rem] shadow-2xl">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-white">Consultar Empresa</h3>
                        <p class="text-white/60 text-sm mt-1">Busque na base nacional de forma gratuita.</p>
                    </div>
                    
                    <form action="{{ route('cnpj.consultar') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="space-y-2">
                            <label for="search" class="text-xs font-semibold text-white/80 uppercase tracking-wider ml-1">Consultar CNPJ Grátis</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-white/50 group-focus-within:text-[#ffd51b] transition-colors">
                                    <i class="bi bi-search"></i>
                                </div>
                                <input type="text" id="cnpj-input"
                                    class="w-full bg-black/20 border border-white/10 rounded-xl py-3.5 pl-12 pr-4 text-white placeholder-white/30 focus:outline-none focus:bg-black/30 focus:border-[#ffd51b]/50 focus:ring-1 focus:ring-[#ffd51b]/50 transition-all font-light tracking-wide"
                                    placeholder="00.000.000/0000-00"
                                    required
                                    type="tel" 
                                    name="cnpj" 
                                    id="cnpj-input-aside" 
                                >
                            </div>
                        </div>

                        <!-- Botão Sofisticado -->
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-[#ffd51b] to-[#e6c200] text-[#232323] font-bold text-lg py-3 px-6 rounded-full shadow-[0_4px_15px_rgba(255,213,27,0.4)] hover:shadow-[0_6px_20px_rgba(255,213,27,0.5)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2 group relative overflow-hidden border border-[#ffe066] cursor-pointer">
                            
                            <!-- Brilho sutil -->
                            <div class="absolute inset-0 bg-gradient-to-t from-transparent to-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <span class="relative">Pesquisar Agora</span>
                            <i class="bi bi-arrow-right relative transform group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>

                    <div class="mt-6 pt-6 border-t border-white/10 text-center">
                        <p class="text-xs text-white/40">
                            Base de dados segura. <a href="{{ route('politica_privacidade') }}" class="text-[#ffd51b] hover:text-[#fff] transition-colors underline decoration-dotted">Política de Privacidade</a>.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MODAL DE ERRO (Alpine.js) -->
@if(session('error'))
    <div x-data="{ show: true }" 
         x-show="show" 
         class="relative z-[100]" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        
        <div x-show="show"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                
                <div x-show="show"
                     @click.outside="show = false"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm border border-red-100">
                    
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="bi bi-exclamation-triangle-fill text-red-600 text-lg"></i>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Atenção</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" @click="show = false" class="cursor-pointer inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors">
                            Tentar novamente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Script de Animação Neural Ajustado (Mantido) -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const canvas = document.getElementById('neuralNetworkCanvas');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        let width = canvas.offsetWidth;
        let height = canvas.offsetHeight;
        canvas.width = width;
        canvas.height = height;

        const particles = [];
        const particleCount = Math.floor((width * height) / 9000); // Um pouco mais denso
        const maxDistance = 160; // Aumentado para conectar mais longe (rede maior)
        const particleSpeed = 0.5; // Levemente mais rápido
        
        // Cores "levemente mais fortes"
        // Linhas agora são amarelo bem claro com mais opacidade inicial
        const lineColorBase = '255, 230, 150'; 
        const particleColor = 'rgba(255, 213, 27, 0.85)'; // Amarelo mais opaco

        class Particle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * particleSpeed;
                this.vy = (Math.random() - 0.5) * particleSpeed;
                this.radius = Math.random() * 2 + 2; // Partículas maiores (2 a 4px)
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = particleColor;
                ctx.fill();
            }
        }

        function init() {
            particles.length = 0;
            width = canvas.offsetWidth;
            height = canvas.offsetHeight;
            canvas.width = width;
            canvas.height = height;
            
            const newParticleCount = Math.floor((width * height) / 9000);
            for (let i = 0; i < newParticleCount; i++) {
                particles.push(new Particle());
            }
        }

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < maxDistance) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        // Aumentei o multiplicador de opacidade (0.25 -> 0.4) para ficar mais visível
                        ctx.strokeStyle = `rgba(${lineColorBase}, ${0.4 * (1 - distance / maxDistance)})`;
                        ctx.lineWidth = 0.8; // Linha um pouco mais grossa
                        ctx.stroke();
                    }
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);
            
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });

            connectParticles();
            requestAnimationFrame(animate);
        }

        init();
        animate();

        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(init, 300);
        });
    });
</script>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/7.1.3/imask.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cnpjInput = document.getElementById('cnpj-input');
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
