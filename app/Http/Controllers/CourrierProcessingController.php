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
use App\Avis;
use App\AvisCourrier;
use App\AvisProfile;
use App\DemandeAvis;
use App\DemandeAvisUser;



class CourrierProcessingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
    }


    /**
     * Processing treatement on Courrier Model from this place
     *
     * @return void
     */
    public function validateCourrier($courrier){
        $courrier = Courrier::where('id', $courrier)->firstOrFail();

        $data = [
            'valid' => true,
        ];

        $courrier->update($data);
        return redirect()->route('valid_mails_arrived');
    }
    

    public function coteCourrier($courrier, Request $request){
        $courrier = Courrier::where('id', $courrier)->firstOrFail();
        // dd($request->user());
        if($request->get('destinator_id')){
            $data = [
                'destinator_id' => $request->get('destinator_id'),
                // 'initiate_service_id' => $request->get('initiate_service_id'),
                'service_dealing_id' => $request->get('service_dealing_id'),
            ];
        }
        else{
            $data = [
                'service_dealing_id' => $request->get('service_dealing_id'),
            ];
        }

        $courrier->update($data);
        
        return redirect()->route('valid_mails_arrived');
    }
    
    
    public function addToFolder($courrier, Request $request){
        $courrier = Courrier::where('id', $courrier)->firstOrFail();
        // dd($request->user());
        
        $data = [
            'folder_id' => $request->get('folder_id'),
        ];
  
        $courrier->update($data);
        
        return redirect()->route('all_folders');
    }

    public function addAvisRequest($courrier, Request $request)
    {
        $courrier = Courrier::where('id', $courrier)->firstOrFail();
        $user = Auth::user();
        $d1 = date($request->get('limit_date').' H:i:s');


        $values = [ 
            'courrier_id'    => $courrier->id, 
            'limit_date'     => $d1, 
        ];
        
        $demande_avis = DemandeAvis::create($values);

        $avis_courrier = [
            'demande_avis_id'   => $demande_avis->id,
            'profile_id'        => $request->get('destinator_id'),
            'etat'              => 'En attente',
        ];

        DemandeAvisUser::create($avis_courrier);

        // dd($avis);

        return redirect()->route('all_my_mail');
    }
    
    
    public function addNewAvis($courrier, Request $request)
    {
        $courrier = Courrier::where('id', $courrier)->firstOrFail();
        $user = Auth::user();
        $d1 = date($request->get('limit_date').' H:i:s');

        
        $values = [
            'motif'             => $request->get('motif'),
            'contenu'           => $request->get('contenu'),
            'etat'              => '',
        ];
 
        $avis = Avis::create($values);


        $avis_courrier = [
            'avis_id'           => $avis->id,
            'courrier_id'       => $courrier->id,
        ];

        AvisCourrier::create($avis_courrier);
        
        $avis_profile = [
            'avis_id'           => $avis->id,
            'profile_id'       => $user->id,
        ];

        AvisProfile::create($avis_profile);

        // dd($avis);

        return redirect()->route('all_my_mail');
    }

    // public function coteCourrier($mail){
    //     return redirect()->route('valid_mails_arrived');
    // }

}
