<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyetuju;

class PenyetujuController extends Controller
{
    public function index(){
        $penyetuju = Penyetuju::all();
        return view('admin.penyetuju.index', compact('penyetuju'));
    }

    public function tambah(Request $request){
        try {
            $data = $request->input();
            $penyetuju = new Penyetuju;
            $penyetuju->nama = $data['nama'];
            $penyetuju->username = $data['username'];
            $penyetuju->password = bcrypt($data['password']);
            $penyetuju->save();
            return redirect()->back()->with('Berhasil Tambah penyetuju');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah penyetuju');
        }
    }

    public function edit(Request $request){
        try {
            $data = $request->input();
            $penyetuju = Penyetuju::find($data['id']);
            $penyetuju->nama = $data['nama'];
            $penyetuju->username = $data['username'];
            $penyetuju->password = bcrypt($data['password']);
            $penyetuju->save();
            return redirect()->back()->with('Berhasil Tambah penyetuju');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah penyetuju');
        }
    }

    public function hapus(){
        try {
            Penyetuju::destroy(request()->route('pid'));
            return redirect()->back()->with('Berhasil Tambah penyetuju');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah penyetuju');
        }
    }
}
