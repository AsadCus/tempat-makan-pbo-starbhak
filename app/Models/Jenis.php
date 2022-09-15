<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
