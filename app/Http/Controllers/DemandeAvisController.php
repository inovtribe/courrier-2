<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View; 

use App\DemandeAvisUser;
use App\Courrier;
use App\AtachedFile;


class DemandeAvisController extends Controller
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

     
    public function list() {
        $user = Auth::user();
        $demandes = DemandeAvisUser::where('profile_id', $user->id)
                             ->get();
        
        // dd($demandes);
        $context = [
            'demandes' => $demandes
        ];
    
        return view('demandes_avis.all', $context);
    }

    public function showCourrier($courrier){
        $courrier = Courrier::where('id', $courrier)->firstOrFail();;
        $attached_files = AtachedFile::where('courrier_id', $courrier->id)->get();

        // dd($courrier);

        $context = [
            'courrier' => $courrier,
            'attached_files' => $attached_files,
        ];

        //  dd($mail);
        return view('demandes_avis.single', $context);
    }

}
