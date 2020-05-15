<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoadsResource;
use App\Models\City;
use App\Models\Load;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoadsController extends Controller
{
    public function index(): View
    {
        return view('loads.index', [
            'loads' =>
                LoadsResource::collection(
                    Load::with(['dispatchCity', 'receivingCity'])->get()
                )->toJson(),
        ]);
    }

    public function dispatchCityLoads(Request $request):View
    {
        return view('loads.index', [
            'loads' =>
                LoadsResource::collection(
                    City::dispatchedLoadsScope($request->city)->dispatchedLoads
                )->toJson(),
        ]);
    }
}
