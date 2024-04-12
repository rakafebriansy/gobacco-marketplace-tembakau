<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\PetaniController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/petani/register', [PetaniController::class,'register']);
Route::post('/petani/register', [PetaniController::class,'postRegister']);
Route::get('/petani/login', [PetaniController::class,'login']);
Route::post('/petani/login', [PetaniController::class,'postLogin']);
Route::get('/petani/akun',[PetaniController::class,'melihatDataAkun']);
Route::get('/petani/akun/ubah',[PetaniController::class,'mengubahDataAkun']);
Route::patch('/petani/akun/ubah',[PetaniController::class,'postMengubahDataAkun']);

Route::get('/pemerintah/login', [PemerintahController::class,'login']);
Route::post('/pemerintah/login', [PemerintahController::class,'postLogin']);
Route::get('/pemerintah/akun',[PemerintahController::class,'melihatDataAkun']);
Route::get('/pemerintah/akun/ubah',[PemerintahController::class,'mengubahDataAkun']);
Route::patch('/pemerintah/akun/ubah',[PemerintahController::class,'postMengubahDataAkun']);

Route::get('/admin/login', [AdminController::class,'login']);
Route::post('/admin/login', [AdminController::class,'postLogin']);
Route::get('/admin/akun',[AdminController::class,'melihatDataAkun']);
Route::get('/admin/akun/ubah',[AdminController::class,'mengubahDataAkun']);
Route::patch('/admin/akun/ubah',[AdminController::class,'postMengubahDataAkun']);
