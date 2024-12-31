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
}
