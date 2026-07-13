<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintRemarkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('complaint_remarks')->insert([
            [
                'id' => 1,
                'complaintNumber' => 3,
                'status' => 'in process',
                'remark' => 'your ticket forward to associated team',
                'remarkDate' => '2023-09-15 13:05:38',
                'created_at' => '2023-09-15 13:05:38',
                'updated_at' => '2023-09-15 13:05:38',
            ],
            [
                'id' => 2,
                'complaintNumber' => 3,
                'status' => 'closed',
                'remark' => 'Ticket close in favor of user',
                'remarkDate' => '2023-09-15 13:06:31',
                'created_at' => '2023-09-15 13:06:31',
                'updated_at' => '2023-09-15 13:06:31',
            ],
            [
                'id' => 3,
                'complaintNumber' => 5,
                'status' => 'in process',
                'remark' => 'We are reviewing the complaint',
                'remarkDate' => '2023-10-01 04:12:48',
                'created_at' => '2023-10-01 04:12:48',
                'updated_at' => '2023-10-01 04:12:48',
            ],
            [
                'id' => 4,
                'complaintNumber' => 5,
                'status' => 'closed',
                'remark' => 'Issue resolved',
                'remarkDate' => '2023-10-01 04:13:12',
                'created_at' => '2023-10-01 04:13:12',
                'updated_at' => '2023-10-01 04:13:12',
            ],
        ]);
    }
}
