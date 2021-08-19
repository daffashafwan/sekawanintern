<?php

namespace App\Http\Controllers\Penyetuju;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Kendaraan;
class DashboardController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::where('penyetuju_id', Auth::guard('penyetuju')->id())->with('Kendaraan', 'Driver')->get();
        return view('penyetuju.dashboard', compact('pemesanan'));
    }
    public function penyetujuan(Request $request){
        $tanggal = Carbon\Carbon::now()->toDateTimeString();
        try {
            $data = $request->input();
            $pemesanan = Pemesanan::find($data['id']);
            $pemesanan->tanggal_penyetujuan = $tanggal;
            $pemesanan->status = $data['status'];
            $pemesanan->save();
            $kendaraan = Kendaraan::find($pemesanan->kendaraan_id);
            $kendaraan->status = $data['status'] == 1 ? 2 : 0;
            $kendaraan->save();
            return redirect()->back()->with('success','Berhasil Approve pemesanan');
        } catch (Exception $e) {
            return redirect()->back()->with('danger','Gagal Approve pemesanan');
        }
    }
}
