@php
    $isModern = $type === 'modern';
@endphp

<div class="flex gap-8 {{ $isModern ? 'group/item' : '' }}">
    <div @class([
        'w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 transition-all duration-500',
        'bg-white text-black border group-hover/item:rotate-5 group-hover/item:bg-transparent group-hover/item:text-white' => $isModern,
        'border border-neutral-800 text-neutral-500' => !$isModern,
    ])>
        <i class="fas {{ $icon }} {{ !$isModern ? 'text-sm' : '' }}"></i>
    </div>

    <div class="space-y-2">
        <h5 @class([
            'font-bold uppercase text-xs tracking-[0.2em] transition-all',
            'text-white group-hover/item:underline' => $isModern,
            'text-neutral-500' => !$isModern,
        ])>
            {{ $title }}
        </h5>
        <p @class([
            'text-sm font-light leading-relaxed',
            'text-neutral-400 group-hover/item:text-neutral-300' => $isModern,
            'text-neutral-500' => !$isModern,
        ])>
            {{ $description }}
        </p>
    </div>
</div>