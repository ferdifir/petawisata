@extends('layout.app')

@section('title')
    Pengajuan
@endsection

@section('content')
    <div class="w-full flex flex-col gap-8">
        <div class="flex flex-row justify-around w-full font-semibold">
            <a href="{{ url('ajukan') }}"
                class="w-1/3 bg-white p-8 items-center flex justify-center hover:bg-primary hover:text-white hover:shadow-lg transform transition-all ease-in-out duration-200">
                AJUKAN WISATA
            </a>
            <a href="{{ url('ajukan') }}"
                class="w-1/3 bg-white p-8 items-center flex justify-center hover:bg-primary hover:text-white hover:shadow-lg transform transition-all ease-in-out duration-200">
                AJUKAN OLEH OLEH
            </a>
        </div>
        <div class="flex flex-row gap-12">
            <div class="w-full bg-white rounded-lg">
                <div class="text-2xl font-bold px-8 pt-8 pb-4">
                    Persyataran Tempat Wisata yang bisa diajukan
                </div>
                <hr class="border border-primary">
                <div class="p-8 font-semibold">
                    <ol class="list-decimal gap-4">
                        <li>Syarat satu</li>
                        <li>Syarat dua</li>
                        <li>Syarat tiga</li>
                        <li>Syarat empat</li>
                        <li>Syarat lima</li>
                        <li>Syarat enam</li>
                    </ol>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg">
                <div class="text-2xl font-bold px-8 pt-8 pb-4">
                    Persyaratan Pusat Oleh-oleh yang bisa diajukan
                </div>
                <hr class="border border-primary">
                <div class="p-8 font-semibold">
                    <ol class="list-decimal gap-4">
                        <li>Syarat satu</li>
                        <li>Syarat dua</li>
                        <li>Syarat tiga</li>
                        <li>Syarat empat</li>
                        <li>Syarat lima</li>
                        <li>Syarat enam</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
