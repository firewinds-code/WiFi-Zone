<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Ekta',
            'last_name' => 'Mangal',
            'email' => 'ektamangal8076@gmail.com',
            'phone' => '8076371375',
            'usertype' => 1,
            'password' => bcrypt ( value: 'qwerty7890')
        ]);
    }
}