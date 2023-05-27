@extends('admin.layout.app')

@section('title')
    Pusat Oleh-oleh
@endsection

@section('content')
    <a href="{{ route('admin.tambah-oleh-oleh') }}"
        class="bg-primary-bg hover:bg-primary-font text-primary-font hover:text-white border-2 border-primary-font rounded-md px-3 py-2 font-medium transform transition-all ease-in-out duration-150 mb-8">
        Tambah Pusat Oleh-oleh
    </a>
    @if (session('sukses'))
        <div class="bg-primary text-primary-font bg-opacity-20 border border-primary rounded-md p-4 mb-4 mt-8">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="w-full mt-8">
        <table class="w-full rounded-md mb-8" id="olehOlehTable">
            <thead>
                <tr class="bg-primary-font text-white rounded-t-2xl font-semibold rounded-tl-md ">
                    <th class="rounded-tl-2xl px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Pusat Oleh-oleh</th>
                    <th class="px-4 py-3">Lokasi</th>
                    <th class="px-4 py-3">Latitude, Longitude</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Recommended</th>
                    <th class="px-4 py-3  rounded-tr-2xl">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary-font text-primary-font font-medium">
                @php
                    $i = 1;
                    $page = app('request')->input('page');
                    $i = ($page == 0 ? '0' : $page - 1) * 5 + 1;
                @endphp
                @foreach ($oleh_oleh as $o)
                    <tr class="h-full">
                        <td class="px-4 py-3">{{ $i }}</td>
                        <td class="px-4 py-3">{{ $o->name }}</td>
                        <td class="px-4 py-3">{{ $o->location }}</td>
                        <td class="px-4 py-3">{{ $o->latitude }}, {{ $o->longitude }}</td>
                        <td class="px-4 py-3"><a href="{{ asset($o->pict_url) }}" target="_blank"><img
                                    src="{{ asset($o->pict_url) }}" class="w-20"></a></td>
                        <td class="px-4 py-3">
                            @if ($o->status == 0)
                                Belum Diverifikasi
                            @elseif($o->status == 1)
                                Disetujui
                            @else
                                Ditolak
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $o->is_recommended == '0' ? 'Tidak' : 'Ya' }}</td>
                        <td class="flex items-center justify-center h-full px-4 py-3 gap-2">
                            <a href="{{ route('admin.oleh-oleh.edit', ['id' => $o->id]) }}"
                                class="hover:bg-primary-font bg-white  border-primary-font border-2 text-primary-font px-3 py-2 hover:text-white rounded-full tranform transition-all ease-in-out duration-150">
                                <span class="mdi mdi-pencil"></span>
                            </a>
                            <a href="javascript:void(0)"
                                class="hover:bg-red-500 bg-white  border-red-500 border-2 text-red-500 px-3 py-2 hover:text-white rounded-full tranform transition-all ease-in-out duration-150 hapus"
                                data-id="{{ $o->id }}" data-name="{{ $o->name }}" id="hapus">
                                <span class="mdi mdi-delete"></span>
                            </a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $oleh_oleh->links() }}
        </div>
    </div>
    <div class="fixed inset-0 z-50  w-full h-full bg-black bg-opacity-10 items-center justify-center hidden"
        id="modalHapus">
        <div class="bg-white rounded-xl p-8 flex flex-col w-2/6">
            <div class="flex justify-between w-full">
                <span class="font-bold">HAPUS WISATA</span>
                <button onclick="closeModal('modal')">x</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function closeModal(modal) {
            $('#modalHapus').addClass('hidden')
        }

        $('#olehOlehTable').on('click', '.hapus', function() {
            Swal.fire({
                title: `Yakin hapus data ${$(this).data('name')}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.oleh-oleh.delete') }}',
                        type: 'ajax',
                        method: 'post',
                        data: {
                            'id': $(this).data('id')
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            location.reload();
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })
                }
            })
        })

        $(document).ready(function() {})
    </script>
@endsection
