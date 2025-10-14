<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function history()
    {
        // You can pass data here later if needed
        return view('history');
    }
}
