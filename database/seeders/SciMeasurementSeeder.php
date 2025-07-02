<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SciMeasurement;

class SciMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SciMeasurement::create([
            'company_id' => 1,
            'software_nome' => 'SustainaCalc',
            'energia_kwh' => 12.5,
            'carbon_intensity' => 105.3,
            'network_data_mb' => 50,
            'hardware_type' => 'ARM',
            'location' => 'AWS eu-west-1',
            'periodo' => 'Q2 2025',
        ]);
    }
}
