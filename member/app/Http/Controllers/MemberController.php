<?php

namespace App\Http\Controllers;

use App\RoomMember;

class MemberController extends Controller
{
    public function check($room, $member)
    {
        $member = RoomMember::where([
            'room_id' => $room,
            'user_id' => $member,
        ])->first();

        return $member;
    }

    public function join($room, $user)
    {
        $member = new RoomMember();
        $member->user_id = $user;
        $member->room_id = $room;
        $member->save();
        return $member;
    }

    public function users($room)
    {
        $members = RoomMember::where('room_id', $room)->get();
        return $members;
    }

    public function delete($room, $member)
    {
        $members = RoomMember::where([
            'room_id' => $room,
            'user_id' => $member,
        ])->get();

        foreach ($members as $member) {
            $member->delete();
        }
    }
}
