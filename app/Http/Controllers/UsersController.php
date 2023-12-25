<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $pagetitle="Quản lý người dùng";
        $data=Users::from('user')
            ->select(['user_id','user_ma','user_ho_ten','chi_bo','user_ngay_sinh','user_gioi_tinh','chuc_vu_dang',
            'chuc_vu_chinh_quyen','chuc_vu_doan_the','don_vi_cong_tac'])->get();
        return view('pages.users.index',compact('pagetitle','data'));
    }
    public function createUser(){
        $pagetitle="Tạo mới người dùng";
        return view('pages.users.create',compact('pagetitle'));
    }

    public function storeUser(Request $request ){
        try{
        $modelUser=new Users();
        $modelUser->user_ho_ten=$request->hoten;
        $modelUser->user_ma=$request->userma;
        $modelUser->chi_bo=$request->chibo;
        $modelUser->user_ngay_sinh=$request->ngaysinh;
        $modelUser->user_gioi_tinh=$request->gioitinh;
        $modelUser->chuc_vu_dang=$request->chucvudang;
        $modelUser->chuc_vu_chinh_quyen=$request->chucvuchinhquyen;
        $modelUser->chuc_vu_doan_the=$request->chucvudoanthe;
        $modelUser->don_vi_cong_tac=$request->donvicongtac;
        $modelUser->save();
        return redirect()->route('userManage.indexUser')->with('success', 'Thêm mới người dùng thành công!');
    } catch (\Exception $e) {
        echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
    }
    }
    public function editUser($id){
        $pagetitle="Chỉnh sửa thông tin người dùng";
        $info=Users::find($id);
        return view('pages.users.edit',compact('pagetitle','info'));
    }

    public function updateUser(Request $request,$id){
        try{
            $modelUser=Users::find($id);
            $modelUser->user_ho_ten=$request->hoten;
            $modelUser->user_ma=$request->userma;
            $modelUser->chi_bo=$request->chibo;
            $modelUser->user_ngay_sinh=$request->ngaysinh;
            $modelUser->user_gioi_tinh=$request->gioitinh;
            $modelUser->chuc_vu_dang=$request->chucvudang;
            $modelUser->chuc_vu_chinh_quyen=$request->chucvuchinhquyen;
            $modelUser->chuc_vu_doan_the=$request->chucvudoanthe;
            $modelUser->don_vi_cong_tac=$request->donvicongtac;
            $modelUser->save();
            return redirect()->route('userManage.indexUser')->with('success', 'Cập nhật thông tin người dùng thành công! "id:'.$id.'"');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
