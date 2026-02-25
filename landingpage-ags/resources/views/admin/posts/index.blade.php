<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight tracking-wide uppercase">Kelola Artikel</h2>
            <a href="{{ route('admin.posts.create') }}"
                class="px-4 py-2 bg-black text-white rounded text-sm uppercase font-bold tracking-widest">Tulis
                Artikel</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b text-xs uppercase text-gray-400 tracking-widest">
                            <th class="py-4 px-2">Thumbnail</th>
                            <th class="py-4 px-2">Judul</th>
                            <th class="py-4 px-2">Tanggal</th>
                            <th class="py-4 px-2">Tags</th>
                            <th class="py-4 px-2 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="py-4 px-2">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="w-16 h-10 object-cover rounded">
                                </td>
                                <td class="py-4 px-2 font-bold">{{ $post->title }}</td>
                                <td class="py-4 px-2 text-sm text-gray-500">{{ $post->created_at->format('d/m/y') }}
                                </td>
                                <td class="py-4 px-2">
                                    <div class="flex flex-wrap gap-1 max-w-[200px]">
                                        @forelse($post->tags as $tag)
                                            <span
                                                class="bg-blue-50 text-blue-600 text-[8px] px-1.5 py-0.5 rounded uppercase font-bold border border-blue-100">
                                                {{ $tag->name }}
                                            </span>
                                        @empty
                                            <span class="text-gray-300 text-[8px] italic tracking-widest uppercase">No
                                                Tag</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="py-4 px-2 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- View Post --}}
                                        <a href="{{ route('posts.show', $post) }}" title="Lihat Artikel"
                                            class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-blue-100">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>

                                        {{-- Edit Post --}}
                                        <a href="{{ route('admin.posts.edit', $post) }}" title="Edit Artikel"
                                            class="w-9 h-9 flex items-center justify-center rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white transition-all duration-300 shadow-sm border border-amber-100">
                                            <i class="fas fa-pen text-xs"></i>
                                        </a>

                                        {{-- Delete Post --}}
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                            onsubmit="return confirm('Hapus artikel ini secara permanen?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" title="Hapus Artikel"
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 shadow-sm border border-red-100">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
