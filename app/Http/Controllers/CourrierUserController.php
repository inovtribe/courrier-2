<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
use App\AtachedFile;




class CourrierUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }

    public function listCourriers(){
        $user = Auth::user();
        $user_id = $user->id; 
        $profile = Profile::where('user_id', $user_id)->firstOrFail();
        $courriers = Courrier::where('destinator_id', $profile->id)->get();

        $context = [
            'courriers' => $courriers
        ];
        // dd($courrier);
        return view('courriers.user.all', $context);
    }
}
