<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function index(){
        return view('auth.admin');
    }

    public function login(Request $request){
        if(Auth::guard('admin')->attempt($request->only('username', 'password'))){
            return redirect()->route('admin.dashboard.index');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password yang dimasukkan salah');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('auth.admin.index')->with('success', 'Berhasil keluar akun');
    }
}
