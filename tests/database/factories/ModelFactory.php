<?php

use \Faker\Generator;
use Vanthao03596\LaravelSubscriptions\Models\Plan;
use Vanthao03596\LaravelSubscriptions\Models\PlanFeature;
use Vanthao03596\LaravelSubscriptions\Models\PlanSubscription;
use Vanthao03596\LaravelSubscriptions\Tests\User;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (Generator $faker) {
    return [
        'email' => $faker->email,
    ];
});


$factory->define(Plan::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'currency' => 'VND',
    ];
});

$factory->define(PlanFeature::class, function (Generator $faker) {
    return [
        'plan_id' => factory(Plan::class)->create()->id,
        'name' => $faker->name,
        'value' => $faker->name,
    ];
});


$factory->define(PlanSubscription::class, function (Generator $faker) {
    $user = factory(User::class)->create();

    return [
        'plan_id' => factory(Plan::class)->create()->id,
        'name' => $faker->name,
        'user_type' => get_class($user),
        'user_id' => $user->id,
    ];
});
