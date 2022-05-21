<?php

use App\Http\Livewire\Laz\LaporanAkun;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Users\Users;
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
    return view('welcome');
});

Route::name('dashboard.')->prefix('dashboard')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('index');
    Route::get('/posts', Posts::class)->name('post');
    Route::get('/users', Users::class)->middleware('admin')->name('users');
    Route::get('/laporan_akun_lazada', LaporanAkun::class)->name('laporanakunlazada');
});
