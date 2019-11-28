<?php

namespace App\Http\Controllers;

use View;

use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
use App\AtachedFile;



class CourrierInternalController extends Controller
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
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }

    
    public function listInternal() {
        $all_mails = Courrier::where('category', 'internal')
                             ->where('destinator_id', null)
                             ->get();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.internals.all', $context);
    }

    public function showInternal($mail){
        $mail = Courrier::where('id', $mail)->firstOrFail();
        $destinators = Profile::all();

        $context = [
            'courrier' => $mail,
            'destinators' => $destinators,
        ];

        //  dd($mail);
        return view('courriers.internals.single', $context);
    }

    public function addInternal() {

        $services = Service::all();
        $types = Type::all();
        $expeditors_personal = Contact::getPersonal()->get();
        $expeditors_company = Contact::getCompany()->get();
        $destinators = Profile::all();

        $context = [
            'services' => $services,
            'types' => $types,
            'expeditors_personal' => $expeditors_personal,
            'expeditors_company' => $expeditors_company,
            'destinators' => $destinators,
        ];

        return view('courriers.internals.add', $context);
    }
}
