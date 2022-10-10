<?php


use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(15,40)),
        'is_done' => $faker->boolean(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
