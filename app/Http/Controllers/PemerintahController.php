<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemerintahController extends Controller
{
    public function login()
    {
        $id = Session::get('id_pemerintah');
        if(isset($id)) return redirect('/pemerintah/akun');
        return view('pemerintah.login', [
            'title' => 'Pemerintah | Login'
        ]);
    }
    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email_pemerintah' => 'required',
            'pw_pemerintah' => 'required'
        ]);
        $pemerintah = Pemerintah::query()->where('email_pemerintah',$validated['email_pemerintah'])->where('pw_pemerintah',$validated['pw_pemerintah'])->first();
        if($pemerintah) {
            $request->session()->put('id_pemerintah',$pemerintah->id_pemerintah);
            return redirect('/pemerintah/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function melihatDataAkun(Request $request)
    {
        $id_pemerintah = $request->session()->get('id_pemerintah',null);
        if(isset($id_pemerintah)) {
            $pemerintah = Pemerintah::find($id_pemerintah);
            return view('pemerintah.akun', [
                'title' => 'Pemerintah | Profil',
                'pemerintah' => $pemerintah
            ]);
        } else {
            return redirect('pemerintah/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function mengubahDataAkun(Request $request)
    {
        $id_pemerintah = $request->session()->get('id_pemerintah',null);
        if(isset($id_pemerintah)) {
            $pemerintah = Pemerintah::find($id_pemerintah);
            return view('pemerintah.ubahAkun', [
                'title' => 'Pemerintah | Ubah Profil',
                'pemerintah' => $pemerintah //put id in hidden input on view
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengubahDataAkun(Request $request)
    {
        var_dump('ld');
        $validated = $request->validate([
            'username_pemerintah' => 'required',
            'pw_pemerintah' => 'required'
        ]);
        $id_pemerintah = $request->session()->get('id_pemerintah', null);
        var_dump($id_pemerintah);
        if(isset($id_pemerintah)) {
            $row_affected = Pemerintah::query()->where('id_pemerintah',$id_pemerintah)->update([
                'username_pemerintah' => $validated['username_pemerintah'],
                'pw_pemerintah' => $validated['pw_pemerintah']
            ]);
            if($row_affected) {
                return redirect('/pemerintah/akun')->with('success','Data akun berhasil diperbarui!');
            }
        }
        return redirect('/')->with('failed','Data akun gagal diperbarui!');
    }
    public function melihatPengajuanSertifikasi(Request $request)
    {
        $id_pemerintah = $request->session()->get('id_pemerintah',null);
        if(isset($id_pemerintah)) {
            $id_kecamatan = Pemerintah::query()->find($id_pemerintah)->id_kecamatan;
            $sertifikasis = SertifikasiProduk::query()->where('id_kecamatan',$id_kecamatan)->get();
            return view('pemerintah.sertifikasi.table', [
                'title' => 'Pemerintah | Sertifikasi',
                'sertifikasis' => $sertifikasis
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function membuatPengajuanSertifikasi($id_sertifikasi)
    {
        if(isset($id_sertifikasi)) {
            $sertifikasi = SertifikasiProduk::find($id_sertifikasi);
            return view('pemerintah.sertifikasi.form', [
                'title' => 'Pemerintah | Pengajuan Sertifikasi',
                'sertifikasi' => $sertifikasi
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
}
