<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
           DB::table('users')->insert([
            'name' => 'Kostas',
            'surname' => 'Foititis',
            'email' => 'foit'.'@ceid.upatras.gr',
            'role' => 'student',
            'password' => Hash::make('kodikos'),
        ]);

            DB::table('users')->insert([
            'name' => 'Giorgos',
            'surname' => 'Papadopoulos',
            'email' => 'papad'.'@ceid.upatras.gr',
            'role' => 'prof',
            'password' => Hash::make('kodikos'),
        ]);

        DB::table('lessons')->insert([
            'name' => 'Τεχνολογία Λογισμικού',
            'description' => 'ΠεριγραφήΠεριγραφήΠεριγραφήΠεριγραφήΠεριγραφήΠεριγραφήΠεριγραφή',
            'periodos' => 'εαρινό',
            'eksamino' => '8o εξάμηνο',
            'user_id' => 2,
        ]);
    }
}
