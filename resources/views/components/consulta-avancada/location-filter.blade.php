@props(['estados', 'cidadesPorEstado'])

{{-- Prepara o array de estados para o formato JS --}}
@php
    $estadosArray = [];
    foreach($estados as $sigla => $nome) {
        $estadosArray[] = ['id' => $sigla, 'texto' => $nome];
    }
@endphp

<div class="mb-10 border-b border-gray-100 pb-10" 
     x-data="{ 
        // Dados
        estados: @js($estadosArray),
        cidadesPorEstado: @js($cidadesPorEstado),
        cidadesDisponiveis: [],
        
        // Lógica de Estado
        ufId: '',
        ufTexto: '',
        ufAberto: false,
        
        // Lógica de Cidade
        cidadeId: '',
        cidadeTexto: '',
        cidadeAberto: false,

        // Filtro de Estados
        get estadosFiltrados() {
            if (this.ufTexto === '') return this.estados;
            return this.estados.filter(e => e.texto.toLowerCase().includes(this.ufTexto.toLowerCase()));
        },

        // Filtro de Cidades
        get cidadesFiltradas() {
            if (this.cidadeTexto === '') return this.cidadesDisponiveis;
            return this.cidadesDisponiveis.filter(c => c.nome.toLowerCase().includes(this.cidadeTexto.toLowerCase()));
        },

        // Ações de Estado
        selecionarEstado(estado) {
            this.ufId = estado.id;
            this.ufTexto = estado.texto;
            this.ufAberto = false;
            this.atualizarCidades(estado.id);
        },

        limparEstado() {
            this.ufId = '';
            this.ufTexto = '';
            this.cidadesDisponiveis = [];
            this.limparCidade();
        },

        atualizarCidades(uf) {
            this.limparCidade();
            if (uf && this.cidadesPorEstado[uf]) {
                this.cidadesDisponiveis = this.cidadesPorEstado[uf];
            } else {
                this.cidadesDisponiveis = [];
            }
        },

        // Ações de Cidade
        selecionarCidade(cidade) {
            this.cidadeId = cidade.codigo; // Envia o código IBGE
            this.cidadeTexto = cidade.nome;
            this.cidadeAberto = false;
        },

        limparCidade() {
            this.cidadeId = '';
            this.cidadeTexto = '';
            this.cidadeAberto = false;
        }
     }">
    
    <h3 class="text-[#013886] font-bold text-lg flex items-center gap-2 mb-6">
        <i class="bi bi-geo-alt-fill"></i> Localização
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        
        <!-- Estado (6 colunas) -->
        <div class="md:col-span-6 relative" @click.outside="ufAberto = false">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Estado (UF)</label>
            <div class="relative">
                <input type="text" 
                       x-model="ufTexto"
                       @focus="ufAberto = true"
                       @input="ufAberto = true; ufId = ''" 
                       placeholder="Selecione o Estado..." 
                       class="w-full bg-gray-50 border border-gray-200 text-[#232323] rounded-xl py-3 pl-4 pr-10 focus:ring-2 focus:ring-[#013886] focus:border-[#013886] outline-none transition-all placeholder-gray-400 autocomplete-off">
                
                <input type="hidden" name="uf" :value="ufId">

                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="ufTexto">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="limparEstado()"></i>
                    </template>
                    <template x-if="!ufTexto">
                        <i class="bi bi-chevron-down text-[#013886]" @click="ufAberto = !ufAberto"></i>
                    </template>
                </div>

                <div x-show="ufAberto" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="estado in estadosFiltrados" :key="estado.id">
                            <li @click="selecionarEstado(estado)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors">
                                <span x-text="estado.texto"></span>
                            </li>
                        </template>
                        <li x-show="estadosFiltrados.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhum estado encontrado.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Cidade (6 colunas) -->
        <div class="md:col-span-6 relative" @click.outside="cidadeAberto = false">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Cidade</label>
            <div class="relative">
                <input type="text" 
                       x-model="cidadeTexto"
                       @focus="cidadeAberto = true"
                       @input="cidadeAberto = true; cidadeId = ''" 
                       placeholder="Selecione a Cidade..." 
                       :disabled="!ufId"
                       :class="!ufId ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-gray-50 text-[#232323] cursor-pointer focus:ring-2 focus:ring-[#013886] focus:border-[#013886]'"
                       class="w-full border border-gray-200 rounded-xl py-3 pl-4 pr-10 outline-none transition-all placeholder-gray-400 autocomplete-off">
                
                <input type="hidden" name="cidade" :value="cidadeId">

                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="cidadeTexto">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="limparCidade()"></i>
                    </template>
                    <template x-if="!cidadeTexto">
                        <i class="bi bi-chevron-down text-[#013886]" @click="if(ufId) cidadeAberto = !cidadeAberto"></i>
                    </template>
                </div>

                <div x-show="cidadeAberto && ufId" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="cidade in cidadesFiltradas" :key="cidade.codigo">
                            <li @click="selecionarCidade(cidade)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors">
                                <span x-text="cidade.nome"></span>
                            </li>
                        </template>
                        <li x-show="cidadesFiltradas.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhuma cidade encontrada.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>