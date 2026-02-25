<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-widest uppercase">Tag Database</h2>
            <span class="text-[10px] bg-gray-100 px-3 py-1 rounded-full font-mono text-gray-500">Total: {{ $tags->count() }} Tags</span>
        </div>
    </x-slot>

    <div class="py-12" x-data="{
        isEdit: false,
        action: '{{ route('admin.tags.store') }}',
        tagName: '',
        tagDesc: '',
        tagId: null,
    
        startEdit(tag) {
            this.isEdit = true;
            this.tagId = tag.id;
            this.tagName = tag.name;
            this.tagDesc = tag.description;
            this.action = '{{ url('admin/tags') }}/' + tag.id;
            window.scrollTo({ top: 0, behavior: 'smooth' }); // Opsional: Scroll ke form
        },
    
        cancelEdit() {
            this.isEdit = false;
            this.tagName = '';
            this.tagDesc = '';
            this.tagId = null;
            this.action = '{{ route('admin.tags.store') }}';
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8">

            <div class="lg:col-span-4">
                <div class="bg-white p-8 shadow-sm rounded-2xl border border-gray-100 sticky top-8">
                    <h3 class="font-bold mb-6 uppercase text-sm tracking-widest text-blue-600" x-text="isEdit ? 'Update Tag' : 'Buat Tag Baru'"></h3>

                    <form :action="action" method="POST">
                        @csrf
                        <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                        <div class="space-y-4">
                            <div>
                                <x-input-label value="Nama Tag" class="text-[10px] uppercase font-bold text-gray-400" />
                                <x-text-input name="name" x-model="tagName" class="w-full mt-1" required />
                            </div>
                            <div>
                                <x-input-label value="Deskripsi (Opsional)" class="text-[10px] uppercase font-bold text-gray-400" />
                                <textarea name="description" x-model="tagDesc" class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm" rows="4"></textarea>
                            </div>

                            <div class="flex flex-col gap-2 pt-2">
                                <x-primary-button class="w-full justify-center !py-3">
                                    <span x-text="isEdit ? 'Simpan Perubahan' : 'Terbitkan Baru'"></span>
                                </x-primary-button>

                                <button type="button" x-show="isEdit" @click="cancelEdit()" class="text-xs mt-3 uppercase font-bold text-gray-400 hover:text-red-500 transition text-center">Batal / Buat Baru</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($tags as $tag)
                        <div :class="tagId === {{ $tag->id }} ? 'border-blue-500 ring-2 ring-blue-100' : 'border-gray-100'"
                            class="bg-white p-6 rounded-2xl border shadow-sm hover:shadow-md transition-all relative group">
                            
                            <div class="flex justify-between items-start mb-4">
                                <div class="bg-blue-50 text-blue-600 text-[10px] font-bold px-3 py-1 rounded-lg uppercase">#{{ $tag->slug }}</div>
                                <span class="text-[10px] font-mono text-gray-400 uppercase">{{ $tag->posts_count }} Post</span>
                            </div>

                            <h4 class="text-lg font-bold text-gray-800 uppercase tracking-tighter mb-1">{{ $tag->name }}</h4>
                            <p class="text-gray-500 text-xs leading-relaxed mb-6 line-clamp-2">{{ $tag->description ?? 'No description.' }}</p>

                            <div class="flex items-center gap-3 pt-4 border-t border-gray-50">
                                <button @click="startEdit({{ json_encode($tag) }})" class="w-8 h-8 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 border border-blue-100">
                                    <i class="fas fa-edit text-[10px]"></i>
                                </button>

                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" onsubmit="return confirm('Hapus tag?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-500 hover:bg-red-600 hover:text-white transition-all duration-300 border border-red-100">
                                        <i class="fas fa-trash text-[10px]"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>