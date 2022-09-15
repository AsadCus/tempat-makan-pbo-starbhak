<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin1',
                'email' => 'admin@nugas.com',
                'level' => 'admin',
                'password' => bcrypt('12345'),
            ],
            [
                'username' => 'manajer1',
                'email' => 'manajer@nugas.com',
                'level' => 'manajer',
                'password' => bcrypt('12345'),
            ],
            [
                'username' => 'kasir1',
                'email' => 'kasir@nugas.com',
                'level' => 'kasir',
                'password' => bcrypt('12345'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
