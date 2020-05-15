<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Load extends Model
{
    use HasTranslations;

    public $timestamps = false;
    public $translatable = ['name'];

    public function dispatchCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_from_id');
    }

    public function receivingCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_to_id');
    }
}
