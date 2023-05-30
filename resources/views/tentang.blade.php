@extends('layout.app')

@section('content')
    <div class="w-full flex flex-col gap-8">
        <div class="w-full flex flex-row gap-56 bg-white p-8 rounded-2xl">
            <div class="font-semibold text-justify text-xl">
                <span class="font-extrabold text-xl">Kabupaten Probolinggo</span> adalah salah satu kabupaten di Provinsi
                Jawa Timur,
                Indonesia. Ibukota dan pusat
                pemerintahan kabupaten
                berada di Kraksaan. Kabupaten Probolinggo merupakan salah satu kabupaten yang terletak di wilayah Tapal
                Kuda, Jawa Timur. Kabupaten ini dikelilingi oleh pegunungan Tengger, Gunung Semeru, dan Gunung Argopuro.
            </div>
            <div class="justify-end">
                <img src="{{ asset('logo.png') }}">
            </div>
        </div>
        <div class="flex flex-row gap-12">
            <div class="w-full bg-white rounded-xl">
                <div class="text-3xl font-bold px-8 pt-8 pb-4">
                    Rekomendasi Tempat Wisata
                </div>
                <hr class="border border-primary">
                <div class="p-8 font-semibold">
                    <ul>
                        @foreach ($wisata as $w)
                            <li class="p-3 border-b border-gray-300 flex gap-4">
                            <img src="{{ asset($w->pict_url) }}" class="h-64 w-64 object-cover flex-shrink-0" style="border-radius: 10px;">
                                <div class="flex flex-col">
                                    <span class="font-bold text-4xl uppercase">
                                        <!-- {{ $w->name }} -->
                                        <a href="{{ url('/detail/' . $w->name) }}" class="text-blue-500">{{ $w->name }}</a>
                                    </span>
                                    <span class="font-thin">
                                        <a href="https://www.google.com/maps/place/{{ $w->latitude }},{{ $w->longitude }}"
                                        class="text-primary" target="_blank">
                                        {{ $w->location }} 
                                        <span class="mdi mdi-open-in-new"></span>
                                    </a>
                                    </span>
                                    <span class="font-bold text-sm normal-case">
                                        {{ $w->category_name }}
                                    </span>
                                    <span class="text-justify">
                                        @if(strlen($w->description) > 300)
                                        <span id="description">{{ substr($w->description, 0, 280) }}...</span>
                                        <a href="{{ url('/detail/' . $w->name) }}" class="text-blue-500">Baca selengkapnya</a>
                                        @else
                                        {{ $w->description }}
                                        @endif
                                    </span>
                                </div>
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-full bg-white rounded-xl">
                <div class="text-3xl font-bold px-8 pt-8 pb-4">
                    Rekomendasi Pusat Oleh-oleh
                </div>
                <hr class="border border-primary">
                <div class="p-8 font-semibold">
                    <ul>
                        @foreach ($oleh_oleh as $o)
                            <li class="p-3 border-b border-gray-300 flex gap-4">
                                <img src="{{ asset($o->pict_url) }}" class="h-64 w-64 object-cover flex-shrink-0" style="border-radius: 10px;">
                                <div class="flex flex-col">
                                    <span class="font-bold text-4xl uppercase">
                                        <a href="{{ url('/detailoleh/' . $o->name) }}" class="text-blue-500">{{ $o->name }}</a>
                                    </span>
                                    <span class="font-bold text-sm normal-case">
                                            {{ $o->category }}
                                        </span>
                                    <span class="font-thin">{{ $o->alamat }} <a
                                            href="https://www.google.com/maps/place/{{ $o->latitude }},{{ $o->longitude }}"
                                            class="text-primary" target="_blank">Maps <span
                                                class="mdi mdi-open-in-new"></span></a></span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
