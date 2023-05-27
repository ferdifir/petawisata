<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OlehOleh;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AjukanController extends Controller
{
    public function index()
    {
        $data['category'] = Category::all();
        return view('user.wisata.wisata', $data);
    }

    public function setFileName($file, $prefix)
    {
        $ext = $file->getClientOriginalExtension();
        $date = date_timestamp_get(date_create());
        return $prefix . '-' . $date . '.' . $ext;
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category' => 'required',
            'gambar' => 'required|file|max:4096',
            'alamat' => 'required',
        ]);


        $fileName = $this->setFileName($input['gambar'], 'wisata');


        $filePath = $request->file('gambar')->storeAs('public/wisata', $fileName);

        $path = Storage::url($filePath);

        // dd($path);

        try {
            Wisata::create([
                'name' => $input['name'],
                'description' => $input['description'],
                'location' => $input['alamat'],
                'latitude' => $input['latitude'],
                'longitude' => $input['longitude'],
                'category_id' => $input['category'],
                'pict_url' => $path,
                'user_id' => Auth::user()->id,
            ]);
        } catch (\Throwable $th) {

            return redirect()->route('ajukan.wisata')->with('error', $th->getMessage());
        }

        return redirect()->route('ajukan.wisata')->with('sukses', 'Berhasil mengajukan wisata');
    }

    public function olehOleh()
    {
        $data['category'] = Category::all();
        return view('user.oleh-oleh.index', $data);
    }

    public function storeOlehOleh(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category' => 'required',
            'gambar' => 'required|file|max:4096',
            'alamat' => 'required',
        ]);

        $fileName = $this->setFileName($input['gambar'], 'oleh');

        $filePath = $request->file('gambar')->storeAs('public/oleh-oleh', $fileName);

        try {
            OlehOleh::create([
                'name' => $input['name'],
                'description' => $input['description'],
                'location' => $input['alamat'],
                'latitude' => $input['latitude'],
                'longitude' => $input['longitude'],
                'category' => $input['category'],
                'pict_url' => $filePath,
                'user_id' => Auth::user()->id,
            ]);
        } catch (\Throwable $th) {

            return redirect()->route('ajukan.oleh-oleh')->with('error', $th->getMessage());
        }

        return redirect()->route('ajukan.oleh-oleh')->with('sukses', 'Berhasil mengajukan pusat oleh-oleh');
    }
}