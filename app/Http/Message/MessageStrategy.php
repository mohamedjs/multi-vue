<?php 

namespace App\Message;

use App\Message\Contracts\Message;

class MessageStrategy
{
    private $service;

    public function __construct(Message $service)
    {
        $this->service = $service;
    }

    public function send()
    {
        $this->service->send();
    }
}