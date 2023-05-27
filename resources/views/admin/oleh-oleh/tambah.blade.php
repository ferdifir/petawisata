@extends('admin.layout.app')

@section('title')
    Tambah Pusat Oleh-oleh
@endsection

@section('content')
    <div class="w-full">
        <div class="text-2xl text-primary-font font-medium">Form Tambah Pusat Oleh-oleh</div>
        @if ($errors->any())
            <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.oleh-oleh.store') }}" method="POST" enctype="multipart/form-data"
            class="mt-4 bg-primary-bg p-8 flex gap-40 w-full">
            @csrf
            <div class="w-full">
                <div class="w-full flex flex-col mb-8">
                    <label for="name">Nama Tempat Pusat Oleh-oleh</label>
                    <input type="text" name="name"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('name') }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="description">Deskripsi</label>
                    <textarea type="text" name="description"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md" required
                        value="{{ old('description') }}"></textarea>
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('alamat') }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('latitude') }}" />
                </div>
            </div>
            <div class="w-full">
                <div class="w-full flex flex-col mb-8">
                    <label for="longitude">Longitute</label>
                    <input type="text" name="longitude"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('longitude') }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="category">Kategori</label>
                    <input type="text" name="category"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('category') }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('gambar') }}" />
                </div>
                <div class="">
                    <button type="submit"
                        class="bg-primary text-white font-semibold px-3 py-2 hover:bg-primary-font transform ease-in-out rounded-md transition-all duration-100">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
@endsection
