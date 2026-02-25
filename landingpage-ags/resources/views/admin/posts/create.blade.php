<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Artikel Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 shadow-sm sm:rounded-lg">
                @csrf
                <div class="space-y-6">
                    <div>
                        <x-input-label value="Judul Artikel" />
                        <x-text-input name="title" class="w-full mt-1" placeholder="Masukkan judul..." required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label value="Gambar Utama (Thumbnail)" />
                            <input type="file" name="thumbnail" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        {{-- SEKSI PILIH TAG --}}
                        <div>
                            <x-input-label value="Pilih Tag Relasi" />
                            <div class="mt-2 flex flex-wrap gap-3 p-3 border border-gray-200 rounded-md bg-gray-50 max-h-32 overflow-y-auto">
                                @foreach(\App\Models\Tag::all() as $tag)
                                    <label class="inline-flex items-center group cursor-pointer">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                        <span class="ml-2 text-xs uppercase font-bold text-gray-600 group-hover:text-blue-600">{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="mt-1 text-[10px] text-gray-400 italic">*Pilih satu atau lebih kategori terkait</p>
                        </div>
                    </div>

                    <div>
                        <x-input-label value="Konten" />
                        <div class="mt-1">
                            <textarea id="editor" name="content"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6 border-t">
                        <x-secondary-button onclick="window.history.back()">Batal</x-secondary-button>
                        <x-primary-button>Terbitkan Artikel</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
        }).catch(error => { console.error(error); });
    </script>
    <style> .ck-editor__editable { min-height: 400px; color: #1a1a1a; } </style>
</x-app-layout>