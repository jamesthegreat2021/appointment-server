<?php

namespace Database\Factories;

use App\Models\Midwife;
use Illuminate\Database\Eloquent\Factories\Factory;

class MidwifeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Midwife::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'qualifications'=>$this->faker->randomElement($array = array ('junior','senior','unemployed')),
            'working_status'=> $this->faker->randomElement($array = array('full_time','part_time','unemployed')),
            'user_id' => $this->faker ->randomDigitNotZero(),
        ];
    }
}
