<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }
   
   public function allFolders(){
    $allFolders = Folder::all(); 
    
    $context = [
        'allFolders'=>$allFolders,
    ];
    
    return view('dossiers.all', $context ); 
   }
   
    //
}
