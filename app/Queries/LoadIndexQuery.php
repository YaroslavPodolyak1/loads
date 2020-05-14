<?php

namespace App\Queries;

use App\Models\Load;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoadIndexQuery
{
    public $request;

    public function __construct(?Request $request)
    {
        $this->request = $request;
    }

    public function get(): Collection
    {
        return $this->query()->when($this->request->city, function (Builder $query, string $city) {
            $query->whereHas('dispatchCity', function ($query) use ($city) {
                $query->where('name->en', Str::slug($city));
            });
        })->get();
    }

    public static function getLoadsInSchedule(\Illuminate\Support\Collection $loadIds): Collection
    {
        return self::query()->whereIn('id', $loadIds)->get();
    }

    protected static function query(): Builder
    {
        return Load::query()->select('name->' . app()->getLocale() . ' as load_name', 'city_from_id', 'city_to_id', 'volume', 'photo')
            ->with([
                'dispatchCity' => function ($query) {
                    $query->select('id', 'name->' . app()->getLocale() . ' as dispatch_city_name', 'lat', 'lng');
                },
                'receivingCity' => function ($query) {
                    $query->select('id', 'name->' . app()->getLocale() . ' as receiving_city_name', 'lat', 'lng');
                },
            ]);
    }
}
