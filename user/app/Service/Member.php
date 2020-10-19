<?php

namespace App\Service;

use App\Traits\Call;

class Member
{
    use Call;
    public function __construct()
    {
        $this->base_url = env("member_url") . '/api/member';
    }

    public function check($room, $member)
    {

        $url = $this->base_url . '/' . $room . '/check/' . $member;
        $url = str_replace(' ', '', $url);
        return $this->sendGet($url);
    }

    public function join($room, $member)
    {
        $url = $this->base_url . "/" . $room . "/join/" . $member;
        $url = str_replace(' ', '', $url);
        return $this->sendGet($url);
    }

    public function users($room)
    {
        $url = $this->base_url . "/" . $room . '/users';
        $url = str_replace(' ', '', $url);
        return $this->sendGet($url);
    }
}
