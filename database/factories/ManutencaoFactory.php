<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manutencao>
 */
class ManutencaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'veiculo_id' => rand(1,3), 
            'ultima_manutencao' => now(),
            'proxima_manutencao' => now()->addDays(5),
            'status' => rand(0,1), 
        ];
    }
}
