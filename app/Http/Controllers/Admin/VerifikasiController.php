<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OlehOleh;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    public function __construct()
    {
        $this->nav = 'verifikasi';
    }

    public function index()
    {
        $wisata = DB::table('wisata')->where('status', '0')->selectRaw('*, "wisata" as jenis');
        $data = DB::table('pusat_oleh_oleh')->where('status', '0')->selectRaw('*, "oleh-oleh" as jenis')->union($wisata)->paginate(5);
        return view('admin.verifikasi.index', ['nav' => $this->nav, 'ajuan' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->jenis == 'wisata' ? Wisata::find($request->id) : OlehOleh::find($request->id);

        try {
            $data->status = $request->status;
            $data->update();
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage(), 400]);
        }

        return response(['message' => 'success'], 200);
    }
}