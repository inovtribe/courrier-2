<?php 
namespace App\Composers;

use App\Courrier;

class NavComposer
{
    public function compose($view)
    {
        $courrier_valid_count = Courrier::where('destinator_id', null)
                                          ->where('valid', true)
                                          ->count();
        $courrier_arrived_count = Courrier::where('destinator_id', null)
                                          ->where('initiate_service_id', null)
                                          ->where('service_dealing_id', null)
                                          ->where('valid', false)
                                          ->where('category', 'arrived')
                                          ->count();
        $view->with('variable', '')
             ->with('courrier_valid_count', $courrier_valid_count)
             ->with('courrier_arrived_count', $courrier_arrived_count);
    }
}