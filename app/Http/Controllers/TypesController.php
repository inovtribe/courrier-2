<?php

namespace App\Http\Controllers;
use View;

use Illuminate\Http\Request;
use App\Type;

class TypesController extends Controller
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
    
    public function list() {
        $types = Type::all();
    
        $context = [
            'types' => $types
        ];
    
        return view('types.all', $context);
    }

    public function add() {
    


        return view('types.form.add');
    }

    public function addType(Request $request) {
        // dd(request());
 
        $data = request()->validate([
            'name'   =>  'required|min:3',
        ]);

        Type::create($data);

        return redirect()->route('types');
    }
}
