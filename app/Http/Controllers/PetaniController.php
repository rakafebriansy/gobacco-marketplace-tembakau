<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use App\Models\Kecamatan;
use App\Models\PetaniTembakau;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PetaniController extends Controller
{
    public function register()
    {
        return view('petani.register', [
            'title' => 'Petani | Register'
        ]);
    }
    public function postRegister(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_petani' => 'required',
            'username_petani' => 'required|unique:petani_tembakaus,username_petani',
            'pw_petani' => 'required',
            'email_petani' => 'required',
            'id_jenis_kelamin' => 'required',
            'alamat_petani' => 'required',
            'id_kecamatan' => 'required',
            'telp_petani' => 'required',
            'noktp_petani' => 'required',
        ]);
        try {
            $kecamatan = Kecamatan::query()->where('kecamatan', $validated['id_kecamatan'])->first();
            $jenis_kelamin = JenisKelamin::query()->where('jenis_kelamin', $validated['id_jenis_kelamin'])->first();
            
            $validated['id_kecamatan'] = $kecamatan->id_kecamatan;
            $validated['id_jenis_kelamin'] = $jenis_kelamin->id_jenis_kelamin;
            PetaniTembakau::create($validated);
            return redirect('/petani/login')->with('success', 'Data akun berhasil dibuat!');
        } catch (ValidationException $e) {
            return back()->with('failed',$e->errors());
        }
    }
    public function login()
    {
        return view('petani.login', [
            'title' => 'Petani | Login'
        ]);
    }
    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email_petani' => 'required',
            'pw_petani' => 'required'
        ]);
        if(PetaniTembakau::query()->where('email_petani',$validated['email_petani'])->where('pw_petani',$validated['pw_petani'])->first()) {
            $request->session()->regenerate();
            return redirect('/petani/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function akun()
    {
        return 'Hai';
    }
}
