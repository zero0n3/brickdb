<?php

use App\Models\Inventory_x_user;
use App\User;
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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Inventory_list::class, function (Faker $faker) {
    return [
        'list_name' => $faker->word(),
        'inv_thumb' => $faker->imageUrl(120, 120, 'nature'),
        'user_id' => $faker->numberBetween(1,3)
    ];
});

$factory->define(App\Models\Moc_list::class, function (Faker $faker) {
    return [
        'moc_name' => $faker->word(),
        'user_id' => $faker->numberBetween(1,3)
    ];
});