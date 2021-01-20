<?php

use Illuminate\Database\Seeder;

use App\User;
class userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => 'geroge',
            "email" => 'sorho@yahoo.com',
            "password" =>  Hash::make('numlock11'),
         ]);
    }
}
