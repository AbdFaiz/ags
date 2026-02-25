@props(['href', 'icon'])
<a href="{{ $href }}"
    class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white hover:text-black transition-all">
    <i class="{{ $icon }}"></i>
</a>