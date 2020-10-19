<?php

namespace App\Service;

use App\Traits\Call;

class Room
{
    use Call;
    public function basUrl()
    {
        return env('room_url') . '/api';
    }
    public function getRooms()
    {
        $response = $this->sendGet($this->basUrl() . '/room');
        return $response;
    }
    public function show($id)
    {
        $response = $this->sendGet($this->basUrl() . '/room/' . $id);
        return $response;
    }

}
