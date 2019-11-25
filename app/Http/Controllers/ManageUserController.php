<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Profile;
use App\Service;


class ManageUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
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
    
    public function edit($profile){
        $profile = Profile::where('id', $profile)->firstOrFail();
        $services = Service::all();

        $context = [
            'profile' => $profile,
            'services' => $services,
        ];

        return view('manage_user.edit', $context);
    }

    public function update(Request $request, $profile)
    {
        $profile = Profile::where('id', $profile)->firstOrFail();

        $values = [
            'username' => $request->get('username'),
            'service_id' => $request->get('service_id'),
        ];

        // dd($values);

        $profile->update($values);
        
        return redirect('/manage/users/'. $profile->id .'/single');
    }

    public function userList($service){
        $profiles = Profile::where('service_id', $service)->get();;

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
