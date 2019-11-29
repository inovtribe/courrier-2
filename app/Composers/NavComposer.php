<?php 
namespace App\Composers;
use Illuminate\Support\Facades\Auth;

use App\Courrier;
use App\Profile;
use App\Type;
use App\Service;



class NavComposer
{
    public function compose($view)
    {
        $user = Auth::user();
        $user_id = $user->id; 
        $profile = Profile::where('user_id', $user_id)->firstOrFail();
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
        
        $service_count = Service::all()->count();


        $view->with('variable', '')
             ->with('courrier_valid_count', $courrier_valid_count)
             ->with('courrier_arrived_count', $courrier_arrived_count)
             ->with('courrier_type_count', $courrier_type_count)
             ->with('service_count', $service_count)
             ->with('mes_courriers_a_traite', $mes_courriers_a_traite);
    }
}