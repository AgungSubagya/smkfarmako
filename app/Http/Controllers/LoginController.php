<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login ()
    {
        return view('backend.login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:5|max:100'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Alert::success('Berhasil', 'Anda Telah Login');
            return redirect()->intended('/backend');
        }
        return back()->with('loginError', 'login Failed!');
    }

    public function keluar()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Berhasil', 'Anda Telah Logout');
        return redirect('backend/login');

    }
}
