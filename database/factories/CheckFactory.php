<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Check;
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

$factory->define(Check::class, function (Faker $faker) {
    return [
        'url_id' => $faker->numberBetween($min = 1, $max = 10) ,
        'response_status' => 200,
        "response_time" => 5  
    ];
});
