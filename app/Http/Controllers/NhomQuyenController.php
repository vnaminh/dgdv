<?php

namespace App\Http\Controllers;

use App\Models\NhomQuyen;
use Illuminate\Http\Request;

class NhomQuyenController extends Controller
{
    public function index(){
        $pagetitle="Quản lý nhóm quyền";
        $data=NhomQuyen::from('nhom_quyen')
            ->select(['nhom_quyen_id','nhom_quyen_ten','nhom_quyen_level'])->get();
        return view('pages.nhomquyen.index',compact('pagetitle','data'));
    }
    public function createNhomQuyen(){
        $pagetitle="Tạo mới nhóm quyền";
        return view('pages.nhomquyen.create',compact('pagetitle'));
    }

    public function storeNhomQuyen(Request $request ){
        try{
            $modelnhom_quyen=new NhomQuyen();
            $modelnhom_quyen->nhom_quyen_ten=$request->ten;
            $modelnhom_quyen->nhom_quyen_level=$request->level;
            $modelnhom_quyen->save();
            return redirect()->route('nhomquyenManage.indexNhomQuyen')->with('success', 'Thêm mới nhóm quyền thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editNhomQuyen($id){
        $pagetitle="Chỉnh sửa nhóm quyền";
        $info=NhomQuyen::find($id);
        return view('pages.nhomquyen.edit',compact('pagetitle','info'));
    }

    public function updateNhomQuyen(Request $request,$id){
        try{
            $modelnhom_quyen=NhomQuyen::find($id);
            $modelnhom_quyen->nhom_quyen_ten=$request->ten;
            $modelnhom_quyen->nhom_quyen_level=$request->level;
            $modelnhom_quyen->save();
            return redirect()->route('nhomquyenManage.indexNhomQuyen')->with('success', 'Cập nhật nhóm quyền thành công! "id:'.$id.'"');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
