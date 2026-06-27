<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\JalurPendaftaranSeeder;
use Database\Seeders\PpdbSeeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
        User::updateOrCreate([
            'name' => 'Panitia PPDB',
            'email' => 'panitia@gmail.com',
            'password' => Hash::make('panitia123'),
            'role' => 'panitia',
        ]);
        $this->call(JalurPendaftaranSeeder::class);
    }
}
