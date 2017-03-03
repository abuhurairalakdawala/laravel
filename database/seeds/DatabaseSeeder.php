<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'firstname' => str_random(10),
            'lastname' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'username' => str_random(10),
            'password' => bcrypt('secret'),
        ]);
    }
}
