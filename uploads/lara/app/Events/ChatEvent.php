<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Chat;
use App\Models\Demand;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $auth_id;
    public $data;
    public $users;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message_id,$request_id,$users)
    {
        $this->auth_id    = Demand::whereId($request_id)->first()->admin_id;
        $this->data       = Chat::whereId($message_id)->with(['user','demand'])->first();
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
          array_push($channel, new PrivateChannel('chat.'.$user));
      }
      return $channel;
    }

    public function broadcastAs() {
        return 'chat-event';
    }
}
