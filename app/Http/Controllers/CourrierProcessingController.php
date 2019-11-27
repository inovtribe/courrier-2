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


class CourrierProcessingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
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

    // public function coteCourrier($mail){
    //     return redirect()->route('valid_mails_arrived');
    // }

}
