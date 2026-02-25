@props([
    'label' => 'No Label', 
    'value' => '-', 
    'href' => '#'
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'block group/link']) }}>
    <span class="text-neutral-600 text-[10px] uppercase block mb-1 tracking-wider">{{ $label }}</span>
    <span class="text-neutral-400 font-medium tracking-tight text-base group-hover/link:text-white transition-colors break-all">
        {{ $value }}
    </span>
</a>