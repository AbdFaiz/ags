<div x-data="{ open: false }"
    class="group relative bg-neutral-950 border border-neutral-900 transition-all duration-700 overflow-hidden"
    :class="open ? 'bg-blue-600/50 border-blue-400' : ''">

    <div @click="open = !open" class="flex flex-col lg:flex-row lg:items-center cursor-pointer">
        <div class="p-6 lg:p-10 border-b lg:border-b-0 lg:border-r border-neutral-900 transition-colors"
            :class="open ? 'border-blue-400' : 'group-hover:border-blue-400'">
            <span class="text-2xl font-black transition-colors uppercase italic tracking-tighter"
                :class="open ? 'text-white' : 'text-neutral-800 group-hover:text-white'">
                {{ $number }}
            </span>
        </div>

        <div class="flex-1 p-10">
            <h5 class="text-2xl lg:text-3xl font-bold text-white uppercase tracking-tighter transition-all duration-700"
                :class="open ? 'translate-x-6' : 'group-hover:translate-x-6'">
                {{ $question }}
            </h5>
        </div>

        <div class="p-10 hidden lg:block">
            <div class="w-12 h-12 rounded-full border flex items-center justify-center transition-colors"
                :class="open ? 'border-white' : 'border-neutral-800 group-hover:border-white'">

                <i class="fas fa-arrow-right transition-transform duration-500"
                    :class="open ? 'rotate-0 text-white' :
                        '-rotate-45 text-neutral-700 group-hover:rotate-0 group-hover:text-white'"></i>
            </div>
        </div>
    </div>

    <div x-show="open" x-collapse x-cloak class="bg-black/40 backdrop-blur-xl border-t border-blue-400/30">
        <div class="p-10 lg:p-20">
            <p class="text-xl lg:text-2xl text-white font-light leading-relaxed italic">
                {{ $answer }}
            </p>
        </div>
    </div>
</div>
