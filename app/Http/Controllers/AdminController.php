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
    public function login()
    {
        return view('admin.login', [
            'title' => 'Admin | Login'
        ]);
    }
    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::query()->where('username',$validated['username'])->where('password',$validated['password'])->first();
        if($admin) {
            $request->session()->regenerate();
            $request->session()->put('id_admin',$admin->id_admin);
            return redirect('/admin/profil');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function melihatDataAkun(Request $request)
    {
        $id_admin = $request->session()->get('id_admin',null);
        if(isset($id_admin)) {
            $admin = Admin::find($id_admin);
            return view('admin.profil', [
                'title' => 'Admin | Profil',
                'admin' => $admin
            ]);
        } else {
            return redirect('admin/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    // public function ()
    // {
        
    // }
    public function akun()
    {
        return 'Hai';
    }
}
