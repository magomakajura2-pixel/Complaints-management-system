<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('states')->insert([
            [
                'id' => 3,
                'stateName' => 'Uttar Pradesh',
                'stateDescription' => 'Uttar Pradesh-UP',
                'postingDate' => '2016-10-18 11:35:02',
                'updationDate' => '2023-09-28 16:56:56',
                'created_at' => '2016-10-18 11:35:02',
                'updated_at' => '2023-09-28 16:56:56',
            ],
            [
                'id' => 4,
                'stateName' => 'Punjab',
                'stateDescription' => 'Punjab-PB',
                'postingDate' => '2016-10-18 11:35:58',
                'updationDate' => '2023-09-28 16:56:28',
                'created_at' => '2016-10-18 11:35:58',
                'updated_at' => '2023-09-28 16:56:28',
            ],
            [
                'id' => 5,
                'stateName' => 'Haryana',
                'stateDescription' => 'Haryana-HR',
                'postingDate' => '2017-03-28 07:20:36',
                'updationDate' => '2023-09-28 16:56:38',
                'created_at' => '2017-03-28 07:20:36',
                'updated_at' => '2023-09-28 16:56:38',
            ],
            [
                'id' => 6,
                'stateName' => 'Delhi',
                'stateDescription' => 'Delhi-DL',
                'postingDate' => '2017-06-11 10:54:12',
                'updationDate' => '2023-09-28 16:56:18',
                'created_at' => '2017-06-11 10:54:12',
                'updated_at' => '2023-09-28 16:56:18',
            ],
        ]);
    }
}
