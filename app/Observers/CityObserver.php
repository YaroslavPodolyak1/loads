<?php

namespace App\Observers;

use App\Models\City;
use Illuminate\Support\Str;

class CityObserver
{

    public function saving(City $city): void
    {
        if ($city->where('slug', $city->slug)->exists()) {
            $city->slug = Str::slug($city->slug . md5(time()));
        }
    }

}
