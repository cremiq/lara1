<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'doctor_id' => 2,
            'patient_id' => 5,
            'date' => date('Y-m-d')
        ]);

        DB::table('visits')->insert([
            'doctor_id' => 2,
            'patient_id' => 6,
            'date' => date('Y-m-d')
        ]);

        DB::table('visits')->insert([
            'doctor_id' => 3,
            'patient_id' => 8,
            'date' => date('Y-m-d')
        ]);

        DB::table('visits')->insert([
            'doctor_id' => 4,
            'patient_id' => 5,
            'date' => date('Y-m-d')
        ]);
    }
}
