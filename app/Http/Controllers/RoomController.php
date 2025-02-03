<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::paginate(9);
        return view('rooms', compact('rooms'));
    }

    public function searchByName(Request $request) {
        $rooms = Room::where('name', 'like', '%'.$request->keyword.'%')->paginate(9);
        return view('rooms', compact('rooms'));
    }

    public function create(Request $request) {
        $room = Room::create($request->all());
        // return redirect()->route('')->with('success','');
    }

    public function findOne($id) {
        $room = Room::find($id);
        return view('room', compact('room'));
    }
}
