<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin210.'), // Ensure this matches what you use to log in
        ]);
    }
}
//Setelah memperbarui seeder, jalankan perintah berikut untuk mengisi ulang data://
// php artisan db:seed --class=User Seeder//

// Atau jika Anda ingin menghapus semua data dan mengisi ulang://
// php artisan migrate:fresh --seed //