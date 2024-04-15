<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PemerintahController extends Controller
{
    public function melihatDataAkun(Request $request)
    {
        $id_pemerintah = $request->session()->get('id',null);
        if(isset($id_pemerintah)) {
            $pemerintah = Pemerintah::find($id_pemerintah);
            $kecamatan = $pemerintah->kecamatan;
            return view('pemerintah.akun.akun', [
                'title' => 'Pemerintah | Profil',
                'pemerintah' => $pemerintah,
                'kecamatan' => $kecamatan
            ]);
        } else {
            return redirect('/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function mengubahDataAkun(Request $request)
    {
        $id_pemerintah = $request->session()->get('id',null);
        if(isset($id_pemerintah)) {
            $pemerintah = Pemerintah::find($id_pemerintah);
            $kecamatan = $pemerintah->kecamatan;
            return view('pemerintah.akun.ubahAkun', [
                'title' => 'Pemerintah | Ubah Profil',
                'pemerintah' => $pemerintah,
                'kecamatan' => $kecamatan
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengubahDataAkun(Request $request)
    {
        $validated = $request->validate([
            'username_pemerintah' => 'required',
            'pw_pemerintah' => 'required',
            'email_pemerintah' => 'required',
            'telp_pemerintah' => 'required',
            'kecamatan' => 'required',
        ]);
        $id_pemerintah = $request->session()->get('id', null);
        if(isset($id_pemerintah)) {
            $kecamatan = Kecamatan::where('kecamatan',$validated['kecamatan'])->first();
            $row_affected = Pemerintah::query()->where('id_pemerintah',$id_pemerintah)->update([
                'username_pemerintah' => $validated['username_pemerintah'],
                'pw_pemerintah' => $validated['pw_pemerintah'],
                'email_pemerintah' => $validated['email_pemerintah'],
                'telp_pemerintah' => $validated['telp_pemerintah'],
                'id_kecamatan' => $kecamatan->id_kecamatan
            ]);
            if($row_affected) {
                return redirect('/pemerintah/akun')->with('success','Data akun berhasil diperbarui!');
            } else {
                return redirect('/pemerintah/ubah')->withErrors(['db' => 'Data akun tidak berubah!']);
            }
        }
        return redirect('/')->with('failed','Data akun gagal diperbarui!');
    }
    public function melihatPengajuanSertifikasi(Request $request)
    {
        $id_pemerintah = $request->session()->get('id',null);
        if(isset($id_pemerintah)) {
            $id_kecamatan = Pemerintah::query()->find($id_pemerintah)->id_kecamatan;
            $sertifikasis = SertifikasiProduk::query()->select('sertifikasi_produks.*','jenis_pengujians.jenis_pengujian','jenis_tembakaus.*','petani_tembakaus.nama_petani')
            ->where('sertifikasi_produks.id_kecamatan',$id_kecamatan)
            ->join('jenis_tembakaus','jenis_tembakaus.id_jenis_tembakau','=','sertifikasi_produks.id_jenis_tembakau')
            ->join('jenis_pengujians','jenis_pengujians.id_pengujian','=','sertifikasi_produks.id_pengujian')
            ->join('petani_tembakaus','petani_tembakaus.id_petani','=','sertifikasi_produks.id_petani')->get();
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
        $sertifikasi = SertifikasiProduk::query()->select('sertifikasi_produks.*','jenis_pengujians.*','jenis_tembakaus.*','petani_tembakaus.*')
        ->where('sertifikasi_produks.id_sertifikasi',$id_sertifikasi)
        ->join('jenis_tembakaus','jenis_tembakaus.id_jenis_tembakau','=','sertifikasi_produks.id_jenis_tembakau')
        ->join('jenis_pengujians','jenis_pengujians.id_pengujian','=','sertifikasi_produks.id_pengujian')
        ->join('petani_tembakaus','petani_tembakaus.id_petani','=','sertifikasi_produks.id_petani')->first();
        if(isset($sertifikasi)) {
            return view('pemerintah.sertifikasi.form', [
                'title' => 'Pemerintah | Pengajuan Sertifikasi',
                'sertifikasi' => $sertifikasi
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMembuatPengajuanSertifikasi(Request $request)
    {
        $status_fix = $request->input('id_status');
        $id_sertifikasi = $request->input('id_sertifikasi');
        try {
            SertifikasiProduk::query()->where('id_sertifikasi',$id_sertifikasi)->update(['id_status' => intval($status_fix)]);
            if($status_fix == '1') {
                return redirect('/pemerintah/sertifikasi/')->with('accepted', 'Data akun berhasil diperbarui!');
            } else if($status_fix == '2') {
                return redirect('/pemerintah/sertifikasi/')->with('declined', 'Data akun berhasil diperbarui!');
            }
        } catch (QueryException $e) {
            return back()->with('failed','Data akun gagal diperbarui!');
        }
    }
    public function mengunggahPengajuanSertifikasi($id_sertifikasi)
    {
        if(isset($id_sertifikasi)) {
            return view('pemerintah.sertifikasi.unggah', [
                'title' => 'Pemerintah | Mengunggah Hasil',
                'id_sertifikasi' => $id_sertifikasi
            ]);
        } else {
            return redirect('/')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengunggahPengajuanSertifikasi(Request $request)
    {
        $validated = $request->validate([
            'id_sertifikasi' => 'required',
            'hasil_pengujian' => 'required'
        ]);
        $hasil_pengujian = $request->file('hasil_pengujian');
        $name = $hasil_pengujian->getClientOriginalName();
        $hasil_pengujian->storePubliclyAs('hasil_pengujians', $name, 'public');
        try {
            SertifikasiProduk::query()->where('id_sertifikasi',$validated['id_sertifikasi'])->update(['hasil_pengujian' => $name]);
            return redirect('/pemerintah/sertifikasi')->with('success', 'Data akun berhasil diperbarui!');
        } catch (QueryException $e) {
            return back()->with('failed','Data akun gagal diperbarui!');
        }
    }
    public function downloadFile(string $folder_name, string $file_name)
    {
        return Storage::download('/' . $folder_name .'/' . $file_name);
    }
}
