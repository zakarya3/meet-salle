<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $rooms = Room::paginate(10);
        $reservations = Reservation::all();
        return view('dashboard', compact('rooms','reservations'));
    }
    
    public function create() {
        return view('create-room');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'capacity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
        'surface' => 'required|numeric|min:1',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'has_projector' => 'boolean',
        'has_wifi' => 'boolean',
        'has_ac' => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('rooms', 'public');
        $validated['image'] = $imagePath;
    }

    Room::create($validated);
    
    return redirect()->route('dashboard')
        ->with('success', 'Room created successfully');
}

    public function edit($id) {
        $room = Room::find($id);
        return view('edit-room', compact('room'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
        ]);

        $room = Room::find($id);
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('dashboard')->with('success', 'Room updated successfully');
    }

    public function destroy($id) {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('dashboard')->with('success', 'Room deleted successfully');;
    }
}
