<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Model\AccessLog;
use App\Model\Collections\UserGroup;
use App\Model\Subscription;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log as Logger;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon as DateFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('logged.redirect', ['except' => ['getLogout','getChangePasswordView','postChangePasswordSave']]);
        $this->middleware('role:partner', ['only' => ['getChangePasswordView', 'postChangePasswordSave']]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function postLogin()
    {
        // obtener los campos
        $data = \Request::all();
        $input_data = Input::all();

        // generar reglas de validacion
        $rules = [
            'login' => 'required|exists:users',
            'password' => 'required|exists:users'
        ];

        // override default messages
        $messages = [
            'login.required' => 'El nombre de usuario es obligatorio',
            'login.exists' => 'El nombre de usuario no coincide con nuestros registros',
            'password.required' => 'La contraseña es obligatoria',
            'password.exists' => 'La contraseña no coincide con nuestros registros'
        ];

        // crear validador
        $validator = \Validator::make($data, $rules, $messages);
        Logger::info("input_data:");
        Logger::info($input_data);

        $matchWhere = ['login' => $data['login'], 'password' => $data['password'], 'status' => 1];
        $count = User::where($matchWhere)->count();
        if ($count == 1) {
            $user = User::where($matchWhere)->first();
            Logger::info("Usuario existe.. se inicia el logueo");
            Auth::loginUsingId($user->id);
            return redirect()->route('visitors.partners');
        }else{
            Logger::info("Usuario no existe.. no se pudo loguear");
            return view('auth.login');
        }

        // validar campos
        if ($validator->fails()) {
            //no existen en la bd o son invalidos
            //return redirect(/*'site/auth/login'*/)->route('login.auth')->withErrors($validator)->withInput();
            $valid = $validator->errors()->all();
            return view('auth.login', compact('valid'));
        } else {
            $login = Request::input('login');
            $pass = Request::input('password');

            $matchWhere = ['login' => $login, 'password' => $pass, 'status' => 1];
            $count = User::where($matchWhere)->count();

            if ($count == 1) {
                $user = \App\User::where($matchWhere)->get();
                $user_id = null;
                $user_type = 0;
                foreach ($user as $u) {
                    $user_id = intval($u->id);
                    $user_type = intval($u->user_group_id);
                }

                //generamos el objeto access_log para acceder a la tabla
                $access_log = new AccessLog();

                // revisamos que usuario se logueará
                switch ($user_type) {
                    case 1:
                        // save session data after
                        Auth::loginUsingId($user_id);

                        Logger::info(get_class($this) . ' El usuario->' . $user->login . ', se ha deslogueado del sistema por medio de la liga "SALIR"::::' . UserGroup::getNameById($user->user_group_id) . '; session -> ' . Session::getId());

                        // save access log
                        /*$access_log->user_id = $user_id;
                        $access_log->session_id = Session::getId();
                        $access_log->description = UserGroup::getNameById($user_type) . ' login';
                        $access_log->access_date = DateFormatter::now()->toDateTimeString();
                        if (Request::input('ip') != '') {
                            $access_log->remote_address = Request::input('ip');
                        } else {
                            $access_log->remote_address = 'Imposible to determinate';
                        }
                        if (Request::input('host') != '') {
                            $access_log->remote_host = Request::input('host');
                        } else {
                            $access_log->remote_host = 'Imposible to determinate';
                        }
                        if (Request::input('countryName') != '') {
                            $access_log->country_name = Request::input('countryName');
                        } else {
                            $access_log->country_name = 'Imposible to determinate';
                        }
                        $access_log->save();
                        // session se crea automaticamente los registros
                        Logger::info(get_class($this) . ' El usuario->' . $login . ', se ha logueado al sistema::::' . UserGroup::getNameById($user_type) . '; session -> ' . Session::getId() . '; ip|host|country: ' . $access_log->remote_address . '|' . $access_log->remote_host . '|' . $access_log->country_name);
                        */
                        /*$subscription = Subscription::where(['subscription_by' => $user_id])->first();
                        if (empty($subscription->event_id) || is_null($subscription->event_id)) {
                            Logger::info(get_class($this) . ' El usuario->' . $user->login . ', se ha deslogueado del sistema por no contar con la suscripción al evento::::' . UserGroup::getNameById($user->user_group_id) . '; session -> ' . Session::getId());
                            // hacemos update a su access_log para saber que tipo de deslogueo se realizó
                            $access_log->description = $access_log->description . '|No subscription logout';
                            $access_log->disconnection_date = DateFormatter::now()->toDateTimeString();
                            $access_log->save();
                            Auth::logout();*/
                            //return redirect()->route('visitors.myProfile');
                            //return redirect()->route('login');
                       // } else {
                            //return redirect()->intended('/detail_event/' . $subscription->event_id);
                            //return redirect()->route('detail.event', [$subscription->event_id]);
                          //  return redirect()->route('visitors.myProfile');
                        //}
                        break;
                    default:
                        $validator->errors()->add('failed', 'El usuario no tiene asignado un perfil.' . $user_type);
                        $valid = $validator->errors()->all();
            			return view('auth.login', compact('valid'));
                        //return redirect('site/auth/login')->withErrors($validator)->withInput();
                        break;
                }
            } else {
                //no autorizado por status
                $validator->errors()->add('failed', 'Estas credenciales no coinciden con nuestros registros aprobados.');
                $valid = $validator->errors()->all();
            	return view('auth.login', compact('valid'));
                ///return redirect('site/auth/login')->withErrors($validator)->withInput();
            }
        }
    }

    public function getLogin()
    {
        //$user = Auth::all();
        $user = Auth::user();
        Logger::info("Aquí........user::");
        Logger::info($user);

    	$valid = [];
        return view('auth.login', compact('valid'));
    }

    public function getSession()
    {
        return view('auth.login');
    }

    public function getLogout($user_id)
    {
        // obtenemos el user
        $user = User::find($user_id);
        if (Auth::check()) {

            // hacemos update a su access_log para saber que tipo de deslogueo se realizó
            /*$current_access_log = AccessLog::where('session_id', '=', Session::getId())->first();
            if (!empty($current_access_log) && !is_null($current_access_log)) {
                $current_access_log->description = $current_access_log->description . '|Normal logout';
                $current_access_log->disconnection_date = DateFormatter::now()->toDateTimeString();
                $current_access_log->save();
            } else {
                Logger::info(get_class($this) . ' El usuario->' . $user->login . ',  ha dado click en la liga "SALIR"::::' . UserGroup::getNameById($user->user_group_id) . '; pero su session ya habia finalizado por inactividad; esperar session garbage collector');
            }*/

            //este sleep es para que de tiempod e imprimir el emnsaje en logs
            //sleep(1);
            //if (Auth::check()) {

                Logger::info(get_class($this) . ' El usuario->' . $user->login . ', se ha deslogueado del sistema por medio de la liga "SALIR"::::' . UserGroup::getNameById($user->user_group_id) . '; session -> ' . Session::getId());
                Auth::logout();
           // }

            return redirect()->route('login');
        } else {
            Logger::info(get_class($this) . ' El usuario->' . $user->login . ',  ha dado click en la liga "SALIR"::::' . UserGroup::getNameById($user->user_group_id) . '; pero su session ya habia finalizado por inactividad; esperar session garbage collector');

            return redirect()->route('login');
        }

    }
	
	public function getChangePasswordView()
	{
		$valid = [];
		return view('licitante.edit_profile.edit_password', compact('valid'));
	}
	
	public function postChangePasswordSave()
	{
		$data = \Request::all();
		$password = $data['password'];
		$confirm_pass = $data['confirm_password'];
		
		if(is_null($password) || is_null($confirm_pass) || $password == "" || $confirm_pass == "")
		{
			$valid = ["false_empty"];
			return view('licitante.edit_profile.edit_password', compact('valid'));	
		}
		if($password != $confirm_pass)
		{
			$valid = ["false_equals"];
			return view('licitante.edit_profile.edit_password', compact('valid'));
		}
		
		DB::beginTransaction();
		$user = Auth::user();
		try
		{
			$old_password = $user->password; 
			$user->password = $password;
			$user->save();
			
			DB::commit();
			Logger::info(get_class($this) . ' El usuario id ->' . $user->id . ' ha realizado el cambio de su contraseña. Original:: '.$old_password.' Nuevo :: '.$password);
		
			$valid = ["success"];
			return view('licitante.edit_profile.edit_password', compact('valid'));
		}
		catch (\Exception $e) {
            //LOG
            Logger::error(get_class($this) . ' Error al insertar en BD el cambio de la contraseña del usuario id:: '.$user->id.' se genera un rollback del query: ' . $e);

            //rollback
            DB::rollback();

            $valid = ["error"];
			return view('licitante.edit_profile.edit_password', compact('valid'));
        }
	}
}
