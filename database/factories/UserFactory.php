<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = User::class;

    public function definition() {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->date("Y-m-d"),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'annual_income' => $this->faker->numberBetween(100000, 1000000),
            'occupation' => $this->faker->randomElement(['Private Job', 'Government Job', 'Business']),
            'famiy_type' => $this->faker->randomElement(['Joint family', 'Nuclear family']),
            'manglik' => $this->faker->randomElement(['Yes', 'No']),
            'email_verified_at' => now(),
            'password' => bcrypt('cupidknot@2022'), // password
            'remember_token' => Str::random(10),
        ];
    }

}
