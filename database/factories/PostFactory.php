<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        "category_id"   => $faker->numberBetween(1,10),
        'photo_id'      => 1,
        'title'         => $faker->sentence(7,10),
        'body'          => $faker->paragraphs(rand(10,15),true),
        'slug'          => $faker->slug(),
    ];
});
