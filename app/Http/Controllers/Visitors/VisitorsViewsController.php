<?php

namespace App\Http\Controllers\Visitors;

use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon as DateFormatter;
use Illuminate\Support\Facades\Log;

class VisitorsViewsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //$this->middleware('role:partner',['except' => ['getPartners']]);
        $this->middleware('role:partner'/*,['except' => ['getMyProfile']]*/);
    }

    /*Buscar socios*/
    public function getPartners()
    {
        $datos = array();
        return view('visitors.home', compact('datos'));
    }

    /*Mi perfil*/
    public function getMyProfile()
    {   
        Log::debug("Desde el perfil");
        $categories = Category::all();
        return view('visitors.myProfile', compact('categories'));
    }

    /*Mostrar socios marcados como favoritos*/
    public function getFavorites()
    {
        $datos = array();
        return view('visitors.favorite', compact('datos'));
    }
    

}