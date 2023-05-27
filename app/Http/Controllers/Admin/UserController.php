<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->nav = 'user';
    }
    public function index()
    {
        $user = User::where('is_admin', '0')->paginate(5);
        return view('admin.user.index', ['user' => $user, 'nav' => $this->nav]);
    }

    public function tambah()
    {
        return view('admin.user.tambah', ['nav' => $this->nav]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        try {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'alamat' => $input['alamat'],
                'no_hp' => $input['no_hp'],
                'is_admin' => '0',
                'password' => Hash::make($input['password'])
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.tambah')->with('error', $th->getMessage());
        }

        return redirect()->route('admin.user')->with('sukses', 'Berhasil tambah user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user, 'nav' => $this->nav]);
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::find($input['id']);

        try {
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->no_hp = $input['no_hp'];
            $user->alamat = $input['alamat'];
            $user->update();
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.edit', ['id' => $input['id']])->with('error', $th->getMessage());
        }

        return redirect()->route('admin.user')->with('sukses', "Berhasil edit data user " . $input['name']);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        try {
            $user->delete();
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage(), 400]);
        }

        return response(['message' => 'success'], 200);
    }
}