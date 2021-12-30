<?php

use App\Http\Controllers\CBerita;
use App\Http\Controllers\CDashboard;
use App\Http\Controllers\CGalery;
use App\Http\Controllers\CLogin;
use App\Http\Controllers\CMenuCaffe;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [CLogin::class, 'index']);
    Route::post('/login-auth', [CLogin::class, 'authenticate']);
});
Route::get('/logout', [CLogin::class, 'logout']);



Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', [CDashboard::class, 'index']);
    Route::get('/admin-galery', [CGalery::class, 'index']);
    Route::post('/admin-galery-tambah', [CGalery::class, 'create']);
    Route::get('/admin-galery-hapus/{id}', [CGalery::class, 'destroy']);
    Route::get('/admin-berita', [CBerita::class, 'index']);
    Route::get('/admin-tambah-berita', [CBerita::class, 'create']);
    Route::get('/admin-show-berita/{id}', [CBerita::class, 'show']);
    Route::get('/admin-detail-berita/{id}', [CBerita::class, 'detail']);
    Route::get('/admin-hapus-berita/{id}', [CBerita::class, 'destroy']);
    Route::post('/admin-show-berita-save/{id}', [CBerita::class, 'saveShow']);
    Route::post('/admin-tambah-berita-simpan', [CBerita::class, 'saveCreate']);
    Route::get('/admin-menu-caffe', [CMenuCaffe::class, 'index']);
    Route::get('/admin-menu-caffe-tambah', [CMenuCaffe::class, 'create']);
    Route::post('/admin-menu-caffe-tambah-simpan', [CMenuCaffe::class, 'saveCreate']);
});
