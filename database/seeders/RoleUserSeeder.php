<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleUser::create([
            'role_id' => 1,
            'user_id' => 1, 
        ]);
        
        RoleUser::create([
            'role_id' => 2,
            'user_id' => 2, 
        ]);
        
        RoleUser::create([
            'role_id' => 3,
            'user_id' => 3, 
        ]);
        
        RoleUser::create([
            'role_id' => 4,
            'user_id' => 4, 
        ]);
        
        RoleUser::create([
            'role_id' => 5,
            'user_id' => 5, 
        ]);
    }
}
