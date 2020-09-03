<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {

    $user_ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $category_ids = [1, 2, 3, 4];
    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeThisMonth($created_at);
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text(),
        'user_id' => $faker->randomElement($user_ids),
        'category_id' => $faker->randomElement($category_ids),
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
