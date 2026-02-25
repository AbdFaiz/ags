@props(['href'])

@php
    $isAnchor = str_starts_with($href, '#');
    
    $finalHref = ($isAnchor && !request()->is('/')) 
                ? url('/') . $href 
                : $href;
@endphp

<a {{ $attributes->merge([
    'href' => $finalHref, 
    'class' => 'px-6 py-2.5 text-[10px] font-extrabold text-white/50 hover:text-white transition-colors tracking-[0.2em] uppercase'
]) }}>
    {{ $slot }}
</a>