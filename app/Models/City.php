<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    public $timestamps = false;
    public $translatable = ['name'];
    public $casts = ['name' => Json::class];
    protected $table = 'cities';
}
