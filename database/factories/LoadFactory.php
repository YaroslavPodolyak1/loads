<?php

use App\Models\City;
use App\Models\Load;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

$factory->define(Load::class, function (Faker $faker) {
    $imageUrl = imageUrl(400, 200);
    $filePath = saveImage($imageUrl);

    $uaLocaleFaker = \Faker\Factory::create('uk_UA');

    return [
        'city_from_id' => City::all()->random(1)->first()->id,
        'city_to_id' => City::all()->random(1)->first()->id,
        'name' => ['en' => $faker->sentence, 'uk' => $uaLocaleFaker->company],
        'volume' => $faker->randomDigit . 'т',
        'photo' => $filePath ? Storage::url($filePath) : '',
    ];
});
