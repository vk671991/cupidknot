<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPrefrenceSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Models\UserPreference::factory()->count(50)->create();
    }

}
