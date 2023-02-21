<?php

namespace Database\Seeders;

use App\Models\Firearm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FirearmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 3 default firearms for development
        Firearm::factory()->create([
            'kind' =>'Shotgun',
            'caliber' =>' 5.5 mm',
            'fas_SN' =>'12345-678910',
            'validity_fas_license' => now(),
        ]);
        Firearm::factory()->create([
            'kind' =>'Pisol',
            'caliber' =>'9 mm',
            'fas_SN' =>'12345-6789',
            'validity_fas_license' => now(),
        ]);
        Firearm::factory()->create([
            'kind' =>'Shotgun',
            'caliber' =>'5 cm',
            'fas_SN' =>'109876-54321',
            'validity_fas_license' => now(),
        ]);
    }
}
