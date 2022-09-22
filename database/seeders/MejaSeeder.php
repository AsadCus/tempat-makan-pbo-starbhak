<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meja = [
            [
                'no_meja' => '01',
                'status' => 'tersedia'
            ],
            [
                'no_meja' => '02',
                'status' => 'tersedia'
            ],
            [
                'no_meja' => '03',
                'status' => 'tersedia'
            ],
            [
                'no_meja' => '04',
                'status' => 'tersedia'
            ],
            [
                'no_meja' => '05',
                'status' => 'tersedia'
            ],
            [
                'no_meja' => '06',
                'status' => 'tersedia'
            ],
        ];

        foreach ($meja as $key => $value) {
            Meja::create($value);
        }
    }
}
