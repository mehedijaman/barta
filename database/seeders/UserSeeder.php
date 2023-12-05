<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Factory()->create([
            'name' => 'Mehedi Jaman',
            'username' => 'mail4mjaman',
            'email' => 'mail4mjaman@gmail.com',
            'password' => bcrypt('e!@671c3ny')
        ]);
    }
}
