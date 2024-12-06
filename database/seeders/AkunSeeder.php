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
        DB::table('users')->insert([
            'name' => "hilalbouti",
            'email' => 'hilalbouti57@gmail.com',
            'password' => Hash::make('asdf'),
        ]);
        echo "Seeder executed successfully!\n";
    }
}
