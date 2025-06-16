<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(ManagerSeeder::class); 
        User::factory(10)->create();

       User::updateOrCreate(
    ['email' => 'test@example.com'], // Search condition
    [
        'name' => 'Test User',
        'gender' => 'Test Gender',
        'password' => bcrypt('password123'), // Add password if needed
    ]
);
    }
}
