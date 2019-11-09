<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function all() {
        $all = [
            "John Doe",
            "Jane Doe",
            "Stephcyrille"
        ];
    
        $context = [
            'all' => $all
        ];
    
        return view('dashboard.all', $context);
    }
}
