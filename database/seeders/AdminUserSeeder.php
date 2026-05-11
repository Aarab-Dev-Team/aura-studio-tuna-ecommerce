<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User ; 

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Oussama"  , 
            "email"=>"saidi.oussama2004@gmail.com" , 
            "password"=>"oussama123" , 
            "role"=> "admin", 
        ]); 
    }
}
