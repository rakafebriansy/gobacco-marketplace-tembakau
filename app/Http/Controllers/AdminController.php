<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kecamatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        if(Admin::query()->where('username',$validated['username'])->where('password',$validated['password'])->first()) {
            $request->session()->regenerate();
            return redirect('/admin/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function akun()
    {
        return 'Hai';
    }
}
