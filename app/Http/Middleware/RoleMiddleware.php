<?php

namespace App\Http\Middleware;

use App\Model\Collections\UserGroup;
use Closure;
use Illuminate\Contracts\Auth\Guard;

//use Illuminate\Support\Facades\Log as Log;

class RoleMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        //revisamos primero si esta logueado
        if ($this->auth->guest()) {
            //un ajax request lo mandamos a volar
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                //de otro modo lo redirigimos a loguearse
                return redirect()->route('session');
            }
        } else {
            //estamos logueados
            $current_role = $this->auth->user()->user_group_id;

            //Log::info('este es el usuario logueado: ' . $current_role . '----');

            $continue = false;

            foreach ($roles as $auth_role) {
                $role_id = UserGroup::getIdByName($auth_role);
                //Log::info('role for ' . $auth_role . ': ' . $role_id);
                //comparar si existe en los roles autorizados para seguir
                if ($current_role == $role_id) {
                    $continue = true;
                    break;
                }
            }

            if ($continue) {
                //estas autorizado pasa a lo siguiente [middlweare, request, etc]
                return $next($request);
            } else {
                //no estas autorizado
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    //lo regresamos a la pantalla anterior ya que esta logueado y no queremos que pierda sus campos
                    return redirect()->back()->withInput();
                }
            }
        }
    }
}
