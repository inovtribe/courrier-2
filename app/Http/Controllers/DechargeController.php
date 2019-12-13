<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

use App\Decharge;
use App\Courrier;


class DechargeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
    }


    public function single($courrier){
        $single_courrier = Courrier::where('id', $courrier)->firstOrFail();
        $context = [
            'single_courrier' => $single_courrier,
        ];

        return view('courriers.arriveds.decharge', $context);
    }
}
