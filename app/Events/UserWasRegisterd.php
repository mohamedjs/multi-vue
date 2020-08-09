<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserWasRegisterd
{
    use Dispatchable, SerializesModels;

    public $user, $token, $feedback;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user     = $user;
        $this->token    = $token;
        $this->feedback = "Your Email Send Successfully";
    }
}
