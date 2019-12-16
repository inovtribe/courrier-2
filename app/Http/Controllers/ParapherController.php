<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use View;
use Illuminate\Http\Request;

use App\Parapher;



class ParapherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
    }


    public function list()
    {
        $paraphers = Parapher::all();
        $context = [
            'paraphers' => $paraphers,
        ];

        return view('paraphers.all', $context);
    }
}
