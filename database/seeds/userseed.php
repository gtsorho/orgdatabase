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
            "name" => 'admin',
            "email" => 'admin@lpwc',
            "password" =>  Hash::make('lpwc@123'),
         ]);
         User::create([
            "name" => 'superadmin',
            "email" => 'superadmin@lpwc',
            "password" =>  Hash::make('lpwc@admin123'),
            "role"=> 'admin',
         ]);
    }
}
