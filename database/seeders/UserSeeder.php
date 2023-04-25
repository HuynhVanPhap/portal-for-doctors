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
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                "name" => "Huỳnh Văn Pháp",
                "email" => "huynhvanphap198@gmail.com",
                "password" => Hash::make('Ab12345!'),
                "usertype" => config('constraint.auth.admin')
            ],
            [
                "name" => "Nguyễn Văn A",
                "email" => "nguyenvana@gmail.com",
                "password" => Hash::make('Ab12345!'),
                "usertype" => config('constraint.auth.user')
            ],

        ];

        User::truncate();
        User::insert($data);
    }
}
