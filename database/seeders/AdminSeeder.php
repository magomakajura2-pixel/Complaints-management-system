<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'id' => 1,
                'fullname' => 'admin',
                'mobilenumber' => 8956232356,
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => md5('Test@123'),
                'creationDate' => '2023-09-12 05:16:16',
                'updationDate' => '18-10-2016 04:18:16',
                'created_at' => '2023-09-12 05:16:16',
                'updated_at' => '2023-09-12 05:16:16',
            ],
        ]);
    }
}
