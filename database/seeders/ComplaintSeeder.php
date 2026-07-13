<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('complaints')->insert([
            [
                'complaintNumber' => 1,
                'userId' => 3,
                'category' => 1,
                'subcategory' => 'Online Shopping',
                'complaintType' => ' Complaint',
                'state' => 'Punjab',
                'noc' => 'Complain against Shopping website',
                'complaintDetails' => 'company name xyz has not return my money after returning the item.',
                'complaintFile' => '',
                'regDate' => '2023-09-15 12:33:14',
                'status' => null,
                'lastUpdationDate' => '2023-09-15 12:56:52',
                'created_at' => '2023-09-15 12:33:14',
                'updated_at' => '2023-09-15 12:56:52',
            ],
            [
                'complaintNumber' => 2,
                'userId' => 4,
                'category' => 1,
                'subcategory' => 'E-wllaet',
                'complaintType' => 'General Query',
                'state' => 'Punjab',
                'noc' => 'htrdy',
                'complaintDetails' => 'dytuj',
                'complaintFile' => '7db575b77409a4ad74cb9620814085e8.jpg',
                'regDate' => '2023-09-15 12:41:41',
                'status' => null,
                'lastUpdationDate' => null,
                'created_at' => '2023-09-15 12:41:41',
                'updated_at' => '2023-09-15 12:41:41',
            ],
            [
                'complaintNumber' => 3,
                'userId' => 1,
                'category' => 1,
                'subcategory' => 'E-wllaet',
                'complaintType' => 'General Query',
                'state' => 'Punjab',
                'noc' => 'htrdy',
                'complaintDetails' => 'dytuj',
                'complaintFile' => '7db575b77409a4ad74cb9620814085e8.jpg',
                'regDate' => '2023-09-15 12:45:26',
                'status' => 'closed',
                'lastUpdationDate' => '2023-09-15 13:06:31',
                'created_at' => '2023-09-15 12:45:26',
                'updated_at' => '2023-09-15 13:06:31',
            ],
            [
                'complaintNumber' => 4,
                'userId' => 5,
                'category' => 1,
                'subcategory' => 'Online Shopping',
                'complaintType' => ' Complaint',
                'state' => 'Delhi',
                'noc' => 'Complain against Shopping website',
                'complaintDetails' => 'This is for testing.',
                'complaintFile' => '2c86e2aa7eb4cb4db70379e28fab9b52.pdf',
                'regDate' => '2023-09-26 01:28:17',
                'status' => null,
                'lastUpdationDate' => null,
                'created_at' => '2023-09-26 01:28:17',
                'updated_at' => '2023-09-26 01:28:17',
            ],
            [
                'complaintNumber' => 5,
                'userId' => 6,
                'category' => 1,
                'subcategory' => 'Online Shopping',
                'complaintType' => 'General Query',
                'state' => 'Punjab',
                'noc' => 'Test nature',
                'complaintDetails' => 'This is for testing',
                'complaintFile' => '858828b8b12d041fde07b353a94db5ed.png',
                'regDate' => '2023-10-01 04:12:07',
                'status' => 'closed',
                'lastUpdationDate' => '2023-10-01 04:13:12',
                'created_at' => '2023-10-01 04:12:07',
                'updated_at' => '2023-10-01 04:13:12',
            ],
        ]);
    }
}
