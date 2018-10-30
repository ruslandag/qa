<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5,10)),"."),
        'body' => $faker->sentences(rand(3,6), true),
        'views' => rand(0,10),
        'answers' => rand(0,10),
        'votes' => rand(-3,10),
        
    ];
});
