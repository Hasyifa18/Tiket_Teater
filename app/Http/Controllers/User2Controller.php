<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Teater;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;



class User2Controller extends Controller
{
    public function index(){
        $data = Teater::all(); //ngambil semua data user
        return view('user2.index', compact('data'));
    }

    public function checkout($id){
        $user = auth()->user();
        $data = Teater::findOrFail($id); // Menemukan record Teater berdasarkan $id
        $data2 = User::first(); // Mengambil record pertama dari model User (mungkin Anda ingin menggunakan findOrFail juga?)
        $data3 = Seat::all(); // Mengambil record pertama dari model Seat (mungkin Anda ingin menggunakan findOrFail juga?)
        $teaters = Teater::all(); //ambil semua teater untuk dropdown select theater
        return view('user2.checkout', compact('data', 'data2', 'data3','user', 'teaters'));
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

        return redirect()->route('user2.index')->with('success', 'Booking Created Successfully!!!');
    }


    public function hasil(){
        $user = auth()->user();
        $data = Booking::where('email', $user->email)->get(); // Menggunakan get() untuk mengambil semua hasil query
        return view('user2.hasil', compact('data'));
    }

    public function store2(Request $request)
    {
        // Ambil id dari inputan
        $id = $request->input('id');
        $foto = $request->file('bukti');
        // Cari data di model Booking berdasarkan id
        $booking = Booking::find($id);
        
        if ($booking) {
            // Simpan data bukti ke dalam database
            $foto->move(public_path('storage/foto'), $foto->getClientOriginalName());
            $booking->bukti = $foto->getClientOriginalName();
            $booking->save();

    
            // Redirect ke halaman yang diinginkan dengan pesan sukses
            return redirect()->route('hasil')->with('status', 'Data updated successfully');
        } else {
            // Redirect ke halaman yang diinginkan dengan pesan error jika booking tidak ditemukan
            return redirect()->route('hasil')->with('error', 'Booking not found');
        }
    }

    public function detail($id){
        $data = Teater::findOrFail($id);
        return view ('user2.detail', compact('data'));
    }

    public function update(Request $request,  $id){
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|char|email|max:255|unique:user,email'. $user->id,
            // 'password' => 'nullable|char|min:8|confirmed',
        ]);

        // if ($request->failed('password')){
        //     $validatedData['password'] = bcrypt($validatedData['password']);
        // } else {
        //     unset($validatedData['password']);
        // }

        $user = user::findOrFail($id); 
        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'User Updated Successfully!');
    }

    public function destroy($id){
        // yang sedang login tidak boleh dihapus!
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully!');
    }
}
