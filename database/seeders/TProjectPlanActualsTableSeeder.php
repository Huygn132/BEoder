<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TProjectPlanActualsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            $staffType = $faker->boolean ? 0 : 1; // Randomly pick a staff type

            DB::table('t_project_plan_actuals')->insert([
                'project_id' => $faker->numberBetween(1, 100),
                'staff_id' => $faker->numberBetween(1, 100),
                'this_year_04_plan' => $faker->numberBetween(10, 50),
                'this_year_04_actual' => $faker->numberBetween(10, 50),
                'this_year_05_plan' => $faker->numberBetween(10, 50),
                'this_year_05_actual' => $faker->numberBetween(10, 50),
                'this_year_06_plan' => $faker->numberBetween(10, 50),
                'this_year_06_actual' => $faker->numberBetween(10, 50),
                'this_year_07_plan' => $faker->numberBetween(10, 50),
                'this_year_07_actual' => $faker->numberBetween(10, 50),
                'this_year_08_plan' => $faker->numberBetween(10, 50),
                'this_year_08_actual' => $faker->numberBetween(10, 50),
                'this_year_09_plan' => $faker->numberBetween(10, 50),
                'this_year_09_actual' => $faker->numberBetween(10, 50),
                'this_year_10_plan' => $faker->numberBetween(10, 50),
                'this_year_10_actual' => $faker->numberBetween(10, 50),
                'this_year_11_plan' => $faker->numberBetween(10, 50),
                'this_year_11_actual' => $faker->numberBetween(10, 50),
                'this_year_12_plan' => $faker->numberBetween(10, 50),
                'this_year_12_actual' => $faker->numberBetween(10, 50),
                'next_year_01_plan' => $faker->numberBetween(10, 50),
                'next_year_01_actual' => $faker->numberBetween(10, 50),
                'next_year_02_plan' => $faker->numberBetween(10, 50),
                'next_year_02_actual' => $faker->numberBetween(10, 50),
                'next_year_03_plan' => $faker->numberBetween(10, 50),
                'next_year_03_actual' => $faker->numberBetween(10, 50),
                'del_flg' => $faker->boolean ? 0 : 1,
                'created_user' => $faker->numberBetween(1, 100), // Assuming this is the user_id from m_users
                'created_datetime' => now(),
                'updated_user' => $faker->numberBetween(1, 100), // Assuming this is the user_id from m_users
                'updated_datetime' => now(),
            ]);
        }
    }
}
