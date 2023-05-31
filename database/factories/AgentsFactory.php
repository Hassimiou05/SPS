<?php

namespace Database\Factories;

use App\Models\Agents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agents>
 */
class AgentsFactory extends Factory
{
    protected $model = Agents::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'role' => $this->faker->randomElement(['Agents', 'Controlleur', 'Superviseur']),
            'date_naissance' => $this->faker->date(),
            'lieu_naissance' => $this->faker->address(),
            'lieu_residence' => $this->faker->address(),
            'tel' => $this->faker->randomNumber(5, true),
            'image' => $this->faker->fileExtension(),
            'poste' => $this->faker->word(),


        ];
    }
}
