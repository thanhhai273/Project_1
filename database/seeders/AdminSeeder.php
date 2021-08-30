<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('thanhhai99'),
                'role' => 'admin',
                'page' => 'admin',
                'description' => 'admin page',
            ]
        ];

        User::insert($admin);
    }
}
