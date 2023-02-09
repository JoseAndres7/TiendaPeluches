<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("admin1234");
        $user->role = "admin";
        $user->balance = 5000;

        $user->save();

    }
}
