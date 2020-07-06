<?php

use \Faker\Generator;

/* @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Vanthao03596\LaravelSubscriptions\Models\Plan::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'currency' => 'VND',
    ];
});

$factory->define(\Vanthao03596\LaravelSubscriptions\Models\PlanFeature::class, function (Generator $faker) {
    return [
        'plan_id' => factory(\Vanthao03596\LaravelSubscriptions\Models\Plan::class)->create()->id,
        'name' => $faker->name,
        'value' => $faker->name,
    ];
});
