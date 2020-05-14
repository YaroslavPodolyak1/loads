<?php

namespace App\Console\Commands;

use App\Events\CreatedLoad;
use App\Models\Load;
use Illuminate\Console\Command;

class CreateLoadCommand extends Command
{

    protected $signature = 'create:load {count}';

    protected $description = 'Create a new load, the required argument count is responsible for the number of traffic created';

    public function handle()
    {
        $createLoadCount = (int) $this->argument('count');
        $loads = factory(Load::class, $createLoadCount)->create();
        CreatedLoad::dispatch($loads->pluck(['id']));

        $this->info("Created {$createLoadCount} load");
    }
}
