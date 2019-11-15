<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    //
    public function list() {
        $services = Service::all();
    
        $context = [
            'services' => $services
        ];
    
        return view('services.all', $context);
    }

    public function add() {
        return view('services.form.add');
    }

    public function addService(Request $request) {
        // dd(request());
 
        $data = request()->validate([
            'name'   =>  'required|min:3',
            'acronym'    =>  'required|min:2',
            'responsable'  =>  'required'
        ]);

        Service::create($data);

        return redirect()->route('services');
    }
}
