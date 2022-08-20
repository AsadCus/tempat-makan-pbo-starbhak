<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'harga',
        'status',
        'jenis_id',
        'resto_id'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function resto()
    {
        return $this->belongsTo(Resto::class, 'resto_id');
    }
}
