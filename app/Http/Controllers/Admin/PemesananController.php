<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Driver;
use App\Models\Penyetuju;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::with('Kendaraan')->with('Penyetuju')->with('Driver')->get();
        $driver = Driver::all();
        $penyetuju = Penyetuju::all();
        $kendaraan = Kendaraan::where('status', 0)->get();
        return view('admin.pemesanan.index', compact('pemesanan', 'driver','penyetuju','kendaraan'));
    }

    public function tambah(Request $request){
        try {
            $data = $request->input();
            $pemesanan = new Pemesanan;
            $pemesanan->admin_id = Auth::guard('admin')->id();
            $pemesanan->waktu_pemesanan = $data['waktu_pemesanan'];
            $pemesanan->driver_id = $data['driver'];
            $pemesanan->penyetuju_id = $data['penyetuju'];
            $pemesanan->kendaraan_id = $data['kendaraan'];
            $pemesanan->status = 0;
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
            $pemesanan->admin_id = Auth::guard('admin')->id();
            $pemesanan->waktu_pemesanan = $data['waktu_pemesanan'];
            $pemesanan->driver_id = $data['driver'];
            $pemesanan->penyetuju_id = $data['penyetuju'];
            $pemesanan->kendaraan_id = $data['kendaraan'];
            $pemesanan->save();
            return redirect()->back()->with('Berhasil Edit pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Edit pemesanan');
        }
    }

    public function hapus(){
        try {
            Pemesanan::destroy(request()->route('pesid'));
            return redirect()->back()->with('Berhasil Hapus pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Hapus pemesanan');
        }
    }
}
