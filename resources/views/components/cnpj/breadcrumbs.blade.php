@props(['items' => []])

<nav {{ $attributes->merge(['class' => 'flex mb-8 text-sm text-gray-500 animate-fade-in-down']) }} aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        
        <!-- Link Início (Padrão) -->
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-gray-400 hover:text-[#013886] transition-colors font-medium">
                <i class="bi bi-house-door-fill mr-2 text-base"></i>
                Início
            </a>
        </li>
        
        <!-- Itens Dinâmicos -->
        @foreach($items as $item)
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-300 text-xs mx-2"></i>
                    
                    @if(isset($item['url']) && $item['url'])
                        <a href="{{ $item['url'] }}" class="text-gray-400 hover:text-[#013886] transition-colors font-medium">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <!-- Se não tiver URL, verifica se é o último para destacar, senão mantém cinza -->
                        <span class="{{ $loop->last ? 'text-[#013886] font-semibold' : 'text-gray-400 font-medium' }} truncate max-w-[150px] md:max-w-[300px]" title="{{ $item['label'] }}">
                            {{ $item['label'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach

    </ol>
</nav>