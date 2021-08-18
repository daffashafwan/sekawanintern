<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $guarded = [];

    public function Admin(){
        return $this->belongsTo(Admin::class);
    }

    public function Kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }

    public function Driver(){
        return $this->belongsTo(Driver::class);
    }

    public function Penyetuju(){
        return $this->belongsTo(Penyetuju::class);
    }
}
