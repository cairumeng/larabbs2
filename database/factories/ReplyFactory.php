<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $createdAt = $faker->dateTimeThisMonth();
    return [
        'topic_id' => rand(1, 50),
        'user_id' => rand(1, 15),
        'content' => $faker->sentence(),
        'updated_at' => $faker->dateTimeThisMonth($createdAt),
        'created_at' => $createdAt
    ];
});
