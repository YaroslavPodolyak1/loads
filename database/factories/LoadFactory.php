<?php

use App\Models\City;
use App\Models\Load;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

$factory->define(Load::class, function (Faker $faker) {
    $filePath = saveImage(public_path('img/fake_img.jpg'));

    $uaLocaleFaker = \Faker\Factory::create('uk_UA');

    return [
        'city_from_id' => City::all()->random(1)->first()->id,
        'city_to_id' => City::all()->random(1)->first()->id,
        'name' => ['en' => $faker->sentence, 'uk' => $uaLocaleFaker->company],
        'volume' => $faker->randomDigit,
        'photo' => $filePath ? Storage::url($filePath) : '',
    ];
});

function saveImage(string $imageUrl, string $disk = 'public'): ?string
{
    $contents = file_get_contents($imageUrl);
    $name = substr($imageUrl, strrpos($imageUrl, '?') + 1);

    return Storage::disk($disk)->put('loads/' . md5($name) . '.jpg', $contents) ? 'loads/' . md5($name) . '.jpg' : null;
}

