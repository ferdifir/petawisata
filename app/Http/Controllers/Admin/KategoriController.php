<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data['nav'] = 'kategori';
        $data['kategori'] = Category::paginate('5');

        return view('admin.kategori.index', $data);
    }

    public function tambah()
    {
        return view('admin.kategori.tambah', ['nav' => 'kategori']);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required'
        ]);

        try {
            Category::create([
                'name' => $input['name']
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.kategori.tambah')->with('error', $th->getMessage());
        }

        return redirect()->route('admin.kategori')->with('sukses', 'Berhasil tambah kategori');
    }

    public function edit($id)
    {
        $data['nav'] = 'kategori';
        $data['kategori'] = Category::find($id);
        return view('admin.kategori.edit', $data);
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
        ]);

        $kategori = Category::find($input['id']);

        try {
            $kategori->name = $input['name'];
            $kategori->update();
        } catch (\Throwable $th) {
            return redirect()->route('admin.kategori.edit', ['id' => $input['id']])->with('error', $th->getMessage());
        }

        return redirect()->route('admin.kategori')->with('sukses', "Berhasil edit data kategori " . $input['name']);
    }

    public function destroy(Request $request)
    {
        $kategori = Category::find($request->id);

        try {
            $kategori->delete();
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage(), 400]);
        }

        return response(['message' => 'success'], 200);
    }
}