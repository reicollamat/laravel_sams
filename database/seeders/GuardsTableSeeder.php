<?php

namespace Database\Seeders;

use App\Models\Guard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guard::factory()->create([
            'first_name' => 'Jonathan',
            'middle_name' => 'Marcos',
            'last_name' => 'Emi',
            'birthdate' => now(),
            'sex' => 'M',
            'address' => 'quezon city',
            'nbi_clearance_id' => '1293-05834',
            'phone_number' => '09472118385',
            'educational_attainment' => 1,
            'lesp_id' => '124-343323-22',
            'sss' => '32434-2322',
            'agency_affiliation_date' => now(),
            'nbi_issued_date' => now(),
        ]);
    }
}
