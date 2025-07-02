<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'nome' => 'EcoFuture SRL',
            'p_iva' => '01234567890',
            'settore' => 'IT',
            'dimensione' => 'piccola',
            'paese' => 'IT',
        ]);
    }
}
