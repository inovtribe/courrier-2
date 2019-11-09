<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilesController extends Controller
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
      $all_profile = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];
  
      $context = [
          'all_profile' => $all_profile
      ];
  
      return view('profiles.all', $context);
    }
}
