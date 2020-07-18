<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\User;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $type;
    public $data;
    public $users;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$users,$message,$type)
    {
        $this->type       = $type ;
        $this->data       = $message;
        $this->users      = $users;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channel = [];
        foreach ($this->users as $user) {
            array_push($channel, new PrivateChannel('notification.'.$user));
        }
      return $channel;
    }

    public function broadcastAs() {
        return 'notify-event';
    }
}
