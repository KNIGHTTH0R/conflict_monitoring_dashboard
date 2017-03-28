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
        factory(App\Category::class,20)->create();
        factory(App\Facebook_page::class,20)->create();
        factory(App\Website::class,20)->create();
        factory(App\User::class,20)->create();
        factory(App\Monitor::class,20)->create();
    }
}
