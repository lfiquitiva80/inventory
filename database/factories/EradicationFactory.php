<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Disease;
use App\Models\Eradication;
use App\Models\Farm;
use App\Models\Inventory;
use App\Models\Lot;
use App\Models\Official;
use App\Models\Type;
use App\Models\User;

class EradicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eradication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'farm_id' => Farm::factory(),
            'lot_id' => Lot::factory(),
            'columna' => $this->faker->numberBetween(0, 10000),
            'fila' => $this->faker->numberBetween(0, 10000),
            'disease_id' => Disease::factory(),
            'type_id' => Type::factory(),
            'official_id' => Official::factory(),
            'fecha_erradicacion' => $this->faker->dateTime(),
            'user_id' => User::factory(),
            'observaciones' => $this->faker->text,
            'inventory_id' => Inventory::factory(),
        ];
    }
}
