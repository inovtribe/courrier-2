<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Courrier;
use App\Service;
use App\Type;
use App\Contact;
use App\Profile;
use App\AtachedFile;



class CourrierUserController extends Controller
{
    //
    public function __construct()
    {
        View::composers([
            'App\Composers\NavComposer' => ['layouts.nav']
        ]);
    }
}
