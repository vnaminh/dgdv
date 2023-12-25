<?php

namespace App\Http\Controllers;

use App\Models\NhomTapThe;
use Illuminate\Http\Request;

class NhomTapTheController extends Controller
{
    public function index(){
        $pagetitle="QUẢN LÝ NHÓM TẬP THỂ";
        $page_name="Danh sách nhóm tập thể";
        $data=NhomTapThe::from('nhom_tap_the')
            ->select(['nhom_tap_the_id','nhom_tap_the_ten'])->get();
        return view('pages.nhomtapthe.index',compact('pagetitle','data', 'page_name'));
    }
    public function createNhomTapThe(){
        $pagetitle="QUẢN LÝ NHÓM TẬP THỂ";
        $page_name="Tạo mới nhóm tập thể";
        return view('pages.nhomtapthe.create',compact('pagetitle','page_name'));
    }

    public function storeNhomTapThe(Request $request ){
        try{
            $modelnhom_tap_the=new NhomTapThe();
            $modelnhom_tap_the->nhom_tap_the_ten=$request->ten;
            $modelnhom_tap_the->save();
            return redirect()->route('nhomtaptheManage.indexNhomTapThe');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editNhomTapThe($id){
        $pagetitle="QUẢN LÝ NHÓM TẬP THỂ";
        $page_name="Chỉnh sửa nhóm tập thể";
        $info=NhomTapThe::find($id);
        return view('pages.nhomtapthe.edit',compact('pagetitle','info','page_name'));
    }

    public function updateNhomTapThe(Request $request,$id){
        try{
            $modelnhom_tap_the=NhomTapThe::find($id);
            $modelnhom_tap_the->nhom_tap_the_ten=$request->ten;
            $modelnhom_tap_the->save();
            return redirect()->route('nhomtaptheManage.indexNhomTapThe');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
