<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all(); //ngambil semua data user
        return view('user.index', compact('users'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
            'role_id' => ['required', 'numeric'],
        ]);

        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);

        return redirect()->route('user.index')->with('success', 'User Baru Berhasil Ditambahkan');
    }

    public function show(User $user){
        return view('user.show', compact('user'));
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|char|email|max:255|unique:user,email'. $user->id,
            'password' => 'nullable|char|min:8|confirmed',
        ]);

        if ($request->failed('password')){
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('user,index')->with('success', 'Data Berhasil Di Update.');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Di Hapus.');
    }
}