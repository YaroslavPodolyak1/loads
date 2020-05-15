<?php

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitiesSeeder extends Seeder
{
    private $cities = [
        [
            'name' => 'Краматорськ',
            'lat' => '48.7388106',
            'lng' => '37.5846923',
        ],
        [
            'name' => 'Київ',
            'lat' => '50.4500336',
            'lng' => '30.5241361',
        ],
        [
            'name' => 'Вінниця',
            'lat' => '49.2320162',
            'lng' => '28.467975',
        ],
    ];

    public function run(): void
    {
        (new City)->forceDelete();

        foreach ($this->cities as $city) {
            City::create([
                'slug' => Str::lower(Str::slug($city['name'])),
                'name' => [
                    'en' => Str::slug($city['name']),
                    'uk' => $city['name'],
                ],
                'lat' => $city['lat'],
                'lng' => $city['lng'],
            ]);
        }
    }

}
