<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Teater;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $teaters = Teater::all();
        $seats = Seat::all();
        return view('booking.create', compact('teaters','seats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'teater_id' => 'required|exists:teater,id',
            'seat_id' => 'required|exists:seats,id',
            'number_ticket' => 'required|integer',
            'payment_method' => 'required',
        ]);

        Booking::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'teater_id' => $request->teater_id,
            'seat_id' => $request->seat_id,
            'number_ticket' => $request->number_ticket,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking Created Successfully!!!');
    }

    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $teaters = Teater::all();
        $seats = Seat::all();
        return view('booking.edit', compact('booking', 'teaters', 'seats'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'teater_id' => 'required|exists:teaters,id',
            'seat_id' => 'required|exists:seats,id',
            'number_ticket' => 'required|integer',
            'payment_method' => 'required',
        ]);

        // $booking->update([
        //     'customer_name' => $request->customer_name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'teater_id' => $request->teater_id,
        //     'seat_id' => $request->seat_id,
        //     'number_ticket' => $request->number_ticket,
        //     'payment_method' => $request->payment_method,

        $booking->update($request->only([
            'customer_name', 'email', 'phone', 'teater_id', 'seat_id', 'number_ticket', 'payment_method'
        ]));

        return redirect()->route('booking.index')->with('success', 'Booking Updated Successfully!!!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking Deleted Successfully!!!');
    }
}
