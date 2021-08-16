<?php

namespace Database\Factories;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => Carbon::now(),
            'time' => Carbon::now(),
            'payment_status'=> $this->faker->randomElement($array = array('paid','not_paid','cancelled')),
            'appointment_id'=> $this->faker->randomDigitNotZero(),
            //
        ];
    }
}
