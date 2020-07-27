<?php

namespace App\Message;

use App\Message\Contracts\Message;

class TwilloService implements Message
{
    public function send()
    {
        dd('Twillo');
    }
}