<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index(){
        $driver = Driver::all();
        return view('admin.driver.index', compact('driver'));
    }

    public function tambah(Request $request){
        try {
            $data = $request->input();
            $driver = new Driver;
            $driver->nama = $data['nama'];
            $driver->alamat = $data['alamat'];
            $driver->no_telepon = $data['no_telepon'];
            $driver->email = $data['email'];
            $driver->save();
            return redirect()->back()->with('Berhasil Tambah driver');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah driver');
        }
    }

    public function edit(Request $request){
        try {
            $data = $request->input();
            $driver = Driver::find($data['id']);
            $driver->nama = $data['nama'];
            $driver->alamat = $data['alamat'];
            $driver->no_telepon = $data['no_telepon'];
            $driver->email = $data['email'];
            $driver->save();
            return redirect()->back()->with('Berhasil Tambah driver');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah driver');
        }
    }

    public function hapus(){
        try {
            Driver::destroy(request()->route('did'));
            return redirect()->back()->with('Berhasil Tambah driver');
        } catch (Exception $e) {
            return redirect()->back()->with('Gagal Tambah driver');
        }
    }
}
