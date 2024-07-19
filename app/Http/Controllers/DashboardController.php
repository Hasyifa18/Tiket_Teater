<?php

namespace App\Http\Controllers;

use App\Models\Teater;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Teater::all();
        return view('dashboard', compact('data'));
    }
}

