<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Courrier;
use App\Avis;



class AvisController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }

    
}
