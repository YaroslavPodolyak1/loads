<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Load extends Model
{
    use HasTranslations;

    public $timestamps = false;
    public $translatable = ['name'];
    public $casts = ['name' => Json::class];

    public function dispatchCity(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_from_id');
    }

    public function receivingCity(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_to_id');
    }
}
