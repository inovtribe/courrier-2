<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;

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

    public function add() {
        $all = [
            "John Doe",
            "Jane Doe",
            "Stephcyrille"
        ];

        $context = [
            'all' => $all
        ];

        return view('mails.form.add', $context);
    }

    public function addMail(Request $request) {
        $uniqid = uniqid();
        $rand_start = rand(1,8);
        $ref = 'mail-'.date("d").date("m").date("Y").substr($uniqid, $rand_start, 5);

        $data = $request->validate([
            'subject' => 'required|min:3',
            'type' => 'required',
        ]);

        
        /* $request->validate([
            'attachment' => 'required|file|max:1024',
        ]);
        $table->string('reference');
        $table->string('subject');
        $table->string('details');
        $table->string('status');

        dd(request());

        $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('logos',$fileName); */

        return back();
     }
    
}
