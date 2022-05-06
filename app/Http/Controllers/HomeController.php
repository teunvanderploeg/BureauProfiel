<?php

namespace App\Http\Controllers;

use App\Models\RunningAssignment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ["assignments" => RunningAssignment::query()->where('visible', true)->get()]);
    }
}
