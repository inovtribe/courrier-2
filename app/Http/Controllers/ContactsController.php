<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      $all_contact = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_contact' => $all_contact
      ];
  
      return view('contacts.all', $context);
    }
}
