<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailsController extends Controller
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
        $all_mails = [
            "John Doe",
            "Jane Doe",
            "Stephcyrille"
        ];
    
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('mails.all', $context);
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
  
      return view('mails.not_treated', $context);
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
  
      return view('mails.treated', $context);
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
  
      return view('mails.deleted', $context);
    }
    
}
