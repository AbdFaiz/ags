<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 tracking-wide uppercase">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $stats = [
                        [
                            'label' => 'Total Produk',
                            'count' => \App\Models\Product::count(),
                            'icon' => 'fa-box',
                            'color' => 'blue',
                        ],
                        [
                            'label' => 'Artikel Blog',
                            'count' => \App\Models\Post::count(),
                            'icon' => 'fa-newspaper',
                            'color' => 'orange',
                        ],
                        [
                            'label' => 'Kategori Tag',
                            'count' => \App\Models\Tag::count(),
                            'icon' => 'fa-tags',
                            'color' => 'purple',
                        ],
                        // [
                        //     'label' => 'Primary Products',
                        //     'count' => \App\Models\Product::where('is_primary', true)->count(),
                        //     'icon' => 'fa-star',
                        //     'color' => 'yellow',
                        // ],
                    ];
                @endphp
                @foreach ($stats as $s)
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:border-{{ $s['color'] }}-500 transition-all duration-300">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">
                                    {{ $s['label'] }}</p>
                                <h3 class="text-3xl font-black text-gray-800">{{ $s['count'] }}</h3>
                            </div>
                            <div
                                class="w-10 h-10 bg-{{ $s['color'] }}-50 text-{{ $s['color'] }}-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas {{ $s['icon'] }}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="font-bold text-gray-800 uppercase text-sm tracking-tight">Traffic Overview (Last 7
                            Days)</h3>
                        <div class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">
                            REAL-TIME DATA
                        </div>
                    </div>

                    @php
                        $days = collect(range(6, 0))->map(function ($i) {
                            $targetDate = now()->subDays($i)->startOfDay();
                            $dateString = $targetDate->format('Y-m-d');
                            $count = \App\Models\Visitor::whereDate('created_at', $dateString)->count();

                            return [
                                'day' => $targetDate->format('D'),
                                'count' => $count,
                            ];
                        });

                        $maxCount = $days->max('count');
                        $displayMax = $maxCount > 0 ? $maxCount : 1;
                    @endphp

                    {{-- Container utama kita kasih min-height dan lebar pasti --}}
                    <div class="h-72 w-full flex items-end justify-between gap-4 px-2">
                        @foreach ($days as $data)
                            @php
                                // Hitung tinggi: Kalau ada data, pakai persentase. Kalau 0, kasih 8px aja buat tanda.
                                $percentage = ($data['count'] / $displayMax) * 100;
                                $finalHeight = $data['count'] > 0 ? max($percentage, 20) : 4;
                            @endphp

                            <div class="flex-1 flex flex-col items-center gap-3 h-full justify-end group">
                                {{-- Angka di atas Bar (selalu muncul kalau ada data) --}}
                                <span
                                    class="text-[10px] font-black text-blue-600 mb-1 transition-transform group-hover:scale-125 {{ $data['count'] > 0 ? 'opacity-100' : 'opacity-0' }}">
                                    {{ $data['count'] }}
                                </span>

                                {{-- Jalur Bar (Track) --}}
                                <div class="w-full bg-gray-50 rounded-t-xl relative flex items-end overflow-hidden"
                                    style="height: 100%;">
                                    {{-- Isi Bar (The Actual Bar) --}}
                                    <div class="w-full bg-blue-500 rounded-t-xl transition-all duration-700 ease-out hover:bg-blue-600 shadow-[0_-4px_10px_rgba(59,130,246,0.2)]"
                                        style="height: {{ $finalHeight }}%">
                                    </div>

                                    {{-- Tooltip Hover --}}
                                    <div class="absolute inset-0 z-10 cursor-pointer"></div>
                                </div>

                                {{-- Label Hari --}}
                                <span
                                    class="text-[10px] font-bold text-gray-400 uppercase tracking-widest group-hover:text-blue-500 transition-colors">
                                    {{ $data['day'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="bg-neutral-100 p-8 rounded-3xl shadow-xl shadow-blue-900/10 relative overflow-hidden flex flex-col justify-between">
                    <div class="relative z-10">
                        <h3 class="text-neutral-900 font-black text-xl mb-2 tracking-tighter">OPERATIONAL</h3>
                        <p class="text-neutral-500 text-xs mb-8">Akses cepat modul sistem.</p>

                        <div class="space-y-3">
                            <a href="{{ route('admin.posts.create') }}"
                                class="flex items-center justify-between p-4 bg-neutral-900/5 hover:bg-neutral-900/10 rounded-2xl border border-neutral-900/5 group transition">
                                <span class="text-xs font-bold text-neutral-900 uppercase tracking-widest">New
                                    Article</span>
                                <i class="fas fa-plus text-blue-500 group-hover:rotate-90 transition-transform"></i>
                            </a>
                            <a href="{{ route('admin.produk.index') }}"
                                class="flex items-center justify-between p-4 bg-neutral-900/5 hover:bg-neutral-900/10 rounded-2xl border border-neutral-900/5 group transition">
                                <span class="text-xs font-bold text-neutral-900 uppercase tracking-widest">Add
                                    Product</span>
                                <i class="fas fa-plus text-blue-500 group-hover:rotate-90 transition-transform"></i>
                            </a>
                            <a href="{{ route('admin.tags.index') }}"
                                class="flex items-center justify-between p-4 bg-neutral-900/5 hover:bg-neutral-900/10 rounded-2xl border border-neutral-900/5 group transition">
                                <span class="text-xs font-bold text-neutral-900 uppercase tracking-widest">Add
                                    tag</span>
                                <i class="fas fa-plus text-blue-500 group-hover:rotate-90 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-neutral-900/5 relative z-10">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-[10px] text-neutral-900 font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-[10px] text-neutral-900 font-bold uppercase">{{ Auth::user()->name }}
                                </p>
                                <p class="text-[9px] text-neutral-500">System Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 uppercase text-sm mb-6 flex items-center gap-2">
                        <i class="fas fa-boxes text-blue-500"></i> Newest Inventory
                    </h3>
                    <div class="divide-y divide-gray-50">
                        @foreach (\App\Models\Product::latest()->take(5)->get() as $p)
                            <div class="py-4 flex items-center justify-between group">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-gray-50 rounded-xl overflow-hidden flex items-center justify-center border border-gray-100">
                                        @if ($p->image)
                                            <img src="{{ asset('storage/' . $p->image) }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <i class="fas fa-image text-gray-300"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-800 uppercase">{{ $p->name }}</h4>
                                        <p class="text-[9px] text-gray-400 font-mono">{{ $p->category ?? 'General' }}
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('admin.produk.index') }}"
                                    class="opacity-0 group-hover:opacity-100 text-blue-500 transition-opacity">
                                    <i class="fas fa-external-link-alt text-xs"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 uppercase text-sm mb-6 flex items-center gap-2">
                        <i class="fas fa-history text-orange-500"></i> Latest News
                    </h3>
                    <div class="space-y-6">
                        @foreach (\App\Models\Post::latest()->take(4)->get() as $post)
                            <div class="relative pl-6 border-l-2 border-gray-100">
                                <div
                                    class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-orange-500">
                                </div>
                                <h4 class="text-xs font-bold text-gray-800 truncate">{{ $post->title }}</h4>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-mono">
                                    {{ $post->created_at->format('d M Y') }} —
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
