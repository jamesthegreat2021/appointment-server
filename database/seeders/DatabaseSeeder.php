<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\midwife;
use App\Models\Mother;
use App\Models\User as ModelsUser;
use App\Models\Payment;
use Illuminate\Database\Seeder;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Appointment::factory(10)->create();
        Midwife::factory(10)->create();
        Mother::factory(10)->create();
        Payment::factory(10)->create();
        ModelsUser::factory(10)->create();
        
    }
}
