<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pojazd>
 */
class PojazdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nr_pojazdu' => Str::random(3).$this->faker->numberBetween(10000,99999),
            'marka' => $this->faker->word(),
            'model' => $this->faker->word(),
            'wersja' => $this->faker->numberBetween(1, 10),
            'przebieg' => $this->faker->numberBetween(1000, 600000),
            'stan' => 'sprawny',
            'paliwo' => $this->faker->numberBetween(1,10),
            'id_wyp' => $this->faker->numberBetween(1,30),
            'data_wypozyczenia' => $this->faker->dateTimeBetween('-8 week'),
            'data_zwrotu' => $this->faker->dateTimeBetween('-7 week', '+3 week')
        ];
    }
}
