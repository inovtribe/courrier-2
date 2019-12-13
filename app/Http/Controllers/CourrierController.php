<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
use App\AtachedFile;


class CourrierController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
    }
    
    public function all() {
        $all_mails = Courrier::all();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails,
        ];
    
        return view('courriers.all', $context);
    }
    
}
