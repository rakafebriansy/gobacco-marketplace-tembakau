<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use App\Models\Kecamatan;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PetaniController extends Controller
{
    public function register()
    {
        $id = Session::get('id');
        if(isset($id)) return redirect('/petani/akun');
        return view('petani.register', [
            'title' => 'Petani | Register'
        ]);
    }
    public function postRegister(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_petani' => 'bail|required',
            'username_petani' => 'required|unique:petani_tembakaus,username_petani',
            'pw_petani' => 'required',
            'email_petani' => 'required|email',
            'id_jenis_kelamin' => 'required',
            'alamat_petani' => 'required',
            'id_kecamatan' => 'required',
            'telp_petani' => 'required',
            'noktp_petani' => 'required',
        ]);
        $kecamatan = Kecamatan::query()->where('kecamatan', $validated['id_kecamatan'])->first();
        $jenis_kelamin = JenisKelamin::query()->where('jenis_kelamin', $validated['id_jenis_kelamin'])->first();
        
        $validated['id_kecamatan'] = $kecamatan->id_kecamatan;
        $validated['id_jenis_kelamin'] = $jenis_kelamin->id_jenis_kelamin;
        PetaniTembakau::create($validated);
        return redirect('/register')->with('success', 'Data akun berhasil dibuat!');
    }
    public function melihatDataAkun(Request $request)
    {
        $id_petani = $request->session()->get('id',null);
        if(isset($id_petani)) {
            $petani = PetaniTembakau::find($id_petani);
            $jenis_kelamin = JenisKelamin::find($petani->id_jenis_kelamin);
            return view('petani.akun.akun', [
                'title' => 'Petani | Profil',
                'petani' => $petani,
                'jenis_kelamin' => $jenis_kelamin,
            ]);
        } else {
            return redirect('/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function mengubahDataAkun(Request $request)
    {
        $id_petani = $request->session()->get('id',null);
        if(isset($id_petani)) {
            $petani = PetaniTembakau::find($id_petani);
            $jenis_kelamin = JenisKelamin::find($petani->id_jenis_kelamin);
            return view('petani.akun.ubahAkun', [
                'title' => 'Petani | Ubah Profil',
                'petani' => $petani,
                'jenis_kelamin' => $jenis_kelamin,
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengubahDataAkun(Request $request)
    {
        $validated = $request->validate([
            'username_petani' => 'required',
            'pw_petani' => 'required',
            'nama_petani' => 'required',
            'telp_petani' => 'required',
            'email_petani' => 'required',
            'alamat_petani' => 'required',
            'noktp_petani' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);
        $id_petani = $request->session()->get('id', null);
        if(isset($id_petani)) {
            $jenis_kelamin = JenisKelamin::query()->where('jenis_kelamin',$validated['jenis_kelamin'])->first();
            $row_affected = PetaniTembakau::query()->where('id_petani',$id_petani)->update([
                'username_petani' => $validated['username_petani'],
                'pw_petani' => $validated['pw_petani'],
                'nama_petani' => $validated['nama_petani'],
                'telp_petani' => $validated['telp_petani'],
                'email_petani' => $validated['email_petani'],
                'alamat_petani' => $validated['alamat_petani'],
                'noktp_petani' => $validated['noktp_petani'],
                'id_jenis_kelamin' => $jenis_kelamin->id_jenis_kelamin,
            ]);
            if($row_affected) {
                return redirect('/petani/akun')->with('success','Data akun berhasil diperbarui!');
            } else {
                return redirect('/petani/ubah')->withErrors(['db' => 'Data akun tidak berubah!']);
            }
        }
        return redirect('/petani/ubah')->with('failed','Data akun gagal diperbarui!');
    }
    public function melihatPengajuanSertifikasi(Request $request)
    {
        $id_petani = $request->session()->get('id',null);
        if(isset($id_petani)) {
            $sertifikasis = SertifikasiProduk::query()->where('id_petani',1)->get();
            return view('petani.sertifikasi.table', [
                'title' => 'Petani | Sertifikasi',
                'sertifikasis' => $sertifikasis
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function membuatPengajuanSertifikasi(Request $request)
    {
        $id_petani = $request->session()->get('id',null);
        if(isset($id_petani)) {
            $petani = PetaniTembakau::query()->find($id_petani);
            return view('petani.sertifikasi.form', [
                'title' => 'Petani | Pengajuan Sertifikasi',
                'petani' => $petani
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMembuatPengajuanSertifikasi(Request $request)
    {
        $validated = $request->validate([
            'id_kecamatan' => 'required',
            'id_petani' => 'required',
            'id_pengujian' => 'required',
            'id_jenis_tembakau' => 'required',
            'id_status' => 'required',
            'surat_izin_usaha' => 'required',
            'tgl_serahsampel' => 'required',
            'berkas_lain' => 'required',
            'bukti_tf' => 'required',
        ]);
        $surat_izin_usaha = $request->file('surat_izin_usaha');
        $name1 = $surat_izin_usaha->getClientOriginalName();
        $surat_izin_usaha->storePubliclyAs('surat_izin_usahas', $name1, 'public');

        $berkas_lain = $request->file('berkas_lain');
        $name2 = $berkas_lain->getClientOriginalName();
        $berkas_lain->storePubliclyAs('berkas_lains', $name2, 'public');
        
        $bukti_tf = $request->file('bukti_tf');
        $name3 = $bukti_tf->getClientOriginalName();
        $bukti_tf->storePubliclyAs('bukti_tfs', $name3, 'public');
        
        return "Surat: $name1 Berkas: $name2 Bukti: $name3"; 
    }
}
