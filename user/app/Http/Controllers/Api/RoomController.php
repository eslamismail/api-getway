<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\Member;
use App\Service\Message;
use App\Service\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = (new Room())->getRooms();
        return $rooms;
    }

    public function store(Request $request)
    {
        # code...
    }
    public function join($room)
    {

        $rooms = (new Room())->show($room);

        if (!isset($rooms['id'])) {
            return response()->json([
                'message' => "Room dosn't exist",
            ], 400);
        }

        $member = (new Member())->check($room, auth()->id());

        if (isset($member['id'])) {
            return response()->json([
                'message' => 'Sorry you already joined this room before',
            ], 400);
        }

        return $member = (new Member())->join($room, auth()->id());

    }

    public function show($id)
    {
        $rooms = (new Room())->show($id);
        if (!isset($rooms['id'])) {
            return response()->json([
                'message' => "Room dosn't exist",
            ], 400);
        }
        $messages = (new Message())->message($id);

        return response()->json(['data' => json_decode($messages)]);
    }
}
