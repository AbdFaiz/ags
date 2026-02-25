@props(['showText' => true])

<div {{ $attributes->merge(['class' => 'flex items-center gap-4 group']) }}>

    <img src="{{ asset('img/3dlogowotxt.webp') }}" class="h-10 w-auto" alt="Logo">

    @if($showText)
        <div class="hidden lg:flex flex-col border-l border-white/10 pl-4">
            <span class="text-[10px] font-black text-white tracking-[0.6em] uppercase leading-none">
                Adidata
            </span>

            <span class="text-[9px] font-medium text-white/40 tracking-widest uppercase mt-1">
                Global Sistem
            </span>
        </div>
    @endif

</div>
