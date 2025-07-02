<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EsgKpi;

class EsgKpiSeeder extends Seeder
{
    public function run(): void
    {
        EsgKpi::create([
            'company_id'            => 1,
            'kpi_nome'              => 'emissioni_co2',
            'valore'                => 23.5,
            'unità_misura'          => 't',
            'categoria'             => 'climate',
            'riferimento_normativo' => 'CSRD',
            'periodo'               => 'Q2 2025',
        ]);
    }
}
