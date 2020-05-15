<?php

namespace App\Events;

use App\Http\Resources\LoadsResource;
use App\Models\Load;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatedLoad implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $load;

    public function __construct(Load $load)
    {
        $this->load = LoadsResource::make(
            $load->load(['dispatchCity', 'receivingCity'])
        )->toJson();
    }

    public function broadcastOn()
    {
        return new Channel('load-channel');
    }
}
