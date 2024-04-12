<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use App\Models\Kecamatan;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PetaniController extends Controller
{
    public function register()
    {
        $id = Session::get('id_petani');
        if(isset($id)) return redirect('/petani/akun');
        return view('petani.login1', [
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
        $id = Session::get('id_petani');
        if(isset($id)) return redirect('/petani/akun');
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
        $petani_tembakau = PetaniTembakau::query()->where('email_petani',$validated['email_petani'])->where('pw_petani',$validated['pw_petani'])->first();
        if($petani_tembakau) {
            $request->session()->put('id_petani',$petani_tembakau->id_petani);
            return redirect('/petani/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function melihatDataAkun(Request $request)
    {
        $id_petani = $request->session()->get('id_petani',null);
        if(isset($id_petani)) {
            $petani = PetaniTembakau::find($id_petani);
            return view('petani.akun', [
                'title' => 'Petani | Profil',
                'petani' => $petani
            ]);
        } else {
            return redirect('petani/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function mengubahDataAkun(Request $request)
    {
        $id_petani = $request->session()->get('id_petani',null);
        if(isset($id_petani)) {
            $petani = PetaniTembakau::find($id_petani);
            return view('petani.ubahAkun', [
                'title' => 'Petani | Ubah Profil',
                'petani' => $petani //put id in hidden input on view
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengubahDataAkun(Request $request)
    {
        $validated = $request->validate([
            'username_petani' => 'required',
            'pw_petani' => 'required'
        ]);
        $id_petani = $request->session()->get('id_petani', null);
        if(isset($id_petani)) {
            $row_affected = PetaniTembakau::query()->where('id_petani',$id_petani)->update([
                'username_petani' => $validated['username_petani'],
                'pw_petani' => $validated['pw_petani']
            ]);
            if($row_affected) {
                return redirect('/petani/akun')->with('success','Data akun berhasil diperbarui!');
            }
        }
        return redirect('/')->with('failed','Data akun gagal diperbarui!');
    }
    public function melihatPengajuanSertifikasi(Request $request)
    {
        $id_petani = $request->session()->get('id_petani',null);
        if(isset($id_petani)) {
            $sertifikasis = SertifikasiProduk::query()->where('id_petani',$id_petani)->get();
            return view('petani.sertifikasi.table', [
                'title' => 'Petani | Sertifikasi',
                'sertifikasis' => $sertifikasis
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
}
