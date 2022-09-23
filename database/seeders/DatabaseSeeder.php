<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MejaSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PesananSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MejaSeeder::class);
        $this->call(PesananSeeder::class);
    }
}
