<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
    <title>Pemetaan Wisata dan Pusat Oleh-oleh</title>
</head>

<body>
    <div class="flex h-screen font-nunito-sans">
        <div class="flex flex-1 flex-col w-10/12">
            <header class="h-16 bg-primary w-full flex flex-row text-gray-200 text-xl items-center p-10 justify-between">
                <div class="w-1/12">
                    <img src="{{ asset('logo.png') }}" width="50">
                </div>
                <div class="p-1 w-6/12 font-bold text-xl border-r border-white">
                    PEMETAAN TEMPAT WISATA DAN PUSAT OLEH-OLEH KAB. PROBOLINGGO
                </div>
                <div class="p-1 w-1/12 font-semibold text-lg border-r border-white flex items-center justify-center">
                    <a href="{{ url('/') }}" class="hover:text-white">Beranda</a>
                </div>
                <div class="p-1 w-1/12 font-semibold text-lg border-r border-white flex items-center justify-center">
                    <a href="{{ url('/tentang') }}" class="hover:text-white">Tentang</a>
                </div>
                <div class="p-1 w-2/12 font-semibold text-lg border-r border-white flex items-center justify-center">
                    <a href="{{ url('/pengajuan') }}" class="hover:text-white">Ajukan Wisata Baru</a>
                </div>
                <div class="p-1 w-1/12 font-semibold text-lg border-r border-white flex items-center justify-center">
                    <a href="{{ url('/login') }}" class="hover:text-white">Login</a>
                </div>
            </header>
            <main class="flex-1 flex overflow-y-auto px-8 py-8 bg-gray-200">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
