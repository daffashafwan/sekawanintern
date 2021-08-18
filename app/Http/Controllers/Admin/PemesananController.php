<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Driver;
use App\Models\Penyetuju;
use App\Models\Kendaraan;
class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::all();
        $driver = Driver::all();
        $penyetuju = Penyetuju::all();
        $kendaraan = Kendaraan::all();
        return view('admin.pemesanan.index', compact('pemesanan', 'driver'.'penyetuju','kendaraan'));
    }

    public function tambah(Request $request){
        try {
            $data = $request->input();
            $pemesanan = new Pemesanan;
            $pemesanan->nama = $data['nama'];
            $pemesanan->username = $data['username'];
            $pemesanan->password = bcrypt($data['password']);
            $pemesanan->save();
            return redirect()->back()->with('Berhasil Tambah pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah pemesanan');
        }
    }

    public function edit(Request $request){
        try {
            $data = $request->input();
            $pemesanan = Pemesanan::find($data['id']);
            $pemesanan->nama = $data['nama'];
            $pemesanan->username = $data['username'];
            $pemesanan->password = bcrypt($data['password']);
            $pemesanan->save();
            return redirect()->back()->with('Berhasil Tambah pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah pemesanan');
        }
    }

    public function hapus(){
        try {
            Pemesanan::destroy(request()->route('pesid'));
            return redirect()->back()->with('Berhasil Tambah pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah pemesanan');
        }
    }
}
