<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kecamatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function melihatDataAkun(Request $request)
    {
        $id_admin = $request->session()->get('id',null);
        if(isset($id_admin)) {
            $admin = Admin::find($id_admin);
            return view('admin.akun.akun', [
                'title' => 'Admin | Profil',
                'admin' => $admin
            ]);
        } else {
            return redirect('/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function mengubahDataAkun(Request $request)
    {
        $id_admin = $request->session()->get('id',null);
        if(isset($id_admin)) {
            $admin = Admin::find($id_admin);
            return view('admin.akun.ubahAkun', [
                'title' => 'Admin | Ubah Profil',
                'admin' => $admin //put id in hidden input on view
            ]);
        } else {
            return redirect('/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function postMengubahDataAkun(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $id_admin = $request->session()->get('id', null);
        if(isset($id_admin)) {
            $row_affected = Admin::query()->where('id_admin',$id_admin)->update([
                'username' => $validated['username'],
                'password' => $validated['password']
            ]);
            if($row_affected) {
                return redirect('/admin/akun')->with('success','Data akun berhasil diperbarui!');
            } else {
                return redirect('/admin/ubah')->withErrors(['db' => 'Data akun tidak berubah!']);
            }
        }
        return redirect('/admin/ubah')->with('failed','Data akun gagal diperbarui!');
    }
}
