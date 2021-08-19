<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kendaraan;

class DashboardController extends Controller
{
    public function index(){
        //json_encode;
        $kendaraan = Kendaraan::all()->toArray();
        foreach ($kendaraan as $key => $value) {
            $pemesanan[] = Pemesanan::where('kendaraan_id',$value)->count();
        }
        $kendaraan = Kendaraan::pluck('nama')->toArray();

        return view('admin.dashboard')->with('kendaraan', json_encode($kendaraan,JSON_NUMERIC_CHECK))->with('pemesanan', json_encode($pemesanan,JSON_NUMERIC_CHECK));
    }
}
