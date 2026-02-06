@props(['naturezasJuridicas'])

<div class="mb-10 border-b border-gray-100 pb-10"
     x-data="{
        // Dados
        naturezas: @js($naturezasJuridicas),
        portes: [
            {id: '', texto: 'Todos'},
            {id: '01', texto: 'ME (Microempresa)'},
            {id: '03', texto: 'EPP (Emp Pequeno Porte)'},
            {id: '05', texto: 'Demais'}
        ],
        
        // Natureza Logic
        natId: '',
        natTexto: '',
        natAberto: false,
        
        // Porte Logic
        porteId: '',
        porteTexto: '',
        porteAberto: false,

        // Filtros
        get naturezasFiltradas() {
            if (this.natTexto === '') return this.naturezas;
            return this.naturezas.filter(n => {
                const termo = this.natTexto.toLowerCase();
                const textoCompleto = (n.codigo + ' - ' + n.descricao).toLowerCase();
                return textoCompleto.includes(termo);
            }).slice(0, 100);
        },

        get portesFiltrados() {
            if (this.porteTexto === '') return this.portes;
            return this.portes.filter(p => p.texto.toLowerCase().includes(this.porteTexto.toLowerCase()));
        },

        // Ações Natureza
        selecionarNat(nat) {
            this.natId = nat.codigo;
            this.natTexto = nat.codigo + ' - ' + nat.descricao;
            this.natAberto = false;
        },
        limparNat() {
            this.natId = '';
            this.natTexto = '';
            this.natAberto = false;
        },

        // Ações Porte
        selecionarPorte(porte) {
            this.porteId = porte.id;
            this.porteTexto = porte.texto;
            this.porteAberto = false;
        },
        limparPorte() {
            this.porteId = '';
            this.porteTexto = '';
            this.porteAberto = false;
        }
     }">

    <h3 class="text-[#013886] font-bold text-lg flex items-center gap-2 mb-6">
        <i class="bi bi-info-circle-fill"></i> Informações Cadastrais
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        
        <!-- Situação Cadastral (5 colunas) - CHECKBOXES MANTIDOS -->
        <div class="md:col-span-5">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Situação Cadastral</label>
            <div class="grid grid-cols-2 gap-y-3 gap-x-4">
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="checkbox" name="situacao[]" value="02" class="w-5 h-5 rounded border-gray-300 text-[#019171] focus:ring-[#019171] cursor-pointer" checked>
                    <span class="ml-2 text-sm text-gray-700 group-hover:text-[#019171] transition-colors">Ativa</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="checkbox" name="situacao[]" value="08" class="w-5 h-5 rounded border-gray-300 text-red-600 focus:ring-red-600 cursor-pointer">
                    <span class="ml-2 text-sm text-gray-700 group-hover:text-red-600 transition-colors">Baixada</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="checkbox" name="situacao[]" value="04" class="w-5 h-5 rounded border-gray-300 text-yellow-600 focus:ring-yellow-600 cursor-pointer">
                    <span class="ml-2 text-sm text-gray-700 group-hover:text-yellow-600 transition-colors">Inapta</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="checkbox" name="situacao[]" value="03" class="w-5 h-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500 cursor-pointer">
                    <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Suspensa</span>
                </label>
                <label class="inline-flex items-center cursor-pointer group">
                    <input type="checkbox" name="situacao[]" value="01" class="w-5 h-5 rounded border-gray-300 text-gray-400 focus:ring-gray-400 cursor-pointer">
                    <span class="ml-2 text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Nula</span>
                </label>
            </div>
        </div>

        <!-- Natureza Jurídica (4 colunas) -->
        <div class="md:col-span-4 relative" @click.outside="natAberto = false">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Natureza Jurídica</label>
            <div class="relative">
                <input type="text" 
                       x-model="natTexto"
                       @focus="natAberto = true"
                       @input="natAberto = true; natId = ''" 
                       placeholder="Selecione a Natureza..." 
                       class="w-full bg-gray-50 border border-gray-200 text-[#232323] rounded-xl py-3 pl-4 pr-10 focus:ring-2 focus:ring-[#013886] focus:border-[#013886] outline-none transition-all placeholder-gray-400 autocomplete-off">
                
                <input type="hidden" name="natureza_juridica" :value="natId">

                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="natTexto">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="limparNat()"></i>
                    </template>
                    <template x-if="!natTexto">
                        <i class="bi bi-chevron-down text-[#013886]" @click="natAberto = !natAberto"></i>
                    </template>
                </div>

                <div x-show="natAberto" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="nat in naturezasFiltradas" :key="nat.codigo">
                            <li @click="selecionarNat(nat)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors">
                                <span x-text="nat.codigo + ' - ' + nat.descricao"></span>
                            </li>
                        </template>
                        <li x-show="naturezasFiltradas.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhuma natureza encontrada.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Porte (3 colunas) -->
        <div class="md:col-span-3 relative" @click.outside="porteAberto = false">
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Porte</label>
            <div class="relative">
                <input type="text" 
                       x-model="porteTexto"
                       @focus="porteAberto = true"
                       @input="porteAberto = true; porteId = ''" 
                       placeholder="Selecione o Porte..." 
                       class="w-full bg-gray-50 border border-gray-200 text-[#232323] rounded-xl py-3 pl-4 pr-10 focus:ring-2 focus:ring-[#013886] focus:border-[#013886] outline-none transition-all placeholder-gray-400 autocomplete-off">
                
                <input type="hidden" name="porte" :value="porteId">

                <div class="absolute inset-y-0 right-0 flex items-center px-4 cursor-pointer">
                    <template x-if="porteTexto">
                        <i class="bi bi-x text-gray-400 hover:text-red-500" @click="limparPorte()"></i>
                    </template>
                    <template x-if="!porteTexto">
                        <i class="bi bi-chevron-down text-[#013886]" @click="porteAberto = !porteAberto"></i>
                    </template>
                </div>

                <div x-show="porteAberto" 
                     class="absolute z-50 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                     style="display: none;"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <ul>
                        <template x-for="porte in portesFiltrados" :key="porte.id">
                            <li @click="selecionarPorte(porte)" 
                                class="px-4 py-3 hover:bg-[#e6f0ff] hover:text-[#013886] cursor-pointer text-sm border-b border-gray-50 last:border-0 transition-colors">
                                <span x-text="porte.texto"></span>
                            </li>
                        </template>
                        <li x-show="portesFiltrados.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
                            Nenhum porte encontrado.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>