<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'description'=>$faker->sentence,
        'created_by'=>factory(App\User::class),
        'updated_by'=>factory(App\User::class),
    ];
});
