<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(Request $request)
    {
        return view('form', ["questions" => Question::query()->where('visible', true)->get()]);
    }
}
