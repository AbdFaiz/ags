<x-landing-layout>
    <article class="relative pt-40 pb-20 bg-black min-h-screen">
        <div class="max-w-4xl mx-auto px-6 relative z-10">

            {{-- Tombol Kendali Admin --}}
            @if (auth()->user()?->role === 'admin')
                <div class="mb-10 p-4 bg-neutral-900 border border-blue-500/30 flex gap-4 items-center justify-between">
                    <span class="text-blue-500 font-mono text-[10px] uppercase tracking-widest">Admin Control
                        Panel</span>
                    <div class="flex gap-4">
                        <a href="{{ route('admin.posts.edit', $post) }}"
                            class="text-white text-xs uppercase bg-blue-600 px-4 py-2 hover:bg-blue-700 transition">Edit
                            Artikel</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Hapus permanen artikel ini?')">
                            @csrf @method('DELETE')
                            <button
                                class="text-red-500 text-xs uppercase border border-red-500 px-4 py-2 hover:bg-red-500 hover:text-white transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @endif

            {{-- Header Artikel --}}
            <header class="mb-12">
                <h1 class="text-4xl lg:text-6xl font-black text-white uppercase tracking-tighter leading-none mb-8">
                    {{ $post->title }}
                </h1>
                {{-- Tampilkan Tag di bawah judul --}}
                <div class="flex flex-wrap gap-3 mt-8">
                    @foreach ($post->tags as $tag)
                        <a href="#"
                            class="px-4 py-1.5 bg-neutral-900 border border-neutral-800 text-blue-500 text-[10px] font-mono uppercase tracking-[0.2em] hover:border-blue-500/50 transition">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
                <div class="flex items-center gap-4 text-neutral-500 font-mono text-[10px] uppercase tracking-widest">
                    <span>{{ $post->created_at->format('d M Y') }}</span>
                    <span class="w-10 h-px bg-neutral-800"></span>
                    <span>By Adidata Admin</span>
                </div>
            </header>

            {{-- Thumbnail --}}
            @if ($post->thumbnail)
                <div class="mb-16 border border-neutral-900">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                        class="w-full grayscale hover:grayscale-0 transition-all duration-700">
                </div>
            @endif

            {{-- Isi Konten --}}
            <div
                class="prose prose-invert prose-blue max-w-none 
                        prose-p:text-neutral-100 prose-p:leading-relaxed prose-p:mb-6
                        prose-headings:text-white prose-headings:uppercase prose-headings:tracking-tighter
                        prose-strong:text-blue-500 prose-img:border prose-img:border-neutral-800">
                {!! $post->content !!}
            </div>

        </div>
    </article>
</x-landing-layout>
