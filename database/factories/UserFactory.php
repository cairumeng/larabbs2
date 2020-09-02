<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    $avatars = [
        'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
        'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
        'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
        'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
        'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
        'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',

    ];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$7oQVfg5BPgtvTTZ79TxxG.jNgHR4ZHt1KNFebVrbMjoSXN7d1ChLi', // password
        'remember_token' => Str::random(10),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
        'avatar' => $faker->randomElement($avatars),
        'introduction' => $faker->sentence()
    ];
});
