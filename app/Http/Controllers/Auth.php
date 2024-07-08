<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth as RequestsAuth;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth extends BaseController
{
    public function show()
    {
        return view('auth.login');
    }

    public function login_proses(RequestsAuth $authRequest)
    {
        $credential = $authRequest->getCredentials();

        if (!FacadesAuth::attempt($credential)) {
            return redirect()->route('login.login-akun')->with('failed', 'Username atau Password salah')->withInput($authRequest->only('username'));
        } else {
            return $this->authenticated();
        }
    }

    public function authenticated()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard-admin');
        } else {
            return redirect()->route('user.dashboard-user');
        }
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login.login-akun')->with('success', 'Berhasil Logout');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function register_proses(Register $register)
    {
        $data = array();

        $newFoto = '';
        if ($register->file('foto')) {
            $extension = $register->file('foto')->extension();
            $newFoto = $register->name . '-' . now()->timestamp . '.' . $extension;
            $register->file('foto')->storeAs('bukti', $newFoto);
        }

        try {
            $data = new User();
            $data->name = $register->name;
            $data->username = $register->username;
            $data->email = $register->email;
            $data->role = 'user';
            $data->foto = $newFoto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return redirect()->route('login.login-akun')->with('success', 'Registrasi berhasil cek email anda secara berkala');
    }
}
