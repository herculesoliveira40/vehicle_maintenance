<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome_veiculo' => $this->faker->stateAbbr(),
            'ano' => $this->faker->year(),
            'cor' => $this->faker->safeColorName(),
            'img' => 'https://quatrorodas.abril.com.br/wp-content/uploads/2019/08/5cc90dfa-2020-honda-civic-si-coupe-1-e1566495104657.jpg',
            'placa' => $this->faker->hexColor(),
            'marca_id' => rand(1,3),
            'modelo_id' => rand(1,3),
            'versao_id' => rand(1,3),
            'user_id' => rand(1,3),
        ];
    }
}
