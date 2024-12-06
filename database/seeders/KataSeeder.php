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
            'name' => "hilalbouti",
            'email' => 'hilalbouti57@gmail.com',
            'password' => Hash::make('asdf'),
        ]);
        echo "Seeder executed successfully!\n";
    }
}
