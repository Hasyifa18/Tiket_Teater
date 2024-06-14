<?php

namespace App\Http\Controllers;
use App\models\fligh;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update($id){
        $user = User::find($id);
        $user->update();
        return redirect()->route('user.index');
    }
}
