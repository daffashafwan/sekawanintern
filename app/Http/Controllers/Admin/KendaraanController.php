<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Exception;

class KendaraanController extends Controller
{
    public function index(){
        $kendaraan = Kendaraan::all();
        return view('admin.kendaraan.index', compact('kendaraan'));
    }

    public function tambah(Request $request){
        try {
            $data = $request->input();
            $kendaraan = new Kendaraan;
            $kendaraan->nama = $data['nama'];
            $kendaraan->bensin = $data['bensin'];
            $kendaraan->jadwal_servis = $data['jadwal_servis'];
            $kendaraan->servis_terakhir = $data['servis_terakhir'];
            $kendaraan->status = $data['status'];
            $kendaraan->save();
            return redirect()->back()->with('Berhasil Tambah Kendaraan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah Kendaraan');
        }
    }

    public function edit(Request $request){
        try {
            $data = $request->input();
            $kendaraan = Kendaraan::find($data['id']);
            $kendaraan->nama = $data['nama'];
            $kendaraan->bensin = $data['bensin'];
            $kendaraan->jadwal_servis = $data['jadwal_servis'];
            $kendaraan->servis_terakhir = $data['servis_terakhir'];
            $kendaraan->status = $data['status'];
            $kendaraan->save();
            return redirect()->back()->with('Berhasil Tambah Kendaraan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah Kendaraan');
        }
    }

    public function hapus(){
        try {
            Kendaraan::destroy(request()->route('kid'));
            return redirect()->back()->with('Berhasil Tambah Kendaraan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah Kendaraan');
        }
    }
}
