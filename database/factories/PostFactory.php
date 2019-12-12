<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;


$factory->define(Post::class, function (Faker $faker) {
    return [
        //Genereate fake data for the post table.
        'title' => $faker->catchPhrase,
        'body'=> $faker->text,
        'user_id' => App\User::inrandomOrder()->first()->id,
        
    ];
});
