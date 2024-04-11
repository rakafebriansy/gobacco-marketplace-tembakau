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
