<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'jhonatan@hotmail.com',
            'password' => hash('sha512','hola123')
        ])->assignRole('Admin');

        User::create([
            'email' => 'karen@hotmail.com',
            'password' => hash('sha512','hola123')
        ])->assignRole('Professional');
    }
}