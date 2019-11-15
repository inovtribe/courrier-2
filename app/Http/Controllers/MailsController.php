<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Traits\UploadTrait;

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
        
        $destinataire = [
            "Nouveau destinataire 1",
            "Nouveau destinataire 2",
            "Nouveau destinataire 3",
            "Nouveau destinataire 4",
        ];

        $destinataire = [
            "Nouveau destinataire 1",
            "Nouveau destinataire 2",
            "Nouveau destinataire 3",
            "Nouveau destinataire 4",
        ];

        $context = [
            'all' => $all,
            'destinataire' => $destinataire,
        ];

        return view('mails.form.add', $context);
    }

    public function addMail(Request $request) {
        $uniqid = uniqid();
        $rand_start = rand(1,8);
        $ref = 'mail-'.date("d").date("m").date("Y").substr($uniqid, $rand_start, 5);

        // Form validation
        // $request->validate([
        //     'name'        =>  'required',
        //     'attachment'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:5048'
        // ]);

        // Get current user
        // $user = User::findOrFail(auth()->user()->id);
        // // Set user name
        // $user->name = $request->input('name');
        // // Check if a profile image has been uploaded
        // if ($request->has('profile_image')) {
        //     // Get image file
        //     $image = $request->file('profile_image');
        //     // Make a image name based on user name and current timestamp
        //     $name = Str::slug($request->input('name')).'_'.time();
        //     // Define folder path
        //     $folder = '/uploads/images/';
        //     // Make a file path where image will be stored [ folder path + file name + file extension]
        //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        //     // Upload image
        //     $this->uploadOne($image, $folder, 'public', $name);
        //     // Set user profile image path in database to filePath
        //     $user->profile_image = $filePath;
        // }

        dd(request());
        /* $request->validate([
            'attachment' => 'required|file|max:1024',
        ]);
        $table->string('reference');
        $table->string('subject');
        $table->string('details');
        $table->string('status');


        $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('logos',$fileName); */

        return back();
     }
    
}
