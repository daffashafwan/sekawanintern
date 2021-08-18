<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPenyetujuController extends Controller
{
    public function index(){
        return view('auth.penyetuju');
    }

    public function login(Request $request){
        if(Auth::guard('penyetuju')->attempt($request->only('username', 'password'))){
            return redirect()->route('penyetuju.dashboard.index');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password yang dimasukkan salah.');
        }
    }

    public function logout(){
        Auth::guard('penyetuju')->logout();
        return redirect()->route('auth.penyetuju.index')->with('success', 'Berhasil keluar akun');
    }
}
