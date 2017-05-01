<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('Claws\Post')->create([
            'name' => 'Some Page',
            'slug' => uniqid(),
            'type' => 'page',
            'user_id' => 1
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
