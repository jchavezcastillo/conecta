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
use Illuminate\Support\Facades\Log;

class RegisterCRUDController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //$this->middleware('role:partner',['except' => ['getPartners']]);
        //$this->middleware('role:partner'/*,['except' => ['getMyProfile']]*/);
    }

    /*Registro de invitados, formulario para invitar socios a eventos (conecta coparmex xalapa)*/
    public function CreateRegisterPartners()
    {
        $user = Auth::user();
        $data = Input::all();

        Log::info("data::");
        Log::info($data);

        Log::info("user::");
        Log::info($user);

        $datos = array();
        return response()->json(array(
            "success" => false
        ));
    }

    /*Registro de invitados, formulario para invitar al públio general a eventos*/
    public function CreateRegisterGuest()
    {
        $user = Auth::user();
        $data = Input::all();

        $datos = array();
        return response()->json(array(
            "success" => false
        ));
    }

}