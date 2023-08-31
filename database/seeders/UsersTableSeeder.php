<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data in table User

        DB::table('users')->insert([
            // Teacher
            [
                'idStudent' => '6352c10001',
                'fName' => 'นำโชค',
                'lName' => 'จันทะดวง',
                'email' => 's6352c10001@sau.ac.th',
                'password' => Hash::make('111'),
                'role' => 'teacher',
                'photo' => '202308150910318C08BF-C3B0-422C-94EC-28632742755B.jpg',
                'status' => 'รอการอนุมัติ',
            ],
            // บริษัท
            [
                'idStudent' => '6352c10002',
                'fName' => 'บริษัท',
                'lName' => 'บริษัทบริษัท',
                'email' => 's6352c10002@sau.ac.th',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'photo' => '202308070939S__2408460.jpg',
                'status' => 'รอการอนุมัติ',
            ],
            // นักศึกษา
            [
                'idStudent' => '6352c10003',
                'fName' => 'นักศึกษา',
                'lName' => 'นักศึกษานักศึกษา',
                'email' => 's6352c10003@sau.ac.th',
                'password' => Hash::make('111'),
                'role' => 'student',
                'photo' => '202308070939S__2408460.jpg',
                'status' => 'รอการอนุมัติ',
            ],
        ]);
    }
}
