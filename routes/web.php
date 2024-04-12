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


Route::prefix('/petani')->group(function() {
    Route::get('/register', [PetaniController::class,'register']);
    Route::post('/register', [PetaniController::class,'postRegister']);
    Route::get('/login', [PetaniController::class,'login']);
    Route::post('/login', [PetaniController::class,'postLogin']);
    Route::get('/akun',[PetaniController::class,'melihatDataAkun']);
    Route::get('/akun/ubah',[PetaniController::class,'mengubahDataAkun']);
    Route::patch('/akun/ubah',[PetaniController::class,'postMengubahDataAkun']);
    Route::get('/sertifikasi',[PetaniController::class,'melihatPengajuanSertifikasi']);
    Route::get('/sertifikasi/buat',[PetaniController::class,'membuatPengajuanSertifikasi']);
    Route::post('/sertifikasi/buat',[PetaniController::class,'postMembuatPengajuanSertifikasi']);
});

Route::prefix('/pemerintah')->group(function(){
    Route::get('/login', [PemerintahController::class,'login']);
    Route::post('/login', [PemerintahController::class,'postLogin']);
    Route::get('/akun',[PemerintahController::class,'melihatDataAkun']);
    Route::get('/akun/ubah',[PemerintahController::class,'mengubahDataAkun']);
    Route::patch('/akun/ubah',[PemerintahController::class,'postMengubahDataAkun']);
    Route::get('/sertifikasi',[PemerintahController::class,'melihatPengajuanSertifikasi']);
    Route::get('/sertifikasi/buat/{id_sertifikasi}',[PemerintahController::class,'membuatPengajuanSertifikasi']);
    Route::post('/sertifikasi/buat',[PemerintahController::class,'postMembuatPengajuanSertifikasi']);
});

Route::prefix('/admin')->group(function(){
    Route::get('/login', [AdminController::class,'login']);
    Route::post('/login', [AdminController::class,'postLogin']);
    Route::get('/akun',[AdminController::class,'melihatDataAkun']);
    Route::get('/akun/ubah',[AdminController::class,'mengubahDataAkun']);
    Route::patch('/akun/ubah',[AdminController::class,'postMengubahDataAkun']);
});
