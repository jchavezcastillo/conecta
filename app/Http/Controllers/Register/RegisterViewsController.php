<?php

namespace App\Http\Controllers\Register;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon as DateFormatter;

class RegisterViewsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //$this->middleware('role:partner',['except' => ['getPartners']]);
        //$this->middleware('role:partner'/*,['except' => ['getMyProfile']]*/);
    }

    /*Registro de invitados, formulario para invitar socios a eventos (conecta coparmex xalapa)*/
    public function getRegisterPartners()
    {
        $datos = array();
        return view('register.register-partner', compact('datos'));
    }

    /*Registro de invitados, formulario para invitar al públio general a eventos*/
    public function getRegisterGuest()
    {
        $datos = array();
        return view('register.register-guest', compact('datos'));
    }

}