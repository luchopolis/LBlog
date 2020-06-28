<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(post::class, function (Faker $faker) {

    $title = $faker->sentence(6);

    return [
        "user_id" => 1,
        "category_id" => rand(1,30),
        "title" => $title,
        "extract" => $faker->text(20),
        "Content" => $faker->text(100),
        "Imagen" => $faker->image('/tmp',$width = 200,$height= 200),
        "slug" => Str::slug($title,'-')

    ];
});
