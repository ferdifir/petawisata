<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | PEMETAAN WISATA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>
    <div class="h-screen flex font-poppins">
        <aside class="w-80 bg-primary-bg flex flex-col">
            <div class="w-full flex items-center justify-center h-36 p-8">
                <a href="{{ url('/admin') }}" class="h-full">
                    <img src="{{ asset('logo.png') }}" class="h-full">
                </a>
            </div>
            <div class="h-full mt-4">
                <ul class="font-semibold">
                    <a href="{{ route('admin.dashboard') }}">
                        <li
                            class="{{ $nav == 'dashboard' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-home text-3xl"></span>
                            Dashboard
                        </li>
                    </a>
                    <a href="{{ route('admin.wisata') }}">
                        <li
                            class="{{ $nav == 'wisata' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-island text-3xl"></span>
                            Manajemen Wisata
                        </li>
                    </a>
                    <a href="{{ route('admin.oleh-oleh') }}">
                        <li
                            class="{{ $nav == 'oleh-oleh' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-gift text-3xl"></span>
                            Manajemen Pusat Oleh-oleh
                        </li>
                    </a>
                    <a href="{{ route('admin.kategori') }}">
                        <li
                            class="{{ $nav == 'kategori' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-view-list text-3xl"></span>
                            Manajemen Kategori
                        </li>
                    </a>
                    <a href="{{ route('admin.user') }}">
                        <li
                            class="{{ $nav == 'user' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-account-multiple text-3xl"></span>
                            Manajemen User
                        </li>
                    </a>
                    <a href="{{ route('admin.verifikasi') }}">
                        <li
                            class="{{ $nav == 'verifikasi' ? 'text-primary-font' : 'text-gray-500 hover:text-primary-font' }} flex items-center justify-start p-4 w-full gap-4">
                            <span class="mdi mdi-check-decagram text-3xl"></span>
                            Verifikasi Pengajuan
                        </li>
                    </a>
                </ul>
            </div>
        </aside>
        <div class="flex flex-col w-full">
            <header class="h-20 bg-primary-bg flex justify-end items-center p-4">
                <div class="flex flex-col relative">
                    <a href="javascript:void(0)"
                        class="py-2 px-3 font-semibold hover:bg-white text-primary-font hover:shadow-md rounded-md"
                        id="toggle">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="absolute top-14 right-0 bg-white rounded-md p-3 shadow-md hidden transform transition-all duration-500"
                        id="logout">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class=" text-gray-400 hover:text-primary-font hover:bg-opacity-30">LOGOUT</button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="overflow-y-auto p-8 h-full">
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#toggle').on('click', function() {
            $('#logout').toggleClass('hidden');
        })
    })
</script>
@yield('script')

</html>
