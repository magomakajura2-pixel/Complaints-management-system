<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'categoryName' => 'E-commerce',
                'categoryDescription' => 'E-commerce',
                'creationDate' => '2023-08-28 07:10:55',
                'updationDate' => '2023-09-14 07:10:30',
                'created_at' => '2023-08-28 07:10:55',
                'updated_at' => '2023-09-14 07:10:30',
            ],
            [
                'id' => 2,
                'categoryName' => 'general',
                'categoryDescription' => 'dsdas',
                'creationDate' => '2023-08-11 10:54:06',
                'updationDate' => '2023-09-14 07:10:46',
                'created_at' => '2023-08-11 10:54:06',
                'updated_at' => '2023-09-14 07:10:46',
            ],
            [
                'id' => 4,
                'categoryName' => 'Consumer',
                'categoryDescription' => 'Consumer complain lodged',
                'creationDate' => '2023-09-12 06:26:48',
                'updationDate' => null,
                'created_at' => '2023-09-12 06:26:48',
                'updated_at' => '2023-09-12 06:26:48',
            ],
            [
                'id' => 5,
                'categoryName' => 'Bank',
                'categoryDescription' => 'Bank related user complaints',
                'creationDate' => '2023-09-12 06:27:36',
                'updationDate' => null,
                'created_at' => '2023-09-12 06:27:36',
                'updated_at' => '2023-09-12 06:27:36',
            ],
            [
                'id' => 6,
                'categoryName' => 'Labour',
                'categoryDescription' => 'Labour related user complaints',
                'creationDate' => '2023-09-12 06:33:43',
                'updationDate' => '2023-09-12 06:34:54',
                'created_at' => '2023-09-12 06:33:43',
                'updated_at' => '2023-09-12 06:34:54',
            ],
        ]);
    }
}
