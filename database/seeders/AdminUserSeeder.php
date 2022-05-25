<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = \App\Models\User::create([
                    'first_name' => 'Cupid',
                    'last_name' => 'Knot',
                    'phone' => '1234567890',
                    'email' => 'admin@cupidknot.com',
                    'date_of_birth' => '1991-01-01',
                    'gender' => 'Male',
                    'annual_income' => 1000000,
                    'occupation' => NULL,
                    'famiy_type' => NULL,
                    'manglik' => NULL,
                    'is_admin' => 1,
                    'email_verified_at' => now(),
                    'password' => bcrypt('cupidknot@2022'), // password
                    'remember_token' => Str::random(10),
        ]);

        \App\Models\UserPreference::create([
            'user_id' => $user->id,
            'expected_annual_income_from' => 500000,
            'expected_annual_income_to' => 1000000,
            'occupation' => 'Government Job',
            'famiy_type' => 'Nuclear family',
            'manglik' => 'Both'
        ]);
    }

}
