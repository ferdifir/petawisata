<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\OlehOlehController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\AjukanController;
use App\Models\OlehOleh;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $wisata = DB::table('wisata')->join('categories', 'wisata.category_id', '=', 'categories.id')->where('is_recommended', '1')->select(['wisata.*', 'categories.name as category_name'])->get();
    $oleh_oleh = OlehOleh::where('is_recommended', '1')->get();
    return view('welcome', ['wisata' => $wisata, 'oleh_oleh' => $oleh_oleh]);
});

Route::get('/tentang', function () {
    // $wisata = Wisata::where('is_recommended', '1')->get();
    $wisata = DB::table('wisata')->join('categories', 'wisata.category_id', '=', 'categories.id')->where('is_recommended', '1')->select(['wisata.*', 'categories.name as category_name'])->get();
    $oleh_oleh = OlehOleh::where('is_recommended', '1')->get();
    return view('tentang', ['wisata' => $wisata, 'oleh_oleh' => $oleh_oleh]);
});

Route::get('/pengajuan', function () {
    return view('pengajuan');
});

Route::get('/detail/{name}', function ($name) {
    $wisata = DB::table('wisata')
        ->join('categories', 'wisata.category_id', '=', 'categories.id')
        ->where('wisata.name', $name)
        ->select(['wisata.*', 'categories.name as category_name'])
        ->first();
    return view('detail', ['wisata' => $wisata]);
});

Route::get('/detailoleh/{name}', function ($name) {
    $oleh_oleh = DB::table('pusat_oleh_oleh')
        ->where('pusat_oleh_oleh.name', $name)
        ->select(['pusat_oleh_oleh.*'])
        ->first();
    return view('detailoleh', ['oleh_oleh' => $oleh_oleh]);
});

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'signup'])->name('register');

Route::post('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/signup', [AuthController::class, 'register'])->name('signup');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'check_role:0'])->group(function () {
    Route::name('ajukan.')->group(function () {
        Route::prefix('ajukan')->group(function () {
            Route::get('/', [AjukanController::class, 'index'])->name('wisata');
            Route::post('/store-wisata', [AjukanController::class, 'store'])->name('wisata.store');
            Route::get('/oleh-oleh', [AjukanController::class, 'olehOleh'])->name('oleh-oleh');
            Route::post('/store-oleh-oleh', [AjukanController::class, 'storeOlehOleh'])->name('wisata.store-oleh-oleh');
        });
    });
});

Route::middleware(['auth', 'check_role:1'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('/wisata', [WisataController::class, 'index'])->name('wisata');
            Route::get('/tambah-wisata', [WisataController::class, 'tambah'])->name('tambah-wisata');
            Route::post('/wisata/store', [WisataController::class, 'store'])->name('wisata.store');
            Route::get('/edit-wisata/{id}', [WisataController::class, 'edit'])->name('wisata.edit');
            Route::put('/wisata/update', [WisataController::class, 'update'])->name('wisata.update');
            Route::post('/wisata/delete', [WisataController::class, 'destroy'])->name('wisata.delete');

            Route::get('/oleh-oleh', [OlehOlehController::class, 'index'])->name('oleh-oleh');
            Route::get('/tambah-oleh-oleh', [OlehOlehController::class, 'tambah'])->name('tambah-oleh-oleh');
            Route::post('/oleh-oleh/store', [OlehOlehController::class, 'store'])->name('oleh-oleh.store');
            Route::get('/edit-oleh-oleh/{id}', [OlehOlehController::class, 'edit'])->name('oleh-oleh.edit');
            Route::put('/oleh-oleh/update', [OlehOlehController::class, 'update'])->name('oleh-oleh.update');
            Route::post('/oleh-oleh/delete', [OlehOlehController::class, 'destroy'])->name('oleh-oleh.delete');

            Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
            Route::get('/tambah-kategori', [KategoriController::class, 'tambah'])->name('tambah-kategori');
            Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
            Route::get('/edit-kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
            Route::put('/kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
            Route::post('/kategori/delete', [KategoriController::class, 'destroy'])->name('kategori.delete');

            Route::get('/user', [UserController::class, 'index'])->name('user');
            Route::get('/tambah-user', [UserController::class, 'tambah'])->name('tambah-user');
            Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
            Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.delete');

            Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi');
            Route::put('/verifikasi/update', [VerifikasiController::class, 'update'])->name('verifikasi.update');
        });
    });
});
