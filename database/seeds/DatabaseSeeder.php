<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'José Theodoro',
            'email' => 'jose.theodoro42@gmail.com',
            'password' => bcrypt('renato!11'),
        ]);
    }
}
