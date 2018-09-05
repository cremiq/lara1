<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //doctors
        DB::table('users')->insert([
            'name' => 'Adam Konieczny',
            'email' => 'ak@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '223363636',
            'address' => 'Piękna 1',
            'status' => 'Active',
            'pesel' => '223363636',
            'type' => 'doctor'
        ]);

        DB::table('users')->insert([
            'name' => 'Jan Nowak',
            'email' => 'nowak@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '223363636',
            'address' => 'Piękna 2',
            'status' => 'Active',
            'pesel' => '223363636',
            'type' => 'doctor'
        ]);

        DB::table('users')->insert([
            'name' => 'Janusz Kowalski',
            'email' => 'kowalski@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '223363636',
            'address' => 'Piękna 3',
            'status' => 'Active',
            'pesel' => '223363636',
            'type' => 'doctor'
        ]);

        //patients
        DB::table('users')->insert([
            'name' => 'Alicja Bąk',
            'email' => 'bak@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '223363636',
            'address' => 'Piękna 1',
            'status' => 'Active',
            'pesel' => '223363636',
            'type' => 'patient'
        ]);

        DB::table('users')->insert([
            'name' => 'Monika Cicha',
            'email' => 'cicha@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '223363636',
            'address' => 'Piękna 1',
            'status' => 'Active',
            'pesel' => '223363636',
            'type' => 'patient'
        ]);

        // specializations
        DB::table('specializations')->insert([
            'name' => 'chirurg'
        ]);

        DB::table('specializations')->insert([
            'name' => 'internista'
        ]);

        DB::table('specializations')->insert([
            'name' => 'neurolog'
        ]);
    }
}
