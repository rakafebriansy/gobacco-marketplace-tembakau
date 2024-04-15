<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/register', [PetaniController::class,'register']);
Route::post('/register', [PetaniController::class,'postRegister']);
Route::get('/login', [LoginController::class,'login']);
Route::post('/login', [LoginController::class,'postLogin']);
Route::get('/logout', [LoginController::class,'logout']);

Route::prefix('/petani')->group(function() {
    Route::get('/akun',[PetaniController::class,'melihatDataAkun']);
    Route::get('/ubah',[PetaniController::class,'mengubahDataAkun']);
    Route::patch('/ubah',[PetaniController::class,'postMengubahDataAkun']);
    Route::get('/sertifikasi',[PetaniController::class,'melihatPengajuanSertifikasi']);
    Route::get('/buat',[PetaniController::class,'membuatPengajuanSertifikasi']);
    Route::post('/buat',[PetaniController::class,'postMembuatPengajuanSertifikasi']);
    Route::post('/edit',[PetaniController::class,'postMengeditPengajuanSertifikasi']);
    Route::get('/edit/{id_sertifikasi}',[PetaniController::class,'mengeditPengajuanSertifikasi']);
    Route::get('/download/{folder_name}/{file_name}', [PetaniController::class, 'downloadFile']);
});

Route::prefix('/pemerintah')->group(function(){
    Route::get('/akun',[PemerintahController::class,'melihatDataAkun']);
    Route::get('/ubah',[PemerintahController::class,'mengubahDataAkun']);
    Route::patch('/ubah',[PemerintahController::class,'postMengubahDataAkun']);
    Route::get('/sertifikasi',[PemerintahController::class,'melihatPengajuanSertifikasi']);
    Route::get('/buat/{id_sertifikasi}',[PemerintahController::class,'membuatPengajuanSertifikasi']);
    Route::post('/buat',[PemerintahController::class,'postMembuatPengajuanSertifikasi']);
    Route::get('/unggah/{id_sertifikasi}',[PemerintahController::class,'mengunggahPengajuanSertifikasi']);
    Route::post('/unggah',[PemerintahController::class,'postMengunggahPengajuanSertifikasi']);
    Route::get('/download/{folder_name}/{file_name}', [PemerintahController::class, 'downloadFile']);
});

Route::prefix('/admin')->group(function(){
    Route::get('/akun',[AdminController::class,'melihatDataAkun']);
    Route::get('/ubah',[AdminController::class,'mengubahDataAkun']);
    Route::patch('/ubah',[AdminController::class,'postMengubahDataAkun']);
});
