<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $roles = Role::all();
        $data = [
            "roles" => $roles
        ];
        return view('user.create', $data);
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

        return redirect()->route('user.index')->with('success', 'Add User Successfully');
    }

    public function show(User $id){
        $user = user::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id){
        $user = user::findOrFail($id);
        $roles = Role::all();
        $data = [
            "roles" => $roles
        ];
        return view('user.edit', compact('user', 'roles'));
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
        if(auth()->user()->id == $user->id){
            return redirect()->route('index')->with('error', 'Pengguna sedang login, tidak bisa di hapus');
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully!');
    }
}