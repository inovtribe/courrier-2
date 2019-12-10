<?php 
namespace App\Composers;
use Illuminate\Support\Facades\Auth;

use App\Courrier;
use App\Profile;
use App\Type;
use App\Service;
use App\DemandeAvisUser;
use App\Contact;
use App\Folder;
use App\UserNotification;



class NavComposer
{
    public function compose($view)
    {
        $user = Auth::user();
        $user_id = $user->id; 
        $profile = Profile::where('user_id', $user_id)->firstOrFail();

        $role = $profile->roles;
        // dd($role);
        $mes_courriers_a_traite = Courrier::where('destinator_id', $profile->id)->count();


        $courrier_valid_count = Courrier::where('destinator_id', null)
                                          ->where('valid', true)
                                          ->count();
        $courrier_arrived_count = Courrier::where('destinator_id', null)
                                          ->where('initiate_service_id', null)
                                          ->where('service_dealing_id', null)
                                          ->where('valid', false)
                                          ->where('category', 'arrived')
                                          ->count();

        $courrier_arrived_count = Courrier::where('destinator_id', null)
                                          ->where('initiate_service_id', null)
                                          ->where('service_dealing_id', null)
                                          ->where('valid', false)
                                          ->where('category', 'arrived')
                                          ->count();

        $courrier_type_count = Type::all()->count();
        $folders_count = Folder::all()->count();
        $service_count = Service::all()->count();
        $contact_count = Contact::all()->count();
        $demande_avis_count = DemandeAvisUser::where('profile_id', $profile->id)->count();
        $user_notifs = UserNotification::where('profile_id', 4)->get();
        $user_notifs_count = UserNotification::where('profile_id', 4)->count();
        // $demande_avis_count = '';


        $view->with('variable', '')
             ->with('role', $role)
             ->with('courrier_valid_count', $courrier_valid_count)
             ->with('courrier_arrived_count', $courrier_arrived_count)
             ->with('courrier_type_count', $courrier_type_count)
             ->with('folders_count', $folders_count)
             ->with('user_notifs', $user_notifs)
             ->with('user_notifs_count', $user_notifs_count)
             ->with('service_count', $service_count)
             ->with('demande_avis_count', $demande_avis_count)
             ->with('contact_count', $contact_count)
             ->with('mes_courriers_a_traite', $mes_courriers_a_traite);
    }
}