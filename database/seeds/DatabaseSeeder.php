<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seeding User Table
        $this->call(RolesTableSeeder::class);

        $this->call(UserTableSeeder::class);
        //Seeding Post Table
        $this->call(PostTableSeeder::class);

        //Seeding Comment Table
        $this->call(CommentTableSeeder::class);




    }
}
