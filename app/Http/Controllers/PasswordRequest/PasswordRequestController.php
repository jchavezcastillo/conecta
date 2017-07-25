<?php
namespace App\Http\Controllers\PasswordRequest;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\User;
use Illuminate\Support\Facades\Log as Log;
use Illuminate\Support\Facades\Config;
use Input;
use Request;

class PasswordRequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('logged.redirect');
    }

    public function request()
    {
        $valid = true;
        $msg_log = array();
        $data = Input::all();

        if (User::where('email', '=', $data['email'])->where('status', '=', 1)->exists()) {
            $valid = true;
            $user = User::where('email', '=', $data['email'])->where('status', '=', 1)->first();

			//obtenemos el cco
			$cco_email = Config::get('mail.cco_recipient');

            //para enviar la data al correo que queremos
            $request = new \stdClass();
            $request->email = $user->email;
			$request->cco = $cco_email;

            /*$name = $user->name . ' ' . $user->last_name . ' ' . $user->maiden_name;
            //$email = $user->email;
            $email = $user->login;
            $pwd = $user->password;*/

            //obtenemos los usuarios que contengan ese correo
            $users = User::where('email', '=', $data['email'])->where('status', '=', 1)->get();

            foreach ($users as $user) {
                $company = Company::find($user->company_id);

                if (is_null($company)) {
                    $user->razon_social = "---";
                } else {
                    $user->razon_social = $company->name;
                }
            }

            try {
                \Mail::send('emails.passwordRequest.password_request', compact('users'), function ($message) use ($request) {
                    $message->to($request->email)->subject('Recuperación de contraseña');
					if (!is_null($request->cco) && !empty($request->cco)) {
					   $message->bcc($request->cco);
					}
                });
            } catch (\Exception $e) {
                Log::error(get_class($this) . ' Error al enviar el correo electronico password request:::: ' . $e);
                $valid = false;
                array_push($msg_log, 'Algo salió mal...');
            }
        } else {
            $valid = false;
            array_push($msg_log, 'El correo no existe o aún no ha sido aprobado en el sistema');
        }

        if ($valid) {
            return [
                'success' => true,
            ];
        } else {
            return [
                'success' => false,
                'msg' => $msg_log
            ];
        }
    }
}
