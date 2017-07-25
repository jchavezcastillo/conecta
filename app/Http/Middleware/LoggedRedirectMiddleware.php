<?php

namespace App\Http\Middleware;

use App\Model\Collections\UserGroup;
use App\Model\Subscription;
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Auth\Guard;

class LoggedRedirectMiddleware
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
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            return $next($request);
        } else {

            //estas logueado redirect segun el rol de usuario
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $logged_user_id = $this->auth->user()->user_group_id;

                $logged_user_group = UserGroup::getNameById($logged_user_id);

                //Log::info('soy:::' . $logged_user_group);

                switch ($logged_user_group) {
                    case 'admin':
                        return redirect()->route('admin.events.index');
                        break;
                    case 'cenace':
                        $this->auth->logout();
                        return redirect()->route('login');
                        break;
                    case 'emm':
                        return redirect()->route('admin.events.index');
                        break;
                    case 'licitante':
                        $subscription = Subscription::where(['subscription_by' => $this->auth->user()->id])->first();
                        if (empty($subscription->event_id) || is_null($subscription->event_id)) {
                            $this->auth->logout();
                            return redirect()->route('login');
                        } else {
                            //return redirect()->intended('/detail_event/' . $subscription->event_id);
                            // For a route with the following URI: detail_event/{event_id}
                            return redirect()->route('detail.event', [$subscription->event_id]);
                        }
                        break;
                    case 'suministrador':
                        $subscription = Subscription::where(['subscription_by' => $this->auth->user()->id])->first();
                        if (empty($subscription->event_id) || is_null($subscription->event_id)) {
                            $this->auth->logout();
                            return redirect()->route('login');
                        } else {
                            // For a route with the following URI: detail_event/{event_id}
                            return redirect()->route('detail.event', [$subscription->event_id]);
                        }
                        break;
                    case 'e-sourceing':
                        $this->auth->logout();
                        return redirect()->route('login');
                        break;
                    default:
                        // los deslogueamos y lo enviamos al login
                        $this->auth->logout();
                        return redirect()->route('login');
                        break;
                }
            }
        }
    }
}
