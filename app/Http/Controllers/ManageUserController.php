<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use View;
use App\Profile;
use App\Service;
use PDF;



class Role{
    public $key;
    public $value;

    public function __construct($key, $val)
    {
        $this->key = $key;
        $this->value = $val;
    }
}

class ManageUserController extends Controller
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

    public function list()
    {
        $profiles = Profile::all();
        $context = [
            'profiles' => $profiles,
        ];
        return view('manage_user.all', $context);
    }

    public function show($profile){
        $profile = Profile::where('id', $profile)->firstOrFail();

        $context = [
            'profile' => $profile,
        ];

        return view('manage_user.single', $context);
    }
    
    public function showSingle($profile){
        $profile = Profile::where('id', $profile)->firstOrFail();
        $services = Service::all();

        $context = [
            'profile' => $profile,
            'services' => $services,
        ];

        return view('manage_user.show', $context);
        // return PDF::html('manage_user.show', $context);
    }


    public function edit($profile, Request $request){
        $profile = Profile::where('id', $profile)->firstOrFail();
        $services = Service::all();

        $sg = new Role('SG', 'Superviseur général');
        $sc = new Role('SC', 'Superviseur du courrier');
        $at = new Role('AT', 'Agent traitant');
        $ac = new Role('AC', 'Agent du courrier');
        $admin = new Role('ADMIN', 'Administrateur du système');
        
        $roles = [
            $sg, $sc, $at, $ac, $admin
        ];

        // dd($roles);
        $context = [
            'profile' => $profile,
            'services' => $services,
            'roles' => $roles,
        ];

        return view('manage_user.edit', $context);
    }

    public function update(Request $request, $profile)
    {
        $profile = Profile::where('id', $profile)->firstOrFail();

        if($request->file('visa_path')){
            $files = $request->file('visa_path');
            $file_name = $profile->username.'_'.time();
            $files->move(public_path('visa_path'), ($file_name.'.'.$request->file('visa_path')->getClientOriginalExtension()));
            $visa = '/visa_path/'.$file_name.'.'.$request->file('visa_path')->getClientOriginalExtension();
        } else {
            $visa = '';
        }
        

        $values = [
            'username' => $request->get('username'),
            'service_id' => $request->get('service_id'),
            'roles' => $request->get('roles'),
            'visa_path' => $visa
        ];

        // dd($values);

        $profile->update($values);
        
        return redirect()->route('manage_user_list');
    }

    public function userList($service){
        $user = Auth::user();
        $user_id = $user->id;
        $current_profile = Profile::where('user_id', $user_id)->firstOrFail();
        $profiles = Profile::where('service_id', $service)->get()->except([$current_profile->id]);

        echo json_encode($profiles);
        // $this->load->model('car_model');

        // $this->form_validation->set_rules('carId', 'carId', 'trim|xss_clean');

        // if($this->form_validation->run()){
        //     $carId = $this->input->post('carId');
        //     $carModels = $this->user_management_model->getCarModels($carId);
        //     // Add below to output the json for your javascript to pick up.
        //     echo json_encode($carModels);
        //     // a die here helps ensure a clean ajax call
        //     die();
        // } else {
        //     echo "error";
        // }   
    }
}
