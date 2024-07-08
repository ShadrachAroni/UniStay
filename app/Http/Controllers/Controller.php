<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourController extends Controller
{
    public function showView()
    {
        $verificationLinkSent = true; // Set based on your application logic
        return view('your-view-name', compact('verificationLinkSent'));
    }
}
