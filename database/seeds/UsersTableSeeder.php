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
    	factory('Claws\User',1)->create([
    	    'email' => 'john@doe.com',
            'name' => 'John Doe',
            'password' => bcrypt('lolwhat'),
            'admin'=> true
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
