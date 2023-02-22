<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 3 default user for development
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$.cXui1Zs9auOhefgociwBu14poQHUbM6GawWj60ABoaYSPAevH/eS',
            'is_admin'=> 1,
            'last_name'=>'collamat',
            'phone_number'=> '123',
            'organization_address'=>'address',
            'organization_name'=>'orgname',
            'sex'=>'M',
            'position'=>'president'
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$.cXui1Zs9auOhefgociwBu14poQHUbM6GawWj60ABoaYSPAevH/eS',
            'is_admin'=> 0,
            'last_name'=>'billones',
            'phone_number'=> '321',
            'organization_address'=>'address',
            'organization_name'=>'orgname',
            'sex'=>'M',
            'position'=>'superpresident'
        ]);
        User::factory()->create([
            'name' => 'mai',
            'email' => 'mai@gmail.com',
            'password' => '$2y$10$.cXui1Zs9auOhefgociwBu14poQHUbM6GawWj60ABoaYSPAevH/eS',
            'is_admin'=> 0,
            'last_name'=>'billones',
            'phone_number'=> '09472118385',
            'organization_address'=>'address',
            'organization_name'=>'orgname',
            'sex'=>'F',
            'position'=>'HR'
        ]);
    }
}
