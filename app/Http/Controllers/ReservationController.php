<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view("", compact(""));
    }

    public function store(Request $request)
    {
        Reservation::create($request->all());
        // alert success message
        session()->flash("success", "Reservation created successfully");
        // reload the page
        return redirect()->route("rooms");
    }

    //change status of reservation
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = $request->status;
        $reservation->save();
        // alert success message
        session()->flash("success", "Reservation status updated successfully");
        // reload the page
        return redirect()->route("dashboard");
    }
}
