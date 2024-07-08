<?php

namespace App\Http\Controllers;

use App\Models\KategoriSoal;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard()
    {
        $module = 'Dashboard';
        return view('admin.dashboard.index', compact('module'));
    }

    public function dashboard_user()
    {
        $module = 'Dashboard User';
        $data = KategoriSoal::all();
        return view('user.dashboard.index', compact('module', 'data'));
    }
}
