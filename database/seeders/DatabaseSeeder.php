<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chama o seeder de usuários e tarefas
        $this->call([
            UserSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
