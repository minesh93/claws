<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('\Claws\Setting',1)->create([
    	    'theme' => 'lion',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
