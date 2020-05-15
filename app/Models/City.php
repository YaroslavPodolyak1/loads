<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    public $timestamps = false;
    public $translatable = ['name'];
    protected $table = 'cities';

    public function dispatchedLoads()
    {
        return $this->hasMany(Load::class, 'city_from_id', 'id');
    }

    public function scopeDispatchedLoadsScope($query, $slug)
    {
        return $query->where('slug', $slug)->with([
            'dispatchedLoads' => function ($query) {
            $query->with(['dispatchCity', 'receivingCity']);
            },
        ])->first();
    }
}
