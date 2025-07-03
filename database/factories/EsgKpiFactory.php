<?php

namespace Database\Factories;

use App\Models\EsgKpi;
use Illuminate\Database\Eloquent\Factories\Factory;

class EsgKpiFactory extends Factory
{
    protected $model = EsgKpi::class;          // opzionale in Laravel 10+

    public function definition(): array
    {
        // faker()->numberBetween(1,4) → Q1,Q2,Q3,Q4
        $quarter = 'Q' . $this->faker->numberBetween(1, 4);

        return [
            'company_id'      => 1,                        // oppure ->randomDigitNotNull()
            'kpi_nome'        => $this->faker->randomElement(['emissioni_co2','energia_kwh']),
            'valore'          => $this->faker->randomFloat(2, 1, 5000),
            'unita_misura'    => $this->faker->randomElement(['t','kWh']),
            'categoria'       => $this->faker->randomElement(['climate','energy']),
            'periodo'         => now()->format('Y') . "-$quarter",
        ];
    }
}
