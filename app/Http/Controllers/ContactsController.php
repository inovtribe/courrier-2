<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function list() {
      $all_contact = Contact::all();
      $personal_contact = Contact::personal()->get();
      $company_contact = Contact::company()->get();
  
      $context = [
          'all_contact'      => $all_contact,
          'personal_contact' => $personal_contact,
          'company_contact'  => $company_contact
      ];
  
      return view('contacts.all', $context);
    }
    
    public function add() {
      return view('contacts.form.add');
    }

    public function addContact(Request $request) {
        // dd(request('entity_type'));
        if (request('entity_type') === "personal"){
            $data = request()->validate([
                'first_name'   =>  'required|min:3',
                'last_name'    =>  'required|min:3',
                'email'        =>  'required|email',
                'phone'        =>  'required|min:9',
                'address'      =>  'required|min:3',
                'postal_code'  =>  'required|min:2',
                'entity_type'  =>  'required'
            ]);
        } else if (request('entity_type') === "company") {
            $data = request()->validate([
                'company_name'      =>  'required|min:3',
                'company_acronym'   =>  'required|min:3',
                'company_email'     =>  'required|email',
                'company_service'   =>  'required|min:2',
                'address'           =>  'required|min:3',
                'phone'             =>  'required|min:9',
                'postal_code'       =>  'required|min:2',
                'entity_type'  =>  'required'
            ]);
        }

        Contact::create($data);

        return redirect()->route('contact');
     }
}
