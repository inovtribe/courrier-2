<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Profile;
use App\Service;
use App\Courrier;


class FolderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav'],
            'App\Composers\NavComposer' => ['layouts.base']
        ]);
    }
   
   public function allFolders(){

    $listDiffusion = Profile::where('roles', 'SC')->get();

    $allFolders = Folder::all(); 
    
    $context = [
        'allFolders'=>$allFolders,
    ];
    
    return view('dossiers.all', $context ); 
   }
   
   
   public function form(){
    $services = Service::all();

    $context = [
        'services' => $services,
    ];
    
    return view('dossiers.add', $context ); 
   }


   public function add(Request $request)
   {
        $user = Auth::user(); 
        $profile = Profile::where('user_id', $user->id)->firstOrFail();

        $uniqid = uniqid();
        $rand_start = rand(1,8);
        // Au lieu de mail recupere le service auquel appartient le current user
        $ref = 'dossier'.$profile->service->acronym.'-'.date("d").date("m").date("Y").substr($uniqid, $rand_start, 2);

    
    
        request()->validate([
        'name' => 'required|min:3',
        'service_id' => 'required',
        'is_open' => 'required',
        ]);
               
        // Set all dates with datetime
        if($request->get('is_open') === "true"){
            $d1 = date("Y-m-d H:i:s");

            $values = [
                'reference'            => strtoupper($ref),
                'name'                 => $request->get('name'),
                'is_open'              => $request->get('is_open'),
                'open_date'            => $d1,
                'service_id'           => $request->get('service_id'),
            ];
        } else {
            $values = [
                'reference'            => strtoupper($ref),
                'name'                 => $request->get('name'),
                'is_open'              => $request->get('is_open'),
                'service_id'           => $request->get('service_id'),
            ];
        }

        // dd($values);

        Folder::create($values);

        return redirect()->route('all_folders');
    
    }


    public function single($id)
    {   
        $dossier = Folder::where('id', $id)->firstOrFail();
        $courriers = Courrier::where('folder_id', $id)->get();

        $context = [
            'dossier' => $dossier,
            'courriers' => $courriers
        ];

        return view('dossiers.single', $context);
    }
   
    
}
