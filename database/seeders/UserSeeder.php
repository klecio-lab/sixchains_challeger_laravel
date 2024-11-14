<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::firstOrCreate([
            'email' => 'kleciohenrique18@gmail.com', // Busca pelo email
        ], [
            'name' => 'Klecio Henrique',
            'password' => bcrypt('123456'), // Criptografa a senha
        ]);
    }
}
