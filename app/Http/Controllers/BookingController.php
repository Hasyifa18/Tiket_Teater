<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Teater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Ambil semua booking dari model Booking
         $bookings = Booking::all();

         // Return view 'bookings.index' dengan data $bookings
         return view('booking.index', compact('bookings'));
    }

    /**
     * Menampilkan form untuk membuat booking baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teaters = Teater::all();

        return view('bookings.create', compact('teaters'));
    }

    /**
     * Menyimpan data booking baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Membuat objek booking baru
        $booking = new Booking();
        $booking->user_id = Auth::id(); // Mendapatkan ID user yang sedang login
        $booking->teater_id = $request->teater_id;
        $booking->quantity = $request->quantity;
        $booking->save();

        // Redirect ke halaman booking atau sesuaikan dengan kebutuhan aplikasi Anda
        return redirect()->route('bookings.index')->with('success', 'Pemesanan tiket berhasil.');
    }

    /**
     * Menampilkan detail booking tertentu.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Menampilkan form untuk mengedit booking.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        // Mengambil daftar teater untuk ditampilkan di dropdown
        $teaters = Teater::all();

        return view('bookings.edit', compact('booking', 'teaters'));
    }

    /**
     * Memperbarui data booking yang telah diedit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        // Validasi data
        $request->validate([
            'teater_id' => 'required|exists:theaters,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Memperbarui data booking
        $booking->teater_id = $request->teater_id;
        $booking->quantity = $request->quantity;
        $booking->save();

        // Redirect ke halaman detail booking atau sesuaikan dengan kebutuhan aplikasi Anda
        return redirect()->route('bookings.show', $booking)->with('success', 'Booking berhasil diperbarui.');
    }

    /**
     * Menghapus data booking.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        // Redirect ke halaman daftar booking atau sesuaikan dengan kebutuhan aplikasi Anda
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}
