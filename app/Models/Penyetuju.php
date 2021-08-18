<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Penyetuju extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'penyetuju';
    protected $guarded = [];

    public function Pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
}
