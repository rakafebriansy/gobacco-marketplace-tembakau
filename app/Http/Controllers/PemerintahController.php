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
}
