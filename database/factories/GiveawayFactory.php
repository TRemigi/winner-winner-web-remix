<?php

namespace Database\Factories;

use App\Models\Giveaway;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiveawayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Giveaway::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
