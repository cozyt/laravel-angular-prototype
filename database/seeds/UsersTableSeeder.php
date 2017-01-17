<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'test@activeticketing.com',
            'email'     => 'test@activeticketing.com',
            'password'  => bcrypt('secret'),
            'api_token' => str_random(60),
        ]);
    }
}
