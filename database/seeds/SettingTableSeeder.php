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
    	DB::table('settings')->insert([
    		['key' => 'theme', 'value' => 'lion'],
    		['key' => 'use_custom_home', 'value' => '0'],
    		['key' => 'custom_home_id', 'value' => '0'],
    		['key' => 'site_name', 'value' => 'Claws']
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
