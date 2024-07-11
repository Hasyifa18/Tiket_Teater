<?php

namespace App\Http\Controllers;

use App\Models\Teater;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teaters = Teater::select('title', 'show_date')->get();
        return view('dashboard', compact('teaters'));
    }
}

