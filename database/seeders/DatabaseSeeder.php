<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\SciMeasurementSeeder;
use Database\Seeders\EsgKpiSeeder;
use Database\Seeders\KpiDemoSeeder;
// use Database\Seeders\DefaultUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(CompanySeeder::class);
        $this->call(SciMeasurementSeeder::class);
        $this->call(EsgKpiSeeder::class);
        $this->call(KpiDemoSeeder::class);
        // $this->call(DefaultUserSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
