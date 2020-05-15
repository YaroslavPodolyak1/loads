<?php

namespace App\Observers;

use App\Events\CreatedLoad;
use App\Models\Load;

class LoadObserver
{
    public function saving(Load $load): void
    {
        CreatedLoad::dispatch($load);
    }
}
