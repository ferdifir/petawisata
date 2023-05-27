<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-primary bg-opacity-30 flex items-center font-nunito-sans">
        <div class="flex flex-col w-full items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" class="w-40">
            </a>
            <div class="text-3xl font-bold mb-8 w-1/2">
                Sistem Informasi Pemetaan Wisata dan Oleh-oleh Kab. Probolinggo
            </div>
            <div class="bg-white rounded-lg shadow-sm flex flex-col py-4 px-8 w-2/5 items-center">
                <div class="font-semibold text-xl mb-4 uppercase">
                    DAFTAR AKUN
                </div>
                <hr class="border-gray-200 border w-full" />
                <form class="my-4 w-full flex flex-col items-center" action="{{ route('signup') }}" method="POST">
                    @csrf
                    <div class="mb-4 w-full flex gap-8">
                        <div class="w-full">
                            <label for="name">Nama</label>
                            <input type="text" name="name"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                        <div class="w-full">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                    </div>
                    <div class="mb-4 w-full flex gap-8">
                        <div class="w-full">
                            <label for="email">Email</label>
                            <input type="email" name="email"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                        <div class="w-full">
                            <label for="no_hp">No. HP</label>
                            <input type="text" name="no_hp"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                    </div>
                    <div class="mb-4 w-full flex gap-8">
                        <div class="w-full">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                        <div class="w-full">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                        </div>
                    </div>
                    <div class="w-full">
                        <button type="submit" name="submit"
                            class="bg-primary hover:bg-primary-hover w-full focus:outline-none focus:border-none focus:bg-primary-hover text-white font-semibold px-3 py-2 rounded-md transform transition-all duration-100">DAFTAR</button>
                    </div>
                    <div class="w-1/2 my-4 flex flex-col items-center">
                        <hr class="border border-gray-300">
                        <div>Sudah punya akun? <a href="{{ url('login') }}"
                                class="text-primary outline-none font-bold focus:text-primary-hover hover:text-primary-hover">Login</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
