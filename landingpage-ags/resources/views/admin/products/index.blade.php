<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight tracking-wide uppercase">Manajemen Produk</h2>
            <x-primary-button x-data=""
                x-on:click.prevent="editMode = false; product = {}; $dispatch('open-modal', 'modal-produk')">
                + Tambah Produk
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12" x-data="{ editMode: false, action: '', product: { is_primary: false } }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                    <p class="font-bold">Error Detected:</p>
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b text-sm uppercase text-gray-400">
                            <th class="pb-3">Preview</th>
                            <th class="pb-3">Nama</th>
                            <th class="pb-3 w-24">Status</th>
                            <th class="pb-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($products as $p)
                            <tr>
                                <td class="py-4">
                                    <img src="{{ asset('storage/' . $p->image) }}"
                                        class="w-12 h-12 rounded-lg object-cover bg-gray-100">
                                </td>
                                <td class="font-bold text-gray-700">
                                    {{ $p->name }}
                                </td>
                                <td>
                                    @if ($p->is_primary)
                                        <span
                                            class="px-2 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold uppercase rounded">Hero</span>
                                    @else
                                        <span
                                            class="px-2 py-1 bg-red-100 text-red-700 text-[10px] font-bold uppercase rounded">Other</span>
                                    @endif
                                </td>
                                <td class="py-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        {{-- Tombol Edit --}}
                                        <button type="button"
                                            @click="
            editMode = true; 
            product = {{ json_encode($p) }}; 
            product.is_primary = {{ $p->is_primary ? 'true' : 'false' }}; 
            action = '{{ route('admin.produk.update', $p) }}'; 
            $dispatch('open-modal', 'modal-produk')
        "
                                            title="Edit Produk"
                                            class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 border border-blue-100 shadow-sm">
                                            <i class="fas fa-edit text-xs"></i>
                                        </button>

                                        {{-- Tombol Delete --}}
                                        <form action="{{ route('admin.produk.destroy', $p) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" title="Hapus Produk"
                                                onclick="return confirm('Hapus produk {{ $p->name }}?')"
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-red-500 hover:bg-red-600 hover:text-white transition-all duration-300 border border-red-100 shadow-sm">
                                                <i class="fas fa-trash-alt text-xs"></i>
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

        <x-modal name="modal-produk" focusable>
            <form :action="editMode ? action : '{{ route('admin.produk.store') }}'" method="POST"
                enctype="multipart/form-data" class="p-6">
                @csrf
                <template x-if="editMode">
                    @method('PUT')
                </template>

                <h2 class="text-lg font-bold" x-text="editMode ? 'Edit Produk' : 'Tambah Produk Baru'"></h2>

                <div class="mt-4 space-y-4">
                    <div>
                        <x-input-label value="Nama Produk" />
                        <x-text-input name="name" class="w-full" x-model="product.name" required />
                    </div>
                    <div>
                        <x-input-label value="Deskripsi" />
                        <textarea name="description" x-model="product.description"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="4"
                            required></textarea>
                    </div>

                    <div class="flex items-center gap-2 py-2">
                        <input type="checkbox" name="is_primary" id="is_primary" value="1"
                            x-model="product.is_primary" :checked="product.is_primary"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <label for="is_primary" class="text-sm text-gray-600 cursor-pointer">Jadikan Produk Utama
                            (Hero)</label>
                    </div>

                    <div>
                        <x-input-label value="Foto Produk" />
                        <input type="file" name="image"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            :required="!editMode">
                        <p x-show="editMode" class="mt-2 text-[10px] text-gray-400 italic">*Biarkan kosong jika tidak
                            ingin mengganti gambar</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3 border-t pt-4">
                    <x-secondary-button
                        x-on:click="$dispatch('close'); editMode = false; product = { is_primary: false }">Batal</x-secondary-button>
                    <x-primary-button>Simpan Produk</x-primary-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
