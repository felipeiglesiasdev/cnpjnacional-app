<section class="py-24 bg-[#013886] relative overflow-hidden">
    <!-- Elementos Decorativos de Fundo -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-[#019171] opacity-20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-[#ffd51b] opacity-10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Coluna de Texto -->
            <div class="order-2 lg:order-1">
                <span class="text-[#ffd51b] font-bold tracking-wider uppercase text-xs mb-2 block flex items-center gap-2">
                    <i class="bi bi-code-square"></i> Para Desenvolvedores
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                    API Robusta para <br>
                    <span class="text-[#019171]">Integração Direta</span>
                </h2>
                <p class="text-blue-100 text-lg font-light leading-relaxed mb-8 opacity-90">
                    Automatize processos e enriqueça seu ERP, CRM ou aplicação com dados oficiais atualizados. Nossa API RESTful entrega respostas em JSON padronizado com alta disponibilidade e baixa latência.
                </p>

                <ul class="space-y-4 mb-10">
                    <li class="flex items-start gap-3 text-white/90">
                        <div class="mt-1 w-5 h-5 rounded-full bg-[#019171]/20 flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-check text-[#019171] text-sm"></i>
                        </div>
                        <span class="font-light">Endpoints para consulta por CNPJ, CNAE e Sócios.</span>
                    </li>
                    <li class="flex items-start gap-3 text-white/90">
                        <div class="mt-1 w-5 h-5 rounded-full bg-[#019171]/20 flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-check text-[#019171] text-sm"></i>
                        </div>
                        <span class="font-light">Documentação completa (Swagger/OpenAPI).</span>
                    </li>
                    <li class="flex items-start gap-3 text-white/90">
                        <div class="mt-1 w-5 h-5 rounded-full bg-[#019171]/20 flex items-center justify-center flex-shrink-0">
                            <i class="bi bi-check text-[#019171] text-sm"></i>
                        </div>
                        <span class="font-light">SLA de 99.9% e suporte técnico dedicado.</span>
                    </li>
                </ul>

                <a href="#" class="inline-flex items-center gap-2 bg-white text-[#013886] font-bold py-3.5 px-8 rounded-full shadow-lg hover:bg-[#ffd51b] hover:text-[#013886] transition-all duration-300 group hover:-translate-y-1">
                    <i class="bi bi-file-earmark-code"></i>
                    <span>Ver Documentação</span>
                    <i class="bi bi-arrow-right opacity-0 -ml-2 group-hover:opacity-100 group-hover:ml-0 transition-all duration-300"></i>
                </a>
            </div>

            <!-- Coluna Visual (Code Block) -->
            <div class="order-1 lg:order-2 relative group">
                <!-- Efeito Glow atrás do código -->
                <div class="absolute -inset-1 bg-gradient-to-r from-[#019171] to-[#ffd51b] rounded-2xl opacity-20 blur-lg group-hover:opacity-30 transition-opacity duration-500"></div>

                <div class="relative bg-[#0d1117] rounded-2xl border border-gray-700 shadow-2xl overflow-hidden font-mono text-sm leading-relaxed transform transition-transform duration-500 group-hover:scale-[1.01]">
                    <!-- Barra de Título do Code Block -->
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-800 bg-[#161b22]">
                        <div class="flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <span class="text-gray-500 text-xs font-semibold tracking-wide">GET /api/v1/company/{cnpj}</span>
                    </div>

                    <!-- Conteúdo do Código -->
                    <div class="p-6 overflow-x-auto">
<pre class="text-blue-100"><code><span class="text-purple-400">const</span> response <span class="text-purple-400">=</span> <span class="text-purple-400">await</span> fetch(<span class="text-green-400">'https://api.cnpjnacional.com/v1/cnpj/00000000000191'</span>, {
    <span class="text-orange-400">headers</span>: {
        <span class="text-green-400">'Authorization'</span>: <span class="text-green-400">'Bearer YOUR_API_KEY'</span>
    }
});

<span class="text-purple-400">const</span> data <span class="text-purple-400">=</span> <span class="text-purple-400">await</span> response.json();

<span class="text-gray-500">// Exemplo de Resposta:</span>
{
    <span class="text-blue-400">"cnpj"</span>: <span class="text-green-400">"00.000.000/0001-91"</span>,
    <span class="text-blue-400">"razao_social"</span>: <span class="text-green-400">"BANCO DO BRASIL SA"</span>,
    <span class="text-blue-400">"status"</span>: <span class="text-green-400">"ATIVA"</span>,
    <span class="text-blue-400">"capital_social"</span>: <span class="text-orange-400">9000000000.00</span>,
    <span class="text-blue-400">"endereco"</span>: {
        <span class="text-blue-400">"uf"</span>: <span class="text-green-400">"DF"</span>,
        <span class="text-blue-400">"cidade"</span>: <span class="text-green-400">"BRASILIA"</span>
    }
}</code></pre>
                    </div>
                </div>
                
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-xl shadow-xl flex items-center gap-3 animate-pulse hidden md:flex border border-gray-100">
                    <div class="w-10 h-10 bg-[#019171] rounded-full flex items-center justify-center text-white shadow-sm">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Latência Média</p>
                        <p class="text-[#013886] font-bold text-lg leading-none">< 50ms</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>