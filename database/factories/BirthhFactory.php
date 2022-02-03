<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BirthhFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'username' => $this->faker->text(30) ,
            'Birthday' =>$this->faker->date,
        ];
    }
}
