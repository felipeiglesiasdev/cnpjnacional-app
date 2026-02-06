@if(session('success_remocao'))
    <div x-data="{ show: true }"
         x-show="show"
         style="display: none;" 
         class="relative z-[100]" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        
        <!-- 
            Backdrop (Fundo Escuro e Embaçado)
            Adicionado backdrop-blur-sm para o efeito de desfoque solicitado
        -->
        <div x-show="show"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity"></div>

        <!-- Container do Modal (Centralização e Scroll) -->
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                
                <!-- Card do Modal -->
                <div x-show="show"
                     @click.outside="show = false"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm border border-gray-100">
                    
                    <!-- Conteúdo do Card -->
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- Ícone -->
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            
                            <!-- Textos -->
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Sucesso!</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ session('success_remocao') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão Fechar -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" 
                                @click="show = false" 
                                class="cursor-pointer inline-flex w-full justify-center rounded-lg bg-[#013886] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#012d6b] sm:ml-3 sm:w-auto transition-colors focus:outline-none focus:ring-2 focus:ring-[#013886] focus:ring-offset-2">
                            Entendido
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif