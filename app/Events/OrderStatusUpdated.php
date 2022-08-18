<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data = 'ini data';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('orders');
    }
    /**
     *Specifies the broadcast data.
     *
     * @return array
     */
    public function broadcastWith()
    {
        //Return to current time
        return ['data' => [Carbon::now()->toDateTimeString(), 'nama' => 'andi' ]];
    }

    public function broadcastAs()
    {
        return 'newOrder';
    }
}
