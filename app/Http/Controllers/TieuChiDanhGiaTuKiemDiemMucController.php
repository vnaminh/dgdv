<?php

namespace App\Http\Controllers;

use App\Models\NhomQuyen;
use App\Models\TieuChiDanhGiaTuKiemMuc;
use Illuminate\Http\Request;

class TieuChiDanhGiaTuKiemDiemMucController extends Controller
{
    public function index()
    {
        $pagetitle = "QUẢN LÝ MỤC TIÊU CHÍ ĐÁNH GIÁ - TỰ KIỂM ĐIỂM";
        $data = TieuChiDanhGiaTuKiemMuc::all();
        return view('pages.tieuchidanhgiatukiemdiem.qlmuc.index', compact('pagetitle', 'data'));
    }
    public function createMuc()
    {
        $pagetitle = "QUẢN LÝ TIÊU CHÍ ĐÁNH GIÁ TỰ KIỂM ĐIỂM";
        $quyen = NhomQuyen::all();
        return view('pages.tieuchidanhgiatukiemdiem.qlmuc.create', compact('pagetitle', 'quyen'));
    }

    public function storeMuc(Request $request)
    {
        try {
            $mMuc = new TieuChiDanhGiaTuKiemMuc();
            $mMuc->tieu_chi_danh_gia_tu_kiem_diem_muc_ten = $request->tenmuc;
            $mMuc->tieu_chi_danh_gia_tu_kiem_diem_muc_active = $request->trangthai;
            $mMuc->has_noi_dung = $request->trangthainoidung;
            $mMuc->has_danh_gia = $request->trangthaidanhgia;
            $mMuc->nhom_quyen_id = $request->quyen;
            $mMuc->save();
            return redirect()->route('tieuchidanhgiatukiemmucManage.index')->with('seccuess', 'Thêm mới mục thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editMuc($id)
    {
        $pagetitle = "QUẢN LÝ TIÊU CHÍ ĐÁNH GIÁ TỰ KIỂM ĐIỂM";
        $info = TieuChiDanhGiaTuKiemMuc::from('tieu_chi_danh_gia_tu_kiem_diem_muc')
            ->where('tieu_chi_danh_gia_tu_kiem_diem_muc_id', $id)
            ->leftJoin('nhom_quyen', 'tieu_chi_danh_gia_tu_kiem_diem_muc.nhom_quyen_id', 'nhom_quyen.nhom_quyen_id')
            ->get()->first();
        // dd($info);
        $quyen = NhomQuyen::all();
        return view('pages.tieuchidanhgiatukiemdiem.qlmuc.edit', compact('pagetitle', 'info', 'quyen'));
    }

    public function updateMuc(Request $request, $id)
    {
        try {
            $mMuc = TieuChiDanhGiaTuKiemMuc::find($id);
            $mMuc->tieu_chi_danh_gia_tu_kiem_diem_muc_ten = $request->tenmuc;
            $mMuc->tieu_chi_danh_gia_tu_kiem_diem_muc_active = $request->trangthai;
            $mMuc->has_noi_dung = $request->trangthainoidung;
            $mMuc->has_danh_gia = $request->trangthaidanhgia;
            $mMuc->nhom_quyen_id = $request->quyen;
            $mMuc->save();
            return redirect()->route('tieuchidanhgiatukiemmucManage.index')->with('success', 'Cập nhật mục ID='.$id.' thành công! ');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function updateMucActive($id) {
        try {
            $modelTieuChiDanhGiaTuKiem = TieuChiDanhGiaTuKiemMuc::find($id);
            $active = $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_active;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_active = $active*-1;
            $modelTieuChiDanhGiaTuKiem->save();
            $submessage = $active==1?"Inactive ":"Active ";
            $mesage = 'Cập nhật tiêu chí có id='.$id.' thành '.$submessage;
            return redirect()->back()->withInput()->with('success', $mesage);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
