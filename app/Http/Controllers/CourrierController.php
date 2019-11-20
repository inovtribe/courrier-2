<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
// use App\Traits\UploadTrait;

class CourrierController extends Controller
{   
    // use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

     
    public function listArrived() {
        $all_mails = Courrier::where('category', 'arrived')->get();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.arrived', $context);
    }
    
    public function listInternal() {
        $all_mails = Courrier::where('category', 'internal')->get();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.internal', $context);
    }

    public function listOutgoing() {
        $all_mails = Courrier::where('category', 'outgoing')->get();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.outgoing', $context);
    }

    public function not_treated() {
      $all_mails = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_mails' => $all_mails
      ];
  
      return view('courriers.not_treated', $context);
    }

    public function treated() {
      $all_mails = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_mails' => $all_mails
      ];
  
      return view('courriers.treated', $context);
    }

    public function archived() {
      $all_mails = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_mails' => $all_mails
      ];
  
      return view('mails.archived', $context);
    }

    public function deleted() {
      $all_mails = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_mails' => $all_mails
      ];
  
      return view('courriers.deleted', $context);
    }

    public function add() {

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

        return view('courriers.form.add', $context);
    }

    public function addMail(Request $request) {
        $uniqid = uniqid();
        $rand_start = rand(1,8);
        $ref = 'mail-'.date("d").date("m").date("Y").substr($uniqid, $rand_start, 5);
        
        $files = $request->file('attachment');
        $name = time().'.'.$request->file('attachment') ->getClientOriginalExtension();
        $files->move(public_path('pieces_jointes'),$name);
        
        
        // Set all dates with datetime
        $d1 = date($request->get('mail_date').' H:i:s');
        $d2 = date($request->get('mail_date_arrived').' H:i:s');
        $d3 = date($request->get('deadth_date').' H:i:s');
        
        $values = [
              'attachment'           => $name,
              'reference'            => strtoupper($ref),
              'category'             => $request->get('category'),
              'nature'               => $request->get('category'),
              'type_id'              => $request->get('type_id'),
              'priority'             => $request->get('priority'),
              'confidentiality'      => $request->get('confidentiality'),
              'mail_date'            => $d1,
              'mail_date_arrived'    => $d2,
              'expeditor_id'         => $request->get('expeditor'),
              'subject'              => $request->get('subject'),
              'initiate_service_id'  => $request->get('initiate_service'),
              'keywords'             => $request->get('keywords'),
              'deleted'              => false,
        ];


        Courrier::create($values);

        return redirect()->route('all_mails');
     }
    
    public function show($mail){
        $mail = Courrier::where('id', $mail)->firstOrFail();

        $context = [
            'courrier' => $mail,
        ];

        //  dd($mail);
        return view('courriers.single', $context);
    }
    
}
