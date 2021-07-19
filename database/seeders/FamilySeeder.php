<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->insert([
            [
                'name' => 'family1',
                'email' => 'family1@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2021/07/14 11:11:11'
            ],
            [
                'name' => 'family2',
                'email' => 'family2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2021/07/14 11:11:11'
            ],
            [
                'name' => 'family3',
                'email' => 'family3@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2021/07/14 11:11:11'
            ],
        ]);
    }
}
