<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function show(Request $request)
    {
        // Retrieve all error messages
        $errors = session('errors');
        return view('errors.show', compact('errors'));
    }
}
