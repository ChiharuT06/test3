<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $seat_id;

    public function __construct($id,$seat_id)
    {
        $this->id = $id;
        $this->seat_id = $seat_id;
    }

    public function broadcastOn()
    {
        return ['my-channel2'];
    }

    public function broadcastAs()
    {
        return 'my-event2';
    }
}