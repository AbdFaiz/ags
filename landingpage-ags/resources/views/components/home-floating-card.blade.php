@props([
    'href' => null,
    'type' => 'button',
    'color' => 'blue',
    'icon' => 'fa-solid fa-microchip',
    'label' => 'Label',
    'title' => 'Title',
    'rounded' => true
])

@php
    $colors = [
        'blue' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-400'],
        'emerald' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-emerald-400'],
        'amber' => ['bg' => 'bg-amber-500/20', 'text' => 'text-amber-400'],
    ];
    $selectedColor = $colors[$color] ?? $colors['blue'];
@endphp

<div {{ $attributes->merge(['class' => 'absolute bg-black/80 backdrop-blur-xl border border-white/10 p-5 rounded-2xl shadow-2xl transition-transform duration-500 hover:-translate-y-2']) }}>
    <div class="flex items-center gap-4">
        <div class="w-10 h-10 rounded-full {{ $selectedColor['bg'] }} flex items-center justify-center">
            <i class="{{ $icon }} {{ $selectedColor['text'] }} text-sm"></i>
        </div>
        <div>
            <p class="text-[9px] font-black text-white/40 uppercase tracking-[0.2em]">{{ $label }}</p>
            <p class="text-xs font-bold text-white tracking-wide">{{ $title }}</p>
        </div>
    </div>
</div>