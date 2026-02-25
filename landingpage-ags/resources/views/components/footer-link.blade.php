<li>
    <a {{ $attributes->merge(['href' => $href, 'class' => 'text-slate-500 hover:text-white text-[10px] transition-colors uppercase tracking-widest font-bold']) }}>
        {{ $slot }}
    </a>
</li>