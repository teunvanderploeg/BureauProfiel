<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        return view('form', ["questions" => Question::all()]);
    }
}
