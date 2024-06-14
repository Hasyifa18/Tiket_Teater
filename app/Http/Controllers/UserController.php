<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
