<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('katas')->insert([
            'name' => "hilal bouti",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'status' => 'admin',
        ]);
        echo "Seeder executed successfully!\n";
        // $kata = [
            
        // ]
    }
}
