<a href="{{ $href }}" target="_blank"
    {{ $attributes->merge([
        'class' =>
            'bg-white text-black hover:bg-emerald-400 px-8 py-3 rounded-full 
             text-[10px] font-black uppercase tracking-[0.2em] 
             transition-all duration-500 shadow-lg 
             flex items-center gap-2 active:scale-95'
    ]) }}>
    <i class="fab fa-whatsapp text-sm"></i>
    <span>{{ $slot ?? 'Hubungi Kami' }}</span>
</a>
