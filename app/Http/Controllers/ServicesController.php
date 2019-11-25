<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\Service;
use App\Profile;

class ServicesController extends Controller
{
    //
    public function __construct()
    {
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }

    
    public function list() {
        $services = Service::all();
    
        // dd($services);
        $context = [
            'services' => $services
        ];
    
        return view('services.all', $context);
    }

    public function add() {
        $responsables = Profile::all();
    
        $context = [
            'responsables' => $responsables
        ];

        return view('services.form.add', $context);
    }

    public function addService(Request $request) {
        // dd(request());
 
        $data = request()->validate([
            'name'   =>  'required|min:3',
            'acronym'    =>  'required|min:2',
            'responsable_id'  =>  'required'
        ]);

        Service::create($data);

        return redirect()->route('services');
    }
}
