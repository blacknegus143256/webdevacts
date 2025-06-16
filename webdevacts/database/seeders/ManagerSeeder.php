<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manager;

class ManagerSeeder extends Seeder
{
    public function run()
    {
       Manager::updateOrCreate(
    ['email' => 'admin@example.com'], // Search by this
    [
        'name' => 'Admin',
        'password' => bcrypt('password123'),
    ]
);
    }
}
