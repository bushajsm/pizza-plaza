<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('admin1234'),
           'is_admin' => 1,
        ]);
        User::create([
           'name' => 'User',
           'email' => 'user@gmail.com',
           'password' => Hash::make('user1234'),
           'is_admin' => 0,
         ]);
        

    }
}
