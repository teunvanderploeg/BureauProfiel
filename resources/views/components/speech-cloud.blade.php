<a href="{{ route($route) }}"
   class="text-white font-bold whitespace-nowrap cursor-pointer px-7 py-2 rounded-r-2xl transition border border-4 hover:text-black hover:bg-bp_white
   @if($direction === 'top') rounded-b-2xl @elseif($direction === 'bottom') rounded-t-2xl @else rounded-l-2xl @endif
   @if($color === 'orange') bg-bp_orange border-bp_orange @elseif($color === 'purple') bg-bp_purple border-bp_purple @endif
   {{$class ?? null}}">
    {{ $text ?? null }}
</a>
