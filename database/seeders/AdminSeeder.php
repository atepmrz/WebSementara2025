<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Super',
            'email' => 'adminit@gmail.com',
            'password' => Hash::make('admin210.'), // ganti password sesuai kebutuhan
        ]);
    }
}
