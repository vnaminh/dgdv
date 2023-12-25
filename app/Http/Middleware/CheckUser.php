<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;
use DB;
use Redirect;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'user')
    {

        if (Auth::guard($guard)->check()) {
            $auth = $request->getPathInfo();
            $controller = config('app.__APP_PATH') . $request->getPathInfo();
            $uri = Route::getCurrentRoute()->uri();
            $uri = substr($uri, 0, strpos($uri, '/{'));
            $controllerTMP = config('app.__APP_PATH') . '/' . $uri;

            if ($uri != "") {
                $controller = $controllerTMP;
            }
            $action = explode("@", Route::currentRouteAction());
            $action = $action[1];

            $controller = str_replace("/" . $action, '', $controller);

            return $next($request);
        } else {
            $url = explode('/', url('/'));
            $fullUrl = $url[0] . '//' . $url[1] . $url[2];
            return Redirect::to($fullUrl);
        }
    }
}
