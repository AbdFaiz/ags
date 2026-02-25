@props([
    'href' => 'https://wa.me/6281110002425',
    'rounded' => true
])

@php
    // Base classes untuk semua tombol
    $baseClasses = 'inline-block text-center px-10 py-4 bg-white text-black font-bold text-[10px] uppercase tracking-[0.3em] transition-all duration-500 border border-white hover:bg-transparent hover:text-white';
    
    // Logic untuk rounded
    $rounding = $rounded ? 'rounded-full' : 'rounded-none';
    
    $classes = "{$baseClasses} {$rounding}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif