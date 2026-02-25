<x-landing-layout>
    <section class="relative pt-40 pb-20 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-20">
                <h2 class="text-7xl lg:text-[100px] font-black text-white leading-none uppercase tracking-tighter">
                    NEWS & <br> <span class="text-transparent" style="-webkit-text-stroke: 1px #444;">UPDATES.</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                @foreach ($posts as $post)
                    <article class="group">
                        <a href="{{ route('posts.show', $post) }}" class="block">
                            <div class="aspect-video mb-8 overflow-hidden bg-neutral-900 border border-neutral-800">
                                @if ($post->thumbnail)
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105">
                                @endif
                            </div>
                            {{-- Di dalam @foreach ($posts as $post) --}}
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="text-[9px] px-2 py-0.5 border border-neutral-800 text-neutral-500 uppercase tracking-widest font-mono">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                            <div
                                class="flex items-center gap-4 mb-4 text-[10px] font-mono text-blue-500 uppercase tracking-widest">
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                                <span class="w-8 h-px bg-neutral-800"></span>
                                <span>Admin</span>
                            </div>
                            <h3
                                class="text-2xl font-bold text-white uppercase group-hover:text-blue-500 transition-colors leading-tight mb-4">
                                {{ $post->title }}
                            </h3>
                            <p class="text-neutral-500 text-xs leading-relaxed line-clamp-3 uppercase tracking-wider">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-landing-layout>
