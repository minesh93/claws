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
        factory('App\Post')->create([
            'name' => 'Some Page',
            'slug' => uniqid(),
            'user_id' => 1
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
