@props(['cnaes'])

<div class="mb-10 border-b border-gray-100 pb-10"
     x-data="{
        todosCnaes: @js($cnaes),
        
        // Dados CNAE Principal
        cnaePrincipalId: '',       // O valor real (código) que será enviado
        cnaePrincipalTexto: '',    // O texto exibido no input
        cnaePrincipalAberto: false, // Controle do dropdown
        
        // Dados CNAE Secundário
        termoPesquisa: '',
        cnaesSecundariosSelecionados: [],
        maxSecundarios: 2,
        cnaeSecundarioAberto: false, // Controle do dropdown secundário
        
        // Filtro para o Principal
        get cnaesPrincipalFiltrados() {
            const termo = this.cnaePrincipalTexto.toLowerCase();
            
            // Se o campo estiver vazio, retorna todos os CNAEs
            if (termo === '') {
                return this.todosCnaes;
            }
            
            return this.todosCnaes.filter(cnae => {
                return cnae.texto.toLowerCase().includes(termo);
            }).slice(0, 100); // Limita resultados da busca para performance
        },

        selecionarPrincipal(cnae) {
            this.cnaePrincipalId = cnae.id;
            this.cnaePrincipalTexto = cnae.texto; // Preenche o input com o texto formatado
            this.cnaePrincipalAberto = false;     // Fecha o dropdown
        },

        limparPrincipal() {
            this.cnaePrincipalId = '';
            this.cnaePrincipalTexto = '';
            this.cnaePrincipalAberto = false; 
        },

        // Filtro para Secundários
        get cnaesFiltrados() {
            const termo = this.termoPesquisa.toLowerCase();
            
            // Filtra por termo (ou mostra todos se vazio), e remove os já selecionados ou iguais ao principal
            return this.todosCnaes.filter(cnae => {
                const matchesTerm = termo === '' || cnae.texto.toLowerCase().includes(termo);
                const notSelected = !this.cnaesSecundariosSelecionados.some(sel => sel.id === cnae.id);
                const notPrincipal = cnae.id !== this.cnaePrincipalId;
                
                return matchesTerm && notSelected && notPrincipal;
            }).slice(0, 50);
        },

        adicionarSecundario(cnae) {
            if (this.cnaesSecundariosSelecionados.length < this.maxSecundarios) {
                this.cnaesSecundariosSelecionados.push(cnae);
                this.termoPesquisa = '';
                this.cnaeSecundarioAberto = false;
            }
        },

        removerSecundario(index) {
            this.cnaesSecundariosSelecionados.splice(index, 1);
        }
     }">

    <h3 class="text-[#013886] font-bold text-lg flex items-center gap-2 mb-6">
        <i class="bi bi-briefcase-fill"></i> Atividade Econômica (CNAE)
    </h3>
    
    <div class="grid grid-cols-1 gap-8">
        
        <!-- LINHA 1: CNAE Principal -->
        <div class="relative" @click.outside="cnaePrincipalAberto = false">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">
                Atividade Principal (Única)
            </label>
            
            <div class="relative">
                <!-- Input visível para pesquisa -->
                <input type="text" 
                       x-model="cnaePrincipalTexto"
                       @focus="cnaePrincipalAberto = true"
                       @input="cnaePrincipalAberto = true; cnaePrincipalId = ''" 
                       placeholder="Digite o código ou nome da atividade principal..." 
                       class="w-full bg-gray-50 border border-gray-200 text-[#232323] rounded-xl py-3 pl-4 pr-10 focus:ring-2 focus:ring-[#013886] focus:border-[#013886] outline-none transition-all placeholder-gray-400 autocomplete-off">
                
                <!-- Input Hidden com o valor real (ID) para envio do form -->
                <input type="hidden" name="cnae_principal" :value="cnaePrincipalId">

                <!-- Ícone ou Botão Limpar -->
                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="cnaePrincipalTexto">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="limparPrincipal()"></i>
                    </template>
                    <template x-if="!cnaePrincipalTexto">
                        <!-- Clica na seta para abrir também -->
                        <i class="bi bi-chevron-down text-[#013886]" @click="cnaePrincipalAberto = !cnaePrincipalAberto"></i>
                    </template>
                </div>

                <!-- Dropdown de Sugestões Principal -->
                <div x-show="cnaePrincipalAberto" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="cnae in cnaesPrincipalFiltrados" :key="cnae.id">
                            <li @click="selecionarPrincipal(cnae)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors">
                                <span x-text="cnae.texto"></span>
                            </li>
                        </template>
                        <li x-show="cnaesPrincipalFiltrados.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhum CNAE encontrado.
                        </li>
                    </ul>
                </div>
            </div>
            <p class="text-[10px] text-gray-400 mt-1 ml-1">Selecione apenas uma atividade principal.</p>
        </div>

        <!-- LINHA 2: CNAEs Secundários -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">
                    Atividades Secundárias (Opcional)
                </label>
                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-gray-100 text-gray-500" 
                      x-text="cnaesSecundariosSelecionados.length + '/' + maxSecundarios"></span>
            </div>

            <!-- Campo de Busca/Adição -->
            <div class="relative mb-4" @click.outside="cnaeSecundarioAberto = false">
                <input type="text" 
                       x-model="termoPesquisa"
                       @focus="cnaeSecundarioAberto = true"
                       @input="cnaeSecundarioAberto = true"
                       placeholder="Pesquise para adicionar atividades secundárias..." 
                       class="w-full bg-gray-50 border border-gray-200 text-[#232323] rounded-xl py-3 pl-4 pr-10 focus:ring-2 focus:ring-[#013886] focus:border-[#013886] outline-none transition-all placeholder-gray-400"
                       :disabled="cnaesSecundariosSelecionados.length >= maxSecundarios"
                       autocomplete="off">
                
                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="termoPesquisa">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="termoPesquisa = ''; cnaeSecundarioAberto = true"></i>
                    </template>
                    <template x-if="!termoPesquisa">
                        <i class="bi bi-chevron-down text-[#013886]" @click="if(cnaesSecundariosSelecionados.length < maxSecundarios) cnaeSecundarioAberto = !cnaeSecundarioAberto"></i>
                    </template>
                </div>

                <!-- Lista de Sugestões (Dropdown) -->
                <div x-show="cnaeSecundarioAberto" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="cnae in cnaesFiltrados" :key="cnae.id">
                            <li @click="adicionarSecundario(cnae)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors flex items-center justify-between group">
                                <span x-text="cnae.texto"></span>
                                <i class="bi bi-plus-circle text-[#013886] opacity-0 group-hover:opacity-100"></i>
                            </li>
                        </template>
                        <li x-show="cnaesFiltrados.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhuma atividade encontrada.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Lista de Selecionados (Tags) -->
            <div class="flex flex-col gap-2 min-h-[40px] p-3 bg-white rounded-xl border border-dashed border-gray-200">
                <template x-if="cnaesSecundariosSelecionados.length === 0">
                    <span class="text-xs text-gray-400 italic self-center">Nenhuma atividade secundária adicionada.</span>
                </template>

                <template x-for="(cnae, index) in cnaesSecundariosSelecionados" :key="cnae.id">
                    <div class="flex items-center justify-between gap-3 bg-[#e6f0ff] text-[#013886] px-4 py-3 rounded-lg border border-blue-100 text-sm animate-fade-in-down">
                        <!-- Input hidden para enviar no form -->
                        <input type="hidden" name="cnaes_secundarios[]" :value="cnae.id">
                        
                        <div class="flex flex-col">
                            {{-- O usuário pediu código formatado e descrição completa --}}
                            {{-- cnae.texto já contém "Código Formatado - Descrição" --}}
                            <span class="text-sm font-medium leading-tight" x-text="cnae.texto"></span>
                        </div>
                        
                        <button type="button" @click="removerSecundario(index)" class="hover:text-red-500 transition-colors p-1 rounded-full hover:bg-white/50">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </template>
            </div>
            <p class="text-[10px] text-gray-400 mt-1 ml-1" x-show="cnaesSecundariosSelecionados.length >= maxSecundarios">
                Limite de <span x-text="maxSecundarios"></span> atividades atingido.
            </p>
        </div>

    </div>
</div>