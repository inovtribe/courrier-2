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
  
      $context = [
          'all_contact' => $all_contact
      ];
  
      return view('contacts.all', $context);
    }
}
