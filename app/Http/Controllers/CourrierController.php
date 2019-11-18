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

    
    public function list() {
        $all_mails = [
            "John Doe",
            "Jane Doe",
            "Stephcyrille"
        ];
    
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.all', $context);
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

        $d1 = date('Y-m-d H:i:s');
        $d1 = date('Y-m-d H:i:s');
        $d1 = date('Y-m-d H:i:s');
        // dd(request());
        // $data = request()->validate([
        //     'attachment' => 'required|file|max:9124',
        //     'category'          => 'required',
        //     'type_id'           => 'required',
        //     'priority'          => 'required',
        //     'confidential'      => 'required',
        //     'mail_date'         => 'required',
        //     'mail_date_arrived' => 'required',
        //     'expeditor'         => 'required',
        //     'initiate_service'  => 'required',
        //     'subject'           => 'required',
        //     // 'keywords'          => 'required',
        //     'service_dealing'   => 'required',
        //     'destinator'        => 'required',
        //     'deleted'           => 'required',
        //     'deadth_date'       => 'required',
        // ]);

        /* 
        $table->string('reference');
        $table->string('subject');
        $table->string('details');
        $table->string('status');*/
        
        $files=$request->file('attachment');
        $name=$files->getClientOriginalName();
        $files->move('pieces_jointes',$name);
        $data = $request->all();
        $values = [
              'attachment'        => $name,
              'category'          => $request->get('category'),
              'type_id'           => $request->get('type_id'),
              'priority'          => $request->get('priority'),
              'confidential'      => $request->get('confidential'),
              'mail_date'         => $request->get('mail_date'),
              'mail_date_arrived' => $request->get('mail_date_arrived'),
              'expeditor'         => $request->get('expeditor'),
              'initiate_service'  => $request->get('initiate_service'),
              'subject'           => $request->get('subject'),
              'keywords'          => $request->get('keywords'),
              'service_dealing'   => $request->get('service_dealing'),
              'destinator'        => $request->get('destinator'),
              'deleted'           => $request->merge(['deleted'=>false]),
              'deadth_date'       => $request->get('deadth_date'),
        ];
        $data['deleted'] = false;
        $data['attachment'] = $name;
        $data['reference'] = strtoupper($ref);
        $request->merge($data);
        // Courrier::create($data);
        // dd($request);
        Courrier::create($request->all());

            // DB::table('img')->insert([
            // 'image' => $name
            // ]);
            
        return back()->with('success','You have successfully upload image.');
     }
    
}
