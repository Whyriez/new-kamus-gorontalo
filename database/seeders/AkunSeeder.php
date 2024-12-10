<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => "hilal bouti",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ],
            [
                'name' => "tes editor",
                'email' => 'editor@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'editor',
            ],
            [
                'name' => "editor jj",
                'email' => 'editor2@gmail.com',
                'password' => Hash::make('123'),
            ],
            
        ];
        echo "Seeder executed successfully!\n";

        foreach ($users as $key => $value) {
            DB::table('users')->insert($value);
        }
    }
}
