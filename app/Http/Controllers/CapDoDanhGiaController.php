<?php

namespace App\Http\Controllers;

use App\Models\CapDoDanhGia;
use Illuminate\Http\Request;

class CapDoDanhGiaController extends Controller
{
    public function index(){
        $pagetitle="Quản lý cấp độ đánh giá";
        $data=CapDoDanhGia::from('cap_do_danh_gia')
            ->select(['cap_do_danh_gia_id', 'cap_do_danh_gia_ten'])->get();
        return view('pages.capdodanhgia.index', compact('pagetitle','data'));
    }

    public function createCapDoDanhGia(){
        $pagetitle="Tạo mới cấp độ đánh giá";
        return view('pages.capdodanhgia.create',compact('pagetitle'));
    }

    public function storeCapDoDanhGia(Request $request ){
        try{
            $modelcap_do_danh_gia=new CapDoDanhGia();
            $modelcap_do_danh_gia->cap_do_danh_gia_ten=$request->ten;
            $modelcap_do_danh_gia->save();
            return redirect()->route('capdodanhgiaManage.indexCapDoDanhGia')->with('success', 'Thêm mới cấp độ đánh giá thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editCapDoDanhGia($id){
        $pagetitle="Chỉnh sửa cấp độ đánh giá";
        $info=CapDoDanhGia::find($id);
        return view('pages.capdodanhgia.edit',compact('pagetitle','info'));
    }

    public function updateCapDoDanhGia(Request $request,$id){
        try{
            $modelcap_do_danh_gia=CapDoDanhGia::find($id);
            $modelcap_do_danh_gia->cap_do_danh_gia_ten=$request->ten;
            $modelcap_do_danh_gia->save();
            return redirect()->route('capdodanhgiaManage.indexCapDoDanhGia')->with('success', 'Cập nhật cấp độ đánh giá thành công! "id:'.$id.'"');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
