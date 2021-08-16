<?php

namespace Database\Factories;

use App\Models\Mother;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mother::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->randomDigitNotZero(),
            'date_of_birth'=> $this->faker->date( $format = 'Y-m-d',$max = 'now'),
            'gravida'=> $this->faker->randomDigitNotZero()
        ];
    }
}
