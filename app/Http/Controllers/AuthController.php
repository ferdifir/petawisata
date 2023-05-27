<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('login');
    }

    public function signup()
    {
        return view('register');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('ajukan.wisata');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }

    public function register(Request $request)
    {
        $input = $request->all();


        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            // dd('coba create');
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'alamat' => $input['alamat'],
                'no_hp' => $input['no_hp'],
                'is_admin' => '0',
                'password' => Hash::make($input['password'])
            ]);
        } catch (\Throwable $th) {
            return redirect('/login')->with('error', $th->getMessage());
        }

        return redirect()->route('login')->with('sukses', 'Sukses daftar akun. Silahkan Login');
    }
}