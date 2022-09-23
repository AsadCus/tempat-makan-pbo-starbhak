<?php

namespace Database\Seeders;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pesanan = [
            [
                'user_id' => 3,
                'kode_pesanan' => '01/Makan',
                'meja_id' => 5,
                'status' => 'active'
            ],
            [
                'user_id' => 3,
                'kode_pesanan' => '02/Makan',
                'meja_id' => 6,
                'status' => 'active'
            ],
            [
                'user_id' => 3,
                'kode_pesanan' => '03/Makan',
                'meja_id' => 2,
                'status' => 'active'
            ],
        ];

        foreach ($pesanan as $key => $value) {
            Pesanan::create($value);
        }

        $dPesanan = [
            [
                'pesanan_id' => 1,
                'menu_id' => 3,
                'qty' => 1,
                'jml_harga' => 15000
            ],
            [
                'pesanan_id' => 1,
                'menu_id' => 2,
                'qty' => 1,
                'jml_harga' => 15000
            ],
            [
                'pesanan_id' => 1,
                'menu_id' => 4,
                'qty' => 1,
                'jml_harga' => 3000
            ],
            [
                'pesanan_id' => 2,
                'menu_id' => 1,
                'qty' => 1,
                'jml_harga' => 13000
            ],
            [
                'pesanan_id' => 2,
                'menu_id' => 4,
                'qty' => 1,
                'jml_harga' => 3000
            ],
            [
                'pesanan_id' => 3,
                'menu_id' => 1,
                'qty' => 2,
                'jml_harga' => 26000
            ],
            [
                'pesanan_id' => 3,
                'menu_id' => 2,
                'qty' => 2,
                'jml_harga' => 30000
            ],
            [
                'pesanan_id' => 3,
                'menu_id' => 4,
                'qty' => 3,
                'jml_harga' => 9000
            ],
        ];

        foreach ($dPesanan as $key => $value) {
            DetailPesanan::create($value);
        }
    }
}
