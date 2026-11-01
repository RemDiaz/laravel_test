<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name'=>'moderator',
            'email'=>'moderator@mail.ru',
            'password'=>Hash::make('123456'),
            'role_id'=>1
        ]);
    }
}
