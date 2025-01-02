<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        $reservations = Reservation::all();
        return view('dashboard', compact('rooms', 'reservations'));
    }

    public function create()
    {
        return view('create-room');
    }

    public function store(Request $request)
    {
        Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'has_projector' => $request->has_projector,
            'has_wifi' => $request->has_wifi,
            'has_ac' => $request->has_ac,
        ]);
        return redirect()->route('dashboard')->with('success', '');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('edit-room', compact('room'));
    }

    public function update(Request $request, $id)
    {

        $room = Room::find($id);
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'has_projector' => $request->has_projector,
            'has_wifi' => $request->has_wifi,
            'has_ac' => $request->has_ac,
        ]);

        return redirect()->route('dashboard')->with('success', 'Room updated successfully');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('dashboard')->with('success', 'Room deleted successfully');;
    }
}
