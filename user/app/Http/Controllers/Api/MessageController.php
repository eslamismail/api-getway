<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Service\Member;
use App\Service\Message;
use App\Service\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'room_id' => 'required|integer',
        ]);

        $data = $request->only([
            'message',
            'room_id',
        ]);

        $data['user_id'] = auth()->id();

        $rooms = (new Room())->show($request->room_id);
        // check if room exists
        if (!isset($rooms['id'])) {
            return response()->json([
                'message' => "Room dosn't exist",
            ], 400);
        }

        //  check if member exists

        $member = (new Member())->check($request->room_id, auth()->id());

        if (!isset($member['id'])) {
            return response()->json([
                'message' => 'Please join this room before sending message here',
            ], 400);
        }
        $message = (new Message)->create($data);
        $this->broadcastToUsers($request->room_id, $message);
        return response()->json(['message' => 'message sent successfully']);
        // return $data;
    }

    public function broadcastToUsers($room, $message)
    {
        // get all users in this room

        $members = (new Member())->users($room);

        // return json_decode($members);
        foreach (json_decode($members) as $key => $member) {
            broadcast(new NewMessage($members[$key]['user_id'], json_decode($message)));
        }
    }

}
