<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        foreach (range(1,15) as $index){
            DB::table('users')->insert([
                'name' => Str::random(10),
                'birth-place' => Str::random(10),
                'birth-date' => '2000-12-12',
                'email' => Str::random(8) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }
        
    }
}