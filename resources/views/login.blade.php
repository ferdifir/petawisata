<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-primary bg-opacity-30 flex items-center font-nunito-sans">
        <div class="flex flex-col w-full items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" class="w-40">
            </a>
            <div class="text-3xl font-bold mb-8 w-1/2 text-center">
                Sistem Informasi Pemetaan Wisata dan Oleh-oleh <br>Kab. Probolinggo
            </div>

            @if ($errors->any())
                <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                    <ul>
                        @foreach ($errors->all as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('sukses'))
                <div class="bg-teal-500 text-teal-900 bg-opacity-20 border border-teal-900 rounded-md p-4 mb-4">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="bg-white rounded-lg shadow-sm flex flex-col py-4 px-8 w-1/3 items-center">
                <div class="font-semibold text-xl mb-4 uppercase">
                    Silahkan Login
                </div>
                <hr class="border-gray-200 border w-full" />
                <form action="{{ route('signin') }}" method="POST" class="my-4 w-full flex flex-col items-center">
                    @csrf
                    <div class="mb-4 w-full">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                            class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                    </div>
                    <div class="mb-4 w-full">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                            class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md" />
                    </div>
                    <div class="w-full">
                        <button type="submit" name="submit"
                            class="bg-primary hover:bg-primary-hover w-full focus:outline-none focus:border-none focus:bg-primary-hover text-white font-semibold px-3 py-2 rounded-md transform transition-all duration-100">LOGIN</button>
                    </div>
                    <div class="w-1/2 my-4 flex flex-col items-center">
                        <hr class="border border-gray-300">
                        <div>Belum punya akun? <a href="{{ url('register') }}"
                                class="text-primary outline-none font-bold focus:text-primary-hover hover:text-primary-hover">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
