<section class="relative w-full bg-[#019171] min-h-[650px] flex items-center overflow-hidden py-20 lg:py-0">
    
    <!-- Canvas Background -->
    <canvas id="neuralNetworkCanvas" class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-60"></canvas>

    <!-- Conteúdo Principal -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <!-- Coluna da Esquerda: Texto de Impacto -->
            <div class="text-left order-2 lg:order-1">
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
            <div class="relative order-1 lg:order-2">
                <!-- Efeito Glow atrás do card -->
                <div class="absolute -inset-2 bg-gradient-to-tr from-[#ffd51b]/40 to-white/10 rounded-[2rem] blur-2xl opacity-40 animate-pulse"></div>

                <div class="relative bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-[2rem] shadow-2xl">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-white">Consultar Empresa</h3>
                        <p class="text-white/60 text-sm mt-1">Busque na base nacional de forma gratuita.</p>
                    </div>
                    
                    <form action="#" method="GET" class="space-y-5">
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
                            Base de dados segura. <a href="#" class="text-[#ffd51b] hover:text-[#fff] transition-colors underline decoration-dotted">Política de Privacidade</a>.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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
