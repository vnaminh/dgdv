<?php


namespace App\Classes\Helper;


use App\Models\QLMenu;
use Route;
use Auth;

class KiemQuyen
{
    public static function checkPermission()
    {
        if (!session()->has('UserPermission_' . config('app.__APP_NAME'))) {
            $nguoiDungLogin = Auth::guard('user')->user()->user_id;
            $roles = QLMenu::getRolesbyUserId(config('app.__APP_NAME'),$nguoiDungLogin);
            session()->put('UserPermission_'.config('app.__APP_NAME'),$roles);
        }
        $roles = session()->get('UserPermission_'.config('app.__APP_NAME'));

        $id_hddt = config('app.HDDT_Mac_Dinh_Phan_Quyen');
        $per = FALSE;
        if (!empty($roles)) {
            if (isset($roles[0]) && !empty($roles[0])) {
                $roles = $roles[0];
            } else if (isset($roles[$id_hddt]) && !empty($roles[$id_hddt])) {
                $roles = $roles[$id_hddt];
            } else
                return $per;

            $request = Request();
            $controller = config('app.__APP_PATH') . $request->getPathInfo();
            $uri = Route::getCurrentRoute()->uri();
            $uri = substr($uri, 0, strpos($uri, '/{'));

            $controllerTMP = config('app.__APP_PATH') . '/' . $uri;
            if ($uri != "") {
                $controller = $controllerTMP;
            }
            $action = explode("@", Route::currentRouteAction());
            $action = $action[1];
            $public_action = explode('_', $action);

            $controller = str_replace("/" . $action, '', $controller);

            if ($public_action[0] == "public") {
                $controller = str_replace("/" . $action, '', $controller);
            }

            define('__APP_CONTROLLER', $controller);
            define('__APP_ACTION', $action);
            foreach ($roles as $k => $v) {
                if (isset($v['controller']) && $v['controller'] == $controller) {
                    if (isset($v['action']) && $v['action'] == $action) {
                        $per = TRUE;
                    }
                }
            }
            if ($public_action[0] == "public") {
                $per = TRUE;
            }
        }
        return $per;
    }
}
