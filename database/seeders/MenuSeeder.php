<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Jenis;
use App\Models\Resto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'jenis' => 'makanan'
            ],
            [
                'jenis' => 'minuman'
            ]
        ];

        foreach ($jenis as $key => $value) {
            Jenis::create($value);
        }

        $resto = [
            [
                'nama_resto' => 'TempatMakan',
                'profil' => 'Restoran enak dengan harga murah',
                'alamat' => 'Depok, Jawa Barat'
            ]
        ];

        foreach ($resto as $key => $value) {
            Resto::create($value);
        }

        $menu = [
            [
                'nama_menu' => 'Mie Ayam',
                'harga' => '13000',
                'status' => 'tersedia',
                'jenis_id' => '1',
                'resto_id' => '1'
            ],
            [
                'nama_menu' => 'Mie Ayam Pangsit',
                'harga' => '15000',
                'status' => 'tersedia',
                'jenis_id' => '1',
                'resto_id' => '1'
            ],
            [
                'nama_menu' => 'Mie Ayam Bakso',
                'harga' => '16000',
                'status' => 'tersedia',
                'jenis_id' => '1',
                'resto_id' => '1'
            ],
            [
                'nama_menu' => 'Es Teh Manis',
                'harga' => '3000',
                'status' => 'tersedia',
                'jenis_id' => '2',
                'resto_id' => '1'
            ],
        ];

        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}
