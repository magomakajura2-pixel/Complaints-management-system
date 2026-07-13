<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subcategories')->insert([
            [
                'id' => 1,
                'categoryid' => 1,
                'subcategory' => 'Online Shopping',
                'creationDate' => '2023-03-28 07:11:07',
                'updationDate' => '2023-09-14 07:10:13',
                'created_at' => '2023-03-28 07:11:07',
                'updated_at' => '2023-09-14 07:10:13',
            ],
            [
                'id' => 2,
                'categoryid' => 1,
                'subcategory' => 'E-wllaet',
                'creationDate' => '2023-08-28 07:11:20',
                'updationDate' => '2023-09-14 07:10:00',
                'created_at' => '2023-08-28 07:11:20',
                'updated_at' => '2023-09-14 07:10:00',
            ],
            [
                'id' => 3,
                'categoryid' => 2,
                'subcategory' => 'other',
                'creationDate' => '2023-09-14 07:06:44',
                'updationDate' => '2023-09-14 07:09:47',
                'created_at' => '2023-09-14 07:06:44',
                'updated_at' => '2023-09-14 07:09:47',
            ],
            [
                'id' => 4,
                'categoryid' => 2,
                'subcategory' => 'ABC',
                'creationDate' => '2023-09-12 11:40:13',
                'updationDate' => '2023-09-12 11:59:07',
                'created_at' => '2023-09-12 11:40:13',
                'updated_at' => '2023-09-12 11:59:07',
            ],
        ]);
    }
}
