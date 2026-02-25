@props([
    'align' => 'left',
    'title' => 'Title',
    'description' => 'Lorem ipsum'
])

<div {{ $attributes->merge(['class' => 'group ' . ($align === 'right' ? 'lg:text-right' : '')]) }}>
    <h4 class="text-white font-bold uppercase tracking-[0.2em] text-sm mb-3 transition-colors">
        {{ $title }}
    </h4>
    <p class="text-neutral-600 text-[10px] uppercase leading-relaxed tracking-wider group-hover:text-neutral-400 transition-colors">
        {{ $description }}
    </p>
</div>