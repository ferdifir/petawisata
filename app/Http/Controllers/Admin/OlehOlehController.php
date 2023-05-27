<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OlehOleh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OlehOlehController extends Controller
{
    public function index()
    {
        $oleh_oleh = OlehOleh::where('status', '!=', '0')->paginate(5);
        return view('admin.oleh-oleh.index', ['oleh_oleh' => $oleh_oleh, 'nav' => 'oleh-oleh']);
    }

    public function tambah()
    {
        $data['nav'] = 'oleh-oleh';
        return view('admin.oleh-oleh.tambah', $data);
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

        $fileName = $this->setFileName($input['gambar'], 'oleh-oleh');


        $filePath = $request->file('gambar')->storeAs('public/oleh-oleh', $fileName);

        $path = Storage::url($filePath);

        try {
            OlehOleh::create([
                'name' => $input['name'],
                'description' => $input['description'],
                'location' => $input['alamat'],
                'latitude' => $input['latitude'],
                'longitude' => $input['longitude'],
                'category' => $input['category'],
                'pict_url' => $path,
                'user_id' => Auth::user()->id,
            ]);
            // dd($input);
        } catch (\Throwable $th) {

            return redirect()->route('admin.oleh-oleh')->with('error', $th->getMessage());
        }

        return redirect()->route('admin.oleh-oleh')->with('sukses', 'Berhasil mengajukan oleh-oleh');
    }

    public function edit($id)
    {
        $data['nav'] = 'oleh-oleh';
        $data['oleh_oleh'] = OlehOleh::find($id);
        return view('admin.oleh-oleh.edit', $data);
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category' => 'required',
        ]);

        $oleh_oleh = OlehOleh::find($input['id']);

        try {
            $oleh_oleh->name = $input['name'];
            $oleh_oleh->description = $input['description'];
            $oleh_oleh->latitude = $input['latitude'];
            $oleh_oleh->longitude = $input['longitude'];
            $oleh_oleh->location = $input['alamat'];
            $oleh_oleh->category = $input['category'];
            $oleh_oleh->is_recommended = isset($input['is_recommended']) ? '1' : '0';
            $oleh_oleh->update();
        } catch (\Throwable $th) {
            return redirect()->route('admin.oleh-oleh.edit', ['id' => $input['id']])->with('error', $th->getMessage());
        }

        return redirect()->route('admin.oleh-oleh')->with('sukses', "Berhasil edit data oleh-oleh " . $input['name']);
    }

    public function destroy(Request $request)
    {
        $oleh_oleh = OlehOleh::find($request->id);

        try {
            $oleh_oleh->delete();
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage(), 400]);
        }

        return response(['message' => 'success'], 200);
    }
}