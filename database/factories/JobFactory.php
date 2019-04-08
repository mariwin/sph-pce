<?php

use App\Jobs;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\Jobs::class, function (Faker $faker) {
    return [
      'slug' => ucfirst($faker->word),
      'title' => $faker->randomElement($array = ['Manager 1', 'Manager 2', 'Manager 3', 'Executive 1', 'Executive 2', 'Executive 3' ]),
    ];
  });