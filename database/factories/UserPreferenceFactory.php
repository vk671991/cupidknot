<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserPreference;

class UserPreferenceFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = UserPreference::class;

    public function definition() {

        $countoccupation = rand(1, 3);
        $countfamilytype = rand(1, 2);
        $finaloccupation = [];
        $finalfamilytype = [];
        $prefered_famiy_type = '';
        $prefered_occupation = '';
        for ($i = 1; $i <= $countoccupation; $i++) {
            $finaloccupation = $this->getUniqueOccupationValue($finaloccupation);
        }

        if ($countfamilytype == 1) {
            array_push($finalfamilytype, $this->faker->randomElement(['Joint family', 'Nuclear family']));
        } else {
            $finalfamilytype = ['Joint family', 'Nuclear family'];
        }

        if (is_array($finaloccupation) && count($finaloccupation) > 1) {
            $prefered_occupation = implode(',', $finaloccupation);
        } else {
            $prefered_occupation = trim(implode(' ', $finaloccupation));
        }
        if (is_array($finalfamilytype) && count($finalfamilytype) > 1) {
            $prefered_famiy_type = implode(',', $finalfamilytype);
        } else {
            $prefered_famiy_type = trim(implode(' ', $finalfamilytype));
        }

        $fromIncome = $this->faker->numberBetween(100000, 1000000);

        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'expected_annual_income_from' => $fromIncome,
            'expected_annual_income_to' => $this->faker->numberBetween($fromIncome, 1000000),
            'occupation' => $prefered_occupation,
            'famiy_type' => $prefered_famiy_type,
            'manglik' => $this->faker->randomElement(['Yes', 'No', 'Both'])
        ];
    }

    public function getUniqueOccupationValue($array) {
        $getOne = $this->faker->randomElement(['Private Job', 'Government Job', 'Business']);
        if (in_array($getOne, $array)) {
            $this->getUniqueOccupationValue($array);
        } else {
            array_push($array, $getOne);
        }
        return $array;
    }

}
