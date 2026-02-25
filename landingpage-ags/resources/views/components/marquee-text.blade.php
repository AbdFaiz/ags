<div {{ $attributes->merge(['class' => 'w-full py-4 border-b border-neutral-900 bg-neutral-950/50 relative overflow-hidden']) }}
     style="mask-image: linear-gradient(to right, transparent, black 15%, black 50%, black 85%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 50%, black 85%, transparent);">
    
    <div class="flex whitespace-nowrap animate-marquee font-mono text-[9px] text-blue-900 uppercase tracking-[1em]"
         style="animation: marquee {{ $speed }} linear infinite;">
        
        <span>&nbsp; {{ $text }} • {{ $text }} • &nbsp;</span>
        <span>&nbsp; {{ $text }} • {{ $text }} • &nbsp;</span>
    </div>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: inline-flex;
        width: max-content;
    }
</style>