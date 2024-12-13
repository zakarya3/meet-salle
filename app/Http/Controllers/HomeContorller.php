<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeContorller extends Controller
{
    public function index() {
        $rooms = Room::all()->take(3);
        $rooms6 = Room::all()->take(6);
        return view('index', compact('rooms', 'rooms6'));
    }
}
