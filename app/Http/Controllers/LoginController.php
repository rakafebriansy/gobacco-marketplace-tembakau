<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }
    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $petani = PetaniTembakau::query()->where('username_petani',$validated['username'])->where('pw_petani',$validated['password'])->first();
        if(isset($petani)) {
            $request->session()->put('id',$petani->id_petani);
            return redirect('/petani/akun');
        } else {
            $pemerintah = Pemerintah::query()->where('username_pemerintah',$validated['username'])->where('pw_pemerintah',$validated['password'])->first();
            if (isset($pemerintah)) {
                $request->session()->put('id',$pemerintah->id_pemerintah);
                return redirect('/pemerintah/akun');
            } else {
                $admin = Admin::query()->where('username',$validated['username'])->where('password',$validated['password'])->first();
                if (isset($admin)) {
                    $request->session()->put('id',$admin->id_admin);
                    return redirect('/admin/akun');
                }
            }
        }
        return redirect('/login')->withErrors(['db' => 'Username atau password salah, Silakan coba lagi!']);    
    }
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
