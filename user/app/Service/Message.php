<?php

namespace App\Service;

use App\Traits\Call;

class Message
{
    use Call;
    public function __construct()
    {
        return $this->base_url = env('message_url') . '/api/message';
    }

    public function message($room)
    {
        $url = $this->base_url . '/rooms/' . $room;
        $url = str_replace(' ', '', $url);
        return $this->sendGet($url);
    }
    public function create($data)
    {
        $url = $this->base_url . "/create";
        $url = str_replace(' ', '', $url);
        return $this->sendPost($url, $data);
    }
}
