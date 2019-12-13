<?php

namespace App\Http\Controllers;
use View;
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
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
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
