@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 mt-8">
    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-500 flex-shrink-0">
                <i class="bi bi-shield-lock text-2xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-[#232323] mb-1">Remoção de Dados</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xl">
                    Você é o sócio ou representante legal desta empresa? Caso deseje, você pode solicitar a remoção destes dados públicos em nossa plataforma.
                </p>
            </div>
        </div>

        <!-- Link para a futura página (rota placeholder '#') -->
        <a href="#" class="whitespace-nowrap px-6 py-3 rounded-xl bg-white border border-red-100 text-red-600 font-semibold text-sm hover:bg-red-50 hover:border-red-200 transition-all shadow-sm flex items-center gap-2 group">
            <i class="bi bi-flag group-hover:scale-110 transition-transform"></i>
            Solicitar Remoção
        </a>

    </div>
</div>