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
use App\Category;
use Illuminate\Support\Facades\Request;

class RegisterCRUDController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //$this->middleware('role:PARTNER',['except' => ['getPartners']]);
        //$this->middleware('role:partner'/*,['except' => ['getMyProfile']]*/);
        /*$this->middleware('role:PARTNER', ['only' => ['']]);*/
    }

    /*Registro de invitados, formulario para invitar socios a eventos (conecta coparmex xalapa ) 
    @URL register/socio
    @name register.partner
    @param input | name | example: juan mendez
    @return json*/
    public function CreateRegisterPartners()
    {
        /*$user = Auth::user();
        $data = Input::all();

        Log::info("data::");
        Log::info($data);

        Log::info("user::");
        Log::info($user);*/

        $datos = array();
        return response()->json(array(
            "success" => false
        ));
    }
    public function CreateRegisterCategory(Request $request){
        
      $data=input::all();

      Log::info("data::");
      Log::info($data);
      Log::info("request");
      DB::beginTransaction();
      try{
         $category=new category();
         $name= $category->name=$data['name'];
         $category->save();

         DB::commit();
         Log::info("registro exitoso");
      }catch(\Exception $e){
         DB::rollback();
         Log::info("se ha hecho roll back debido a la siguiente excepcion:".$e);
         return response()->json(array(
            "success" => false,
            "title" => "Aviso",
            "msg" => "Los cambios no se aplicaron",
            "datos" => $data
         ));
      }
      return response()->json(array(
         "success" => true
      ));

    }//Fin funcion

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