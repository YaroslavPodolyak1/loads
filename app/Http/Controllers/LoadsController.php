<?php

namespace App\Http\Controllers;

use App\Queries\LoadIndexQuery;
use Illuminate\Http\Request;

class LoadsController extends Controller
{
    public function __invoke(Request $request)
    {
        $loads = (new LoadIndexQuery($request))->get();

        return view('loads.index', compact('loads'));
    }
}
