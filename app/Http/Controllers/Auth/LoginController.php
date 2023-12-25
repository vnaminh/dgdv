<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Helper\DungChung;
use App\Classes\Helper\Util;
use App\Http\Controllers\Controller;
use App\Models\NhomQuyen;
use App\Models\Nv_LDAP;
use App\Models\QLUser;
use App\Models\ThongTinNhanVien;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //    use AuthenticatesUsers;

    //    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:user')->except('logout');
//    }

    public function showFormLogin()
    {
        // session()->flush();
        $page_title = 'Đăng nhập';
        return view('login', compact('page_title'));
    }

    public function username()
    {
        return 'user_name';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    protected function validateLogin(Request $request)
    {
        try {
            $rules = [
                $this->username() => 'required|string',
                'password' => 'required|string',
            ];

            $customMessages = [
                'user_name.required' => trans('validation.required_user'),
                'password.required' => trans('validation.required_password'),
            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);
            return $validator;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function autoLogin(Request $request)
    {
        try {

            if ($request->getMethod() == 'GET') {
                return view('login');
            }

            $validator = $this->validateLogin($request);
            if ($validator->fails()) {
                return redirect(route('login'))
                    ->withErrors($validator->errors())
                    ->withInput();
            }

            // $mLDAP = new Nv_LDAP();
            // $mLDAP->DongBoDuLieuNguoiDung();

            $user_name = $request->user_name;
            // $password = $request->password;
            // $userInfo = new USER();

            // if (!$this->chungthucLDAP($user_name, $password)) {
            //     $rs = $userInfo->authenticate($user_name, md5(md5($password)));
            //     if (!$rs['aut']) {
            //         $notification = array(
            //             'message' => 'Tài khoản hoặc mật khẩu không hợp lệ!',
            //             'alert-type' => 'error'
            //         );
            //         return redirect()->route('login')->with($notification);
            //     }
            // }

            $user = QLUser::where(['user_name' => $user_name])->first();

            if ($user) {

                $hethong_ngay = date('d', time());
                $hethong_thang = date('m', time());
                $hethong_nam = date('Y', time());

                session()->put("ngayhientai", $hethong_ngay);
                session()->put("thanghientai", $hethong_thang);
                session()->put("namhientai", $hethong_nam);

                $quyen = NhomQuyen::from("nhom_quyen")->where("nhom_quyen_id", $user->nhom_quyen_id)->first();
                session()->put("quyen", $quyen->nhom_quyen_level);

                $idNguoiDung = QLUser::where("user_name",'=',$user_name)->first()->user_id;
                // $this->guard('user')->login($user);
                // thong tin nguoi dung
                $infoUser = ThongTinNhanVien::where('user_id', $idNguoiDung)->first();

                session()->put('loginUserID', $idNguoiDung);
                session()->put('loginUserHoTen', $infoUser->user_ho_ten);

                session()->put("user_id", $user->user_id);
                session()->put("userhoten", $infoUser->user_ho_ten);

                //thong tin thang nam
                // $hethong_ngay = date('d',time());
                // $hethong_thang = date('m',time());
                // $hethong_nam = date('Y',time());

                // $set_ThangHienTai = $hethong_thang;
                // $set_NamHienTai = $hethong_nam;
                // if($hethong_ngay > '20'){
                //     if($hethong_thang == '12'){
                //         $set_ThangHienTai = '01';
                //         $set_NamHienTai = (string)((int)$hethong_nam + 1);
                //     }else{
                //         if((string)((int)($hethong_thang + 1) < 10 )){
                //             $set_ThangHienTai = '0'.(string)((int)$hethong_thang + 1);
                //         }else {
                //             $set_ThangHienTai = (string)((int)$hethong_thang + 1);
                //         }
                //         $set_NamHienTai = $hethong_nam;
                //     }
                // }

                // session()->put('thangHienTai', $set_ThangHienTai);
                // session()->put('namHienTai', $set_NamHienTai);
                // session()->put('thangNamHienTai', $set_ThangHienTai.$set_NamHienTai);

                return redirect()->route('trang-chu');
            }
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @abstract Khai báo hàm chứng thực tài khoản theo host LDAP đồng bộ từ khung qua
     * @param string $user
     * @param type $pass
     * @return boolean
     */
    private function chungthucLDAP($user, $pass)
    {
        $user_login = $user;
        $pass_login = $pass;

        $user = $user . '@' . config('ldap.__BIND_RDN_LDAP');
        $connect = ldap_connect(config('ldap.__HOSTNAME_LDAP'), config('ldap.__PORT_LDAP'));

        ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
        if ($connect) {
            if ($user == NULL || $pass == NULL) {
                //echo "Phải nhập tài khoản";
                return false;
            } else {
                //kết nối LDAP với tài khoản admin đối với cusc
                ldap_bind($connect, config('ldap.__ADMIN_USERNAME_LDAP'), config('ldap.__ADMIN_PASS_LDAP'));
                //lấy thông tin của tài khoản đăng nhập
                $filter_username = "(sAMAccountName=$user_login)";
                $result = ldap_search($connect, config('ldap.__BIND_RDN_LDAP'), $filter_username);
                $info = ldap_get_entries($connect, $result);
                //lấy distinguishedName
                $cn = isset($info[0]['dn']) ? $info[0]['dn'] : '';


                //xác thực mật khẩu của người dùng

                if ($cn != '') {
                    $res_login = @ldap_bind($connect, $cn, $pass_login);
                    return $res_login;
                } else {
                    return false;
                }
            }
            ldap_close($connect);
        } else {
            return false;
        }
    } // end function chungthucLDAP

    protected function guard()
    {
        return Auth::guard('user');
    }

    public static function checkLogin()
    {
        if (session()->has('user_id')) {
            return true;
        } else {
            return false;
        }
    }
}
