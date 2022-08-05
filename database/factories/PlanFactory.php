<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanFacade>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'roi'=>$this->faker->numberBetween(10,1000),
            'minimum_investment'=>$this->faker->numberBetween(1,3500),
            'duration'=>$this->faker->numberBetween(1,4),
            'description'=>$this->faker->text,
        ];
    }
}
