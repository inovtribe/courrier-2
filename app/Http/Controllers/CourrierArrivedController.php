<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
use App\AtachedFile;
use App\UserNotification;
use App\Notification;



class CourrierArrivedController extends Controller
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

     
    public function listArrived() {
        $all_mails = Courrier::where('category', 'arrived')
                             ->where('valid', false)
                             ->where('destinator_id', null)
                             ->get();
        
        // dd($all_mails);
        $context = [
            'all_mails' => $all_mails
        ];
    
        return view('courriers.arriveds.all', $context);
    }

    public function showArrived($mail){
        $arrived_mail = Courrier::where('id', $mail)->firstOrFail();
        $destinators = Profile::all();
        $attached_files = AtachedFile::where('courrier_id', $arrived_mail->id)->get();

        // dd($arrived_mail->type);

        $context = [
            'courrier' => $arrived_mail,
            'destinators' => $destinators,
            'attached_files' => $attached_files,
        ];

        //  dd($mail);
        return view('courriers.arriveds.single', $context);
    }

    public function addArrived() {    

        $services = Service::all();
        $types = Type::all();
        $expeditors_personal = Contact::getPersonal()->get();
        $expeditors_company = Contact::getCompany()->get();
        $destinators = Profile::all();

        $context = [
            'services' => $services,
            'types' => $types,
            'expeditors_personal' => $expeditors_personal,
            'expeditors_company' => $expeditors_company,
            'destinators' => $destinators,
        ];

        return view('courriers.arriveds.add', $context);
    }

    public function postAddArrived(Request $request) {
        // dd(public_path());
        $user = Auth::user(); 
        $profile = Profile::where('user_id', $user->id)->firstOrFail();

        $uniqid = uniqid();
        $rand_start = rand(1,8);
        // Au lieu de mail recupere le service auquel appartient le current user
        $ref = $profile->service->acronym.'-'.date("d").date("m").date("Y").substr($uniqid, $rand_start, 5);

        // Set all dates with datetime
        $d1 = date($request->get('mail_date').' H:i:s');
        $d2 = date($request->get('mail_date_arrived').' H:i:s');
        $d3 = date($request->get('deadth_date').' H:i:s');

        request()->validate([
            'expeditor_id' => 'required',
            'type_id' => 'required',
            'subject' => 'required|min:3',
            'attachment'   => 'required|mimes:doc,docx,pdf,jpg,png,odt|max:20214',
        ]);
        
        $values = [
            'reference'            => strtoupper($ref),
            'category'             => $request->get('category'),
            'created_by'           => $profile->id,
            'type_id'              => $request->get('type_id'),
            'priority'             => $request->get('priority'),
            'confidentiality'      => $request->get('confidentiality'),
            'mail_date'            => $d1,
            'mail_date_arrived'    => $d2,
            'subject'              => $request->get('subject'),
            'nature'               => $request->get('nature'),
            'keywords'             => $request->get('keywords'),
            'expeditor_id'         => $request->get('expeditor_id'),
            // Get initiate service from active profile
            // 'initiate_service_id'  => '',
            'deleted'               => false,
            'archived'              => false,
            'valid'                 => false,
            'mention'               => ' ',
            'status'                => ' ',
        ];

        // dd($values);
        
        $courrier = Courrier::create($values);
        
        
        $files = $request->file('attachment');
        $file_name = 'courrier_'.time();
        $files->move(public_path('pieces_jointes'), ($file_name.'.'.$request->file('attachment')->getClientOriginalExtension()));
        $path = '/pieces_jointes/'.$file_name.'.'.$request->file('attachment')->getClientOriginalExtension();
        
        $data = [
            'name' => $file_name,
            'path' => $path,
            'format' => $request->file('attachment')->getClientOriginalExtension(),
            'courrier_id' => $courrier->id,
        ];

        AtachedFile::create($data);
        // dd($data);

        $notification = Notification::create([
            'title' => "Nouveau courrier arrivé",
            'message' => "Un nouveau courrier arrivé a été enregistré",
            'read' => false
        ]);
        $listDiffusion = Profile::where('roles', 'SC')->get();

        foreach ($listDiffusion as $key => $value) {
            $data = [
                'notification_id' => $notification->id,
                'profile_id' => $value->id,
            ];
            UserNotification::create($data);
        }

        return redirect()->route('single_decharge', $courrier->id);

    }
}
