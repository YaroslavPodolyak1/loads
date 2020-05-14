<?php

namespace App\Events;

use App\Queries\LoadIndexQuery;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class CreatedLoad implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $loads;

    public function __construct(Collection $loads)
    {
        $this->loads = tap(LoadIndexQuery::getLoadsInSchedule($loads));
    }

    public function broadcastOn()
    {
        return new Channel('load-channel');
    }

}
