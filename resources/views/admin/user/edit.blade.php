@extends('admin.layout.app')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="w-full">
        <div class="text-2xl text-primary-font font-medium">Form Edit User</div>
        @if ($errors->any())
            <div class="bg-red-500 text-red-900 bg-opacity-20 border border-red-900 rounded-md p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
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
        <form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data"
            class="mt-4 bg-primary-bg p-8 flex gap-8 w-1/2">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="id">
            <div class="w-full">
                <div class="w-full flex flex-col mb-8">
                    <label for="name">Nama</label>
                    <input type="text" name="name"
                        class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md"
                        value="{{ old('name', $user->name) }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="email">Email</label>
                    <input type="email" name="email"
                        class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md"
                        value="{{ old('email', $user->email) }}" />
                </div>
            </div>
            <div class="w-full">
                <div class="w-full flex flex-col mb-8">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat"
                        class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md"
                        value="{{ old('alamat', $user->alamat) }}" />
                </div>
                <div class="w-full flex flex-col mb-8">
                    <label for="no_hp">No. HP</label>
                    <input type="text" name="no_hp"
                        class="outline-none w-full px-3 py-2 border border-primary border-opacity-50 focus:border-opacity-100 rounded-md"
                        value="{{ old('no_hp', $user->no_hp) }}" />
                </div>
                <div class="w-full flex justify-end">
                    <button type="submit"
                        class="bg-primary  text-white font-semibold px-3 py-2 hover:bg-primary-font transform ease-in-out rounded-md transition-all duration-100">
                        SIMPAN
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
