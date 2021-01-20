<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lot;

class LotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FINCACODI' => $this->faker->word,
            'LOTECODCC' => $this->faker->word,
            'LOTECODI' => $this->faker->word,
            'LOTENOMB' => $this->faker->word,
        ];
    }
}
