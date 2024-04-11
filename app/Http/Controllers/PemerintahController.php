<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Pemerintah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PemerintahController extends Controller
{
    public function login()
    {
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
        if(Pemerintah::query()->where('email_pemerintah',$validated['email_pemerintah'])->where('pw_pemerintah',$validated['pw_pemerintah'])->first()) {
            $request->session()->regenerate();
            return redirect('/pemerintah/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function akun()
    {
        return 'Hai';
    }
}
