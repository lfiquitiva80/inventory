<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Farm;
use App\Models\Inventory;
use App\Models\Lot;
use App\Models\Statu;
use App\Models\User;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

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
            'columna' => $this->faker->numberBetween(-10000, 10000),
            'fila' => $this->faker->numberBetween(-10000, 10000),
            'statu_id' => Statu::factory(),
            'user_id' => User::factory(),
        ];
    }
}
