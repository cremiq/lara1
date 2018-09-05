<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialization_users')->insert([
            'specialization_id' => 1,
            'user_id' => 2
        ]);

        DB::table('specialization_users')->insert([
            'specialization_id' => 1,
            'user_id' => 3
        ]);

        DB::table('specialization_users')->insert([
            'specialization_id' => 2,
            'user_id' => 2
        ]);

        DB::table('specialization_users')->insert([
            'specialization_id' => 3,
            'user_id' => 4
        ]);
        DB::table('specialization_users')->insert([
            'specialization_id' => 3,
            'user_id' => 7
        ]);
    }
}
