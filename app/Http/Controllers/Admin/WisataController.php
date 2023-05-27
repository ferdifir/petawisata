<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::where('status', '!=', '0')->paginate(5);
        return view('admin.wisata.index', ['wisata' => $wisata, 'nav' => 'wisata']);
    }

    public function getWisataJSON(Request $request)
    {
        $wisata = DB::table('wisata')
            ->join('users', 'wisata.user_id', '=', 'users.id')
            ->select('wisata.*', 'users.name');

        if ($request->search) {
            $search = $request->search;
            $wisata->where(function ($query) use ($search) {
                $query->where('wisata.name', 'LIKE', "%${search}")
                    ->orWhere('users.name', 'LIKE', "%${search}")
                    ->orWhere('location', 'LIKE', "%${search}");
            });
        }

        $wisata->orderBy('created_at', 'DESC');

        return $wisata->paginate($request->perPage, ['*'], 'page', $request->page);
    }

    public function tambah()
    {
        $data['nav'] = 'wisata';
        $data['category'] = Category::all();
        return view('admin.wisata.tambah', $data);
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
            // dd($input);
        } catch (\Throwable $th) {

            return redirect()->route('admin.wisata')->with('error', $th->getMessage());
        }

        return redirect()->route('admin.wisata')->with('sukses', 'Berhasil mengajukan wisata');
    }

    public function edit($id)
    {
        $data['nav'] = 'wisata';
        $data['category'] = Category::all();
        $data['wisata'] = Wisata::find($id);
        return view('admin.wisata.edit', $data);
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

        $wisata = Wisata::find($input['id']);

        try {
            $wisata->name = $input['name'];
            $wisata->description = $input['description'];
            $wisata->latitude = $input['latitude'];
            $wisata->longitude = $input['longitude'];
            $wisata->location = $input['alamat'];
            $wisata->category_id = $input['category'];
            $wisata->is_recommended = isset($input['is_recommended']) ? '1' : '0';
            $wisata->update();
        } catch (\Throwable $th) {
            return redirect()->route('admin.wisata.edit', ['id' => $input['id']])->with('error', $th->getMessage());
        }

        return redirect()->route('admin.wisata')->with('sukses', "Berhasil edit data wisata " . $input['name']);
    }

    public function destroy(Request $request)
    {
        $wisata = Wisata::find($request->id);

        try {
            $wisata->delete();
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage(), 400]);
        }

        return response(['message' => 'success'], 200);
    }
}