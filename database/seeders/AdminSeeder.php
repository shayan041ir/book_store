<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$lZ65kCWu9vC7Sl9Zxz0x4uKIU8Gwy4bmqb/g3FmQBT8SCivDEiJuS', 
            'remember_token' => null,
        ]);
    }
}
