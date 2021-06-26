<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kontrolku;
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
Route::get('/', [kontrolku::class, 'index']);
// Get All Data
Route::get('/api/{id}', [kontrolku::class, 'getAll']);

// Buat Akun Baru
Route::post('/api/create', [kontrolku::class, 'insert']);

// Kirim Pesan
Route::post('/api/msg', [kontrolku::class, 'pesan']);

// Login (Email + Password)
Route::post('/api', [kontrolku::class, 'login']);

// Update Informasi Akun (token + name + email + password + hp)
Route::post('/api/update', [kontrolku::class, 'update']);

// Update Foto (Token + foto terbaru)
Route::post('/api/foto', [kontrolku::class, 'updateFoto']);

// Ubah Foto Ke Default (Token)
Route::post('/api/foto/del', [kontrolku::class, 'delFoto']);

// Hapus Akun Token
Route::post('/api/del', [kontrolku::class, 'del']);
// Route::get('/', function () {
//     return view('example');
// });
