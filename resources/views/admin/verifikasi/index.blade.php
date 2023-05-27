@extends('admin.layout.app')

@section('title')
    Wisata
@endsection

@section('content')
    @if (session('sukses'))
        <div class="bg-primary text-primary-font bg-opacity-20 border border-primary rounded-md p-4 mb-4 mt-8">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="w-full mt-8">
        <table class="w-full rounded-md mb-8" id="wisataTable">
            <thead>
                <tr class="bg-primary-font text-white rounded-t-2xl font-semibold rounded-tl-md ">
                    <th class="rounded-tl-2xl px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Wisata</th>
                    <th class="px-4 py-3">Lokasi</th>
                    <th class="px-4 py-3">Latitude, Longitude</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3  rounded-tr-2xl">Action</th>
                </tr>
            </thead>
            <tbody class="border border-primary-font text-primary-font font-medium">
                @php
                    $i = 1;
                    $page = app('request')->input('page');
                    $i = ($page == 0 ? '0' : $page - 1) * 5 + 1;
                @endphp
                @foreach ($ajuan as $w)
                    <tr class="h-full">
                        <td class="px-4 py-3">{{ $i }}</td>
                        <td class="px-4 py-3">{{ $w->name }}</td>
                        <td class="px-4 py-3">{{ $w->location }}</td>
                        <td class="px-4 py-3">{{ $w->latitude }}, {{ $w->longitude }}</td>
                        <td class="px-4 py-3"><a href="{{ asset($w->pict_url) }}" target="_blank"><img
                                    src="{{ asset($w->pict_url) }}" class="w-20"></a></td>
                        <td class="px-4 py-3">
                            @if ($w->status == 0)
                                Belum Diverifikasi
                            @elseif($w->status == 1)
                                Disetujui
                            @else
                                Ditolak
                            @endif
                        </td>
                        <td class="flex items-center justify-center h-full px-4 py-3 gap-2">
                            <a href="javascript:void(0)"
                                class="hover:bg-primary-font bg-white  border-primary-font border-2 text-primary-font px-3 py-2 hover:text-white rounded-full tranform transition-all ease-in-out duration-150 setuju"
                                data-id="{{ $w->id }}" data-name="{{ $w->name }}" id="hapus"
                                data-jenis="{{ $w->jenis }}">
                                SETUJU
                            </a>
                            <a href="javascript:void(0)"
                                class="hover:bg-red-500 bg-white  border-red-500 border-2 text-red-500 px-3 py-2 hover:text-white rounded-full tranform transition-all ease-in-out duration-150 tolak"
                                data-id="{{ $w->id }}" data-name="{{ $w->name }}" id="hapus"
                                data-jenis="{{ $w->jenis }}">
                                TOLAK
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
            {{ $ajuan->links() }}
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

        $('#wisataTable').on('click', '.setuju', function() {
            Swal.fire({
                title: `Yakin setujui data ${$(this).data('name')}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SETUJU!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.verifikasi.update') }}',
                        type: 'ajax',
                        method: 'put',
                        data: {
                            'id': $(this).data('id'),
                            'status': '1',
                            'jenis': $(this).data('jenis'),
                        },
                        success: function(data) {
                            console.log(data)
                            location.reload();
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })
                    Swal.fire(
                        'Disetujui!',
                        'Pengajuan telah disetujui.',
                        'success'
                    )
                }
            })
        })

        $('#wisataTable').on('click', '.tolak', function() {
            Swal.fire({
                title: `Yakin tolak data ${$(this).data('name')}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tolak!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.verifikasi.update') }}',
                        type: 'ajax',
                        method: 'put',
                        data: {
                            'id': $(this).data('id'),
                            'status': '2',
                            'jenis': $(this).data('jenis'),
                        },
                        success: function(data) {
                            console.log(data)
                            location.reload();
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil tolak usulan.',
                        'success'
                    )
                }
            })
        })
    </script>
@endsection
