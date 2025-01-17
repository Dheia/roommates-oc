<?php

namespace Mates\Room\Http\Controllers;

use Backend\Classes\Controller;
use Mates\Room\Http\resources\MiniRoomResource;
use Mates\Room\Models\Miniroom;
use RainLab\User\Models\User;
use Mates\Room\Models\Room;
use Illuminate\Http\Request;
use Mates\Room\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function createRoom(Request $request) {
        $user = User::where('id', $request->get('tokenUserID'))->first();
        $postData = [
            'room_name' => post('room_name'),
            'room_owner_id' => $user->id,
        ];
        $room = new Room();
        $room->name = $postData['room_name'];
        $room->room_count = 0;
        $room->room_owner_id = $postData['room_owner_id'];
        $room->save();

        return new RoomResource($room);
    }

    public function createMiniRoom() {
        $postData = [
            'room_id' => post('room_id'),
            'izba_name' => post('izba_name'),
        ];
        $room = Room::where('id', $postData['room_id'])->first();

        if(!$room) {
            return response()->json([
                'error' => 'Room not found'
            ], 404);
        }

        $room->room_count++;
        $room->save();

        $miniRoom = new Miniroom();
        $miniRoom->room_id = $postData['room_id'];
        $miniRoom->name = $postData['izba_name'];
        $miniRoom->save();

        return new MiniRoomResource($miniRoom);
    }
}
