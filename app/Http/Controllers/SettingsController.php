<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
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
      $all_setting = [
          "John Doe",
          "Jane Doe",
          "Stephcyrille"
      ];

      $context = [
          'all_setting' => $all_setting
      ];

      return view('settings.all', $context);
    }
}
