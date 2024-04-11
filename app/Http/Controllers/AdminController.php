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
}
