<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //Generate fake data for the comment table.
        'body' => $faker->text,
        'user_id' => App\User::inrandomOrder()->first()->id,
        'post_id' => App\Post::inrandomOrder()->first()->id,
    ];
});
