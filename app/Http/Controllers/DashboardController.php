<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        $reservations = Reservation::with('rooms')->paginate(10);
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
        return redirect()->route('dashboard')->with('success', 'Room deleted successfully');
    }

    public function addUser(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'co-admin',
        ]);

        return redirect(route('dashboard'))->with('success', 'User created successfully');
    }
}
