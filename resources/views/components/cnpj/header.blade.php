@props(['data'])

<div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 relative overflow-hidden group">
    <!-- Detalhe decorativo no topo -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#013886] to-[#019171]"></div>

    <div class="flex flex-col md:flex-row gap-6 items-start">
        <!-- Logo Placeholder (Iniciais) -->
        <div class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-[#013886] to-[#00285f] flex items-center justify-center flex-shrink-0 shadow-lg text-white font-bold text-3xl md:text-4xl">
            {{ substr($data['razao_social'] ?? 'E', 0, 1) }}
        </div>

        <div class="flex-1">
            <div class="flex flex-wrap items-center gap-3 mb-2">
                <span class="bg-blue-50 text-[#013886] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-100">
                    {{ $data['matriz_ou_filial'] ?? 'Matriz' }}
                </span>
                <span class="text-gray-400 text-sm flex items-center gap-1">
                    <i class="bi bi-hash"></i> {{ $data['cnpj_completo'] ?? '' }}
                </span>
            </div>

            <!-- Título Principal Corrigido: Verifica se nome_fantasia não é vazio -->
            <h1 class="text-2xl md:text-3xl font-bold text-[#232323] mb-2 leading-tight">
                {{ !empty($data['nome_fantasia']) ? $data['nome_fantasia'] : ($data['razao_social'] ?? '') }}
            </h1>
            
            <!-- Subtítulo: Só exibe Razão Social se o Nome Fantasia estiver sendo usado acima -->
            @if(!empty($data['nome_fantasia']))
                <p class="text-gray-500 font-light text-sm mb-4">{{ $data['razao_social'] ?? '' }}</p>
            @endif

            <div class="flex flex-wrap gap-4 mt-4">
                <button class="text-sm font-medium text-gray-500 hover:text-[#013886] flex items-center gap-2 transition-all duration-300 ease-in-out group/btn hover:translate-x-1" onclick="copyCnpjToClipboard('{{ $data['cnpj_completo'] ?? '' }}', this)">
                    <i class="bi bi-clipboard group-hover/btn:scale-110 transition-transform duration-300"></i> 
                    <span class="btn-text">Copiar CNPJ</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function copyCnpjToClipboard(text, btnElement) {
        if (!text) return;

        // Tenta usar a API Clipboard moderna
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(() => {
                showCopyFeedback(btnElement);
            }).catch(err => {
                console.error('Erro ao copiar via API: ', err);
                fallbackCopyTextToClipboard(text, btnElement);
            });
        } else {
            // Fallback para navegadores mais antigos ou contextos não seguros (http)
            fallbackCopyTextToClipboard(text, btnElement);
        }
    }

    function fallbackCopyTextToClipboard(text, btnElement) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        
        // Garante que o textarea não seja visível
        textArea.style.position = "fixed";
        textArea.style.left = "-9999px";
        textArea.style.top = "0";
        document.body.appendChild(textArea);
        
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            if (successful) {
                showCopyFeedback(btnElement);
            } else {
                console.error('Fallback: Comando de cópia falhou.');
            }
        } catch (err) {
            console.error('Fallback: Erro ao copiar', err);
        }

        document.body.removeChild(textArea);
    }

    function showCopyFeedback(btnElement) {
        const originalText = btnElement.querySelector('.btn-text').innerText;
        const icon = btnElement.querySelector('i');
        
        // Feedback visual
        btnElement.querySelector('.btn-text').innerText = 'Copiado!';
        icon.classList.replace('bi-clipboard', 'bi-check-circle-fill');
        icon.classList.add('text-green-500');

        setTimeout(() => {
            btnElement.querySelector('.btn-text').innerText = originalText;
            icon.classList.replace('bi-check-circle-fill', 'bi-clipboard');
            icon.classList.remove('text-green-500');
        }, 2000);
    }
</script>