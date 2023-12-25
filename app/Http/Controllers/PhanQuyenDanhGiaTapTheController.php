<?php

namespace App\Http\Controllers;

use App\Models\NhomTapThe;
use App\Models\PhanQuyenDanhGiaTapThe;
use App\Models\QLUser;
use Illuminate\Http\Request;

class PhanQuyenDanhGiaTapTheController extends Controller
{
    public function index(){
        $pagetitle="Quản lý phân quyền nhóm tập thể";
        $data=PhanQuyenDanhGiaTapThe::from('phan_quyen_danh_gia_tap_the as phanquyen')
            ->select(['phanquyen.phan_quyen_danh_gia_tap_the_id','ql_user.user_id','nhom.nhom_tap_the_id','ql_user.user_ho_ten','nhom.nhom_tap_the_ten'])
            ->leftJoin('ql_user',function ($join) {
                $join->on('ql_user.user_id', '=', 'phanquyen.user_id');
            })
            ->leftJoin('nhom_tap_the as nhom',function ($join) {
                $join->on('nhom.nhom_tap_the_id', '=', 'phanquyen.nhom_tap_the_id');
            })->get();
        return view('pages.phanquyennhomtapthe.index',compact('pagetitle','data'));
    }
    public function createPhanQuyenDanhGiaTapThe(){
        $pagetitle="Tạo mới phân quyền nhóm tập thể";
        $datanhom=NhomTapThe::from("nhom_tap_the")
            ->select(["nhom_tap_the_id","nhom_tap_the_ten"])->get();
        $datauser_=QLUser::from("ql_user")
            ->select(["ql_user_id","user_ho_ten"])->get();
        return view('pages.phanquyennhomtapthe.create',compact('pagetitle','datanhom','datauser_'));
    }

    public function storePhanQuyenDanhGiaTapThe(Request $request ){
        try{
            $modelphan_quyen_nhom_tap_the=new PhanQuyenDanhGiaTapThe();
            $modelphan_quyen_nhom_tap_the->tai_khoan_id=$request->user_id;
            $modelphan_quyen_nhom_tap_the->nhom_tap_the_id=$request->nhomtaptheid;
            $modelphan_quyen_nhom_tap_the->save();
            return redirect()->route('phanquyendanhgiataptheManage.indexPhanQuyenDanhGiaTapThe');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editPhanQuyenDanhGiaTapThe($id){
        $pagetitle="Chỉnh sửa phân quyền nhóm tập thể";
        $info=PhanQuyenDanhGiaTapThe::find($id);
        $infouser_=QLUser::find($info->user_id);
        $infonhom=NhomTapThe::find($info->nhom_tap_the_id);
        $datanhom=NhomTapThe::from("nhom_tap_the")
            ->select(["nhom_tap_the_id","nhom_tap_the_ten"])->get();
        $datauser_=QlUser::from("ql_user")
            ->select(["user_id","user_ho_ten"])->get();

        return view('pages.phanquyennhomtapthe.edit',compact('pagetitle','info','infonhom','infouser_','datanhom','datauser_'));
    }

    public function updatePhanQuyenDanhGiaTapThe(Request $request,$id){
        try{
            $modelphan_quyen_nhom_tap_the=PhanQuyenDanhGiaTapThe::find($id);
            $modelphan_quyen_nhom_tap_the->tai_khoan_id=$request->user_id;
            $modelphan_quyen_nhom_tap_the->nhom_tap_the_id=$request->nhomtaptheid;
            $modelphan_quyen_nhom_tap_the->save();
            return redirect()->route('phanquyendanhgiataptheManage.indexPhanQuyenDanhGiaTapThe');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
