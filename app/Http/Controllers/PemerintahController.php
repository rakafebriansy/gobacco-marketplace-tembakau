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
        $pemerintah = Pemerintah::query()->where('email_pemerintah',$validated['email_pemerintah'])->where('pw_pemerintah',$validated['pw_pemerintah'])->first();
        if($pemerintah) {
            $request->session()->put('id_pemerintah',$pemerintah->id_pemerintah);
            return redirect('/pemerintah/akun');
        }
        return back()->with('failed','Username atau password salah, Silahkan coba lagi!');    
    }
    public function profil(Request $request)
    {
        $id_pemerintah = $request->session()->get('id_pemerintah',null);
        if(isset($id_pemerintah)) {
            $pemerintah = Pemerintah::find($id_pemerintah);
            return view('pemerintah.profil', [
                'title' => 'Pemerintah | Profil',
                'pemerintah' => $pemerintah
            ]);
        } else {
            return redirect('pemerintah/login')->with('failed','Silahkan login terlebih dahulu!');
        }
    }
    public function akun()
    {
        return 'Hai';
    }
}
