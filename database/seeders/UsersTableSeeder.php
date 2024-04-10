<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            [
                'name' => 'Admin Fenris',
                'email' => 'fenris@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
                'phone' => '9823452512'
            ],
          
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customerone123'),
                'role' => 'customer',
                'status' => 'active',
                'phone' => '9823452512'

            ]
        ];

        DB::table('users')->insert($user_data);
    }
}
