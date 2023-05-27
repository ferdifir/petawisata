@extends('admin.layout.app')

@section('title')
    Tambah Kategori
@endsection

@section('content')
    <div class="w-full">
        <div class="text-2xl text-primary-font font-medium">Form Tambah Kategori</div>
        @if ($errors->any())
            <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="mt-4 bg-primary-bg p-8 flex gap-40 w-full">
            @csrf
            <div class="w-1/2">
                <div class="w-full flex flex-col mb-8">
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name"
                        class="px-3 py-2 border border-primary-font focus:ring-1 focus:ring-primary-font outline-none rounded-md"
                        required value="{{ old('name') }}" />
                </div>
                <div class="">
                    <button type="submit"
                        class="bg-primary text-white font-semibold px-3 py-2 hover:bg-primary-font transform ease-in-out rounded-md transition-all duration-100">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
@endsection
