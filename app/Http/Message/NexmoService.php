<?php

namespace App\Message;

use App\Message\Contracts\Message;

class NexmoService implements Message
{
    public function send()
    {
        dd('Nexmo');
    }
}