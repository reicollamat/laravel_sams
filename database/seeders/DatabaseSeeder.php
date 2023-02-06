<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create 2 default user for development
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$.cXui1Zs9auOhefgociwBu14poQHUbM6GawWj60ABoaYSPAevH/eS',
            'is_admin'=> 1,
            'first_name'=>'ray',
            'last_name'=>'collamat',
            'phone_number'=> 123,
            'organiztion_address'=>'address',
            'organiztion_name'=>'orgname',
            'sex'=>'M',
            'position'=>'president'
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$.cXui1Zs9auOhefgociwBu14poQHUbM6GawWj60ABoaYSPAevH/eS',
            'is_admin'=> 1,
            'first_name'=>'richmons',
            'last_name'=>'billones',
            'phone_number'=> 321,
            'organiztion_address'=>'address',
            'organiztion_name'=>'orgname',
            'sex'=>'M',
            'position'=>'superpresident'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
