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
        User::insert([
            'name' => 'Abdelkader Refaat',
            'email' => 'abdelkaderrefaat@gmail.com',
            "is_admin" => "1",
            "phone" => "010202020202",
            "address" =>"mansoura",
            "city" => "dacahlya",
            "pincode" => "46758",
            'password' =>Hash::make('mnmnmnmn'),

        ]);
        User::insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>Hash::make('mnmnmnmn')
        ]);
    }
}
