<div
    {{ $attributes->merge(['class' => 'p-12 border-b border-neutral-800 flex-1 hover:bg-neutral-950 transition-colors group']) }}>
    <div class="w-12 h-px bg-neutral-100 mb-8 transition-all group-hover:w-20 group-hover:bg-blue-500"></div>
    <h4 class="text-lg font-bold mb-4 uppercase tracking-tighter">{{ $title }}</h4>
    <p class="text-neutral-500 text-sm font-light leading-relaxed group-hover:text-neutral-300">
        {{ $description }}
    </p>
</div>