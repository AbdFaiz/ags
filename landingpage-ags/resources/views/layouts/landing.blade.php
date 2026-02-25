<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    {{-- {!! SEO::generate(true) !!} --}}

    <title>PT. Adidata Global Sistem</title>
    <link rel="shortcut icon" href="{{ asset('img/3dlogowotxt.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Roboto:wght@400;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-roboto {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="bg-neutral-950 antialiased text-slate-100 overflow-x-hidden">
        @include('landing.nav')

        <!-- Page Content -->
        <main>
            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                    class="fixed bottom-10 right-10 bg-red-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 font-mono text-xs uppercase tracking-widest">
                    {{ session('error') }}
                </div>
            @endif
            {{ $slot }}
        </main>

        @include('landing.footer')
    </div>
</body>

</html>
