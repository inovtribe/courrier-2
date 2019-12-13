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
use App\Folder;



class CourrierValidController extends Controller
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
    
    
    public function validArrived() {
        $all_mails = Courrier::where('category', 'arrived')
                             ->where('valid', true)
                             ->where('destinator_id', null)
                             ->get();
        $destinators = Profile::all();

        // dd($all_mails);

        // dd($count);
        $context = [
            'all_mails' => $all_mails,
            'destinators' => $destinators,
        ];
    
        return view('courriers.valids.all', $context);
    }

    public function showValid($mail){
        $arrived_mail = Courrier::where('id', $mail)->firstOrFail();
        $destinators = Profile::all();
        $attached_files = AtachedFile::where('courrier_id', $arrived_mail->id)->get();
        $services = Service::all();
        $folders = Folder::all();

        $context = [
            'courrier' => $arrived_mail,
            'destinators' => $destinators,
            'services' => $services,
            'folders' => $folders,
            'attached_files' => $attached_files,
        ];

        //  dd($mail);
        return view('courriers.valids.single', $context);
    }

}
