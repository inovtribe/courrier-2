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
        $courriers = Courrier::where('destinator_id', $profile->id)
                             ->where('category', 'arrived')
                             ->get();
        
        $context = [
            'courriers' => $courriers
        ];
        // dd($courrier);
        return view('courriers.user.all', $context);
    }

    public function singleCourrier($courrier)
    {
        $my_courrier = Courrier::where('id', $courrier)->firstOrFail();
        $destinators = Profile::all();
        $services = Service::all();
        $attached_files = AtachedFile::where('courrier_id', $my_courrier->id)->get();
        $avis = $my_courrier->avis;
        $avis_count = $my_courrier->avis->count();

        // dd($my_courrier->expeditor->first_name);

        $context = [
            'courrier' => $my_courrier,
            'destinators' => $destinators,
            'services' => $services,
            'avis' => $avis,
            'avis_count' => $avis_count,
            'attached_files' => $attached_files,
        ];

        //  dd($mail);
        return view('courriers.user.single', $context);
    }

    // Processing
    //  Donc on a deux option de traitement, soit répondre (générer réponse, soit demander avis)
    // Si l'avis demandé n'est pas cloturé sur le courrier, la réponse ne peut pas etre émise
    // 

}
