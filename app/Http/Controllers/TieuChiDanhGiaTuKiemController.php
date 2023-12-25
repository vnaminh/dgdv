<?php

namespace App\Http\Controllers;

use App\Models\NhomQuyen;
use App\Models\TieuChiDanhGiaTuKiem;
use Illuminate\Http\Request;

class TieuChiDanhGiaTuKiemController extends Controller
{
    public function index()
    {
        $pagetitle = "QUẢN LÝ TIÊU CHÍ ĐÁNH GIÁ TỰ KIỂM ĐIỂM";
        $data = TieuChiDanhGiaTuKiem::all();
        return view('pages.tieuchidanhgiatukiemdiem.qltieuchi.index', compact('pagetitle', 'data'));
    }
    public function createTieuChiDanhGiaTuKiem()
    {
        $pagetitle = "QUẢN LÝ TIÊU CHÍ ĐÁNH GIÁ TỰ KIỂM ĐIỂM";
        $quyen = NhomQuyen::all();
        return view('pages.tieuchidanhgiatukiemdiem.qltieuchi.create', compact('pagetitle', 'quyen'));
    }

    public function storeTieuChiDanhGiaTuKiem(Request $request)
    {
        try {
            $modelTieuChiDanhGiaTuKiem = new TieuChiDanhGiaTuKiem();
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_noi_dung = $request->tcdgtukiemten;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_active = $request->tcdgtukiemactive;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_noi_dung_active = $request->tcdgtukiemnoidungactive;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_danh_gia_active = $request->tcdgtukiemdanhgiaactive;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_quyen = $request->quyen;
            $modelTieuChiDanhGiaTuKiem->save();
            return redirect()->route('tieuchidanhgiatukiemManage.indexTieuChiDanhGiaTuKiem')->with('seccuess', 'Thêm mới tiêu chí thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editTieuChiDanhGiaTuKiem($id)
    {
        $pagetitle = "QUẢN LÝ TIÊU CHÍ ĐÁNH GIÁ TỰ KIỂM ĐIỂM";
        $info = TieuChiDanhGiaTuKiem::from('tieu_chi_danh_gia_tu_kiem')
            ->where('tieu_chi_danh_gia_tu_kiem_id', $id)
            ->leftJoin('nhom_quyen', 'tieu_chi_danh_gia_tu_kiem.tieu_chi_danh_gia_tu_kiem_quyen', 'nhom_quyen.nhom_quyen_level')
            ->get()->first();
        // dd($info);
        $quyen = NhomQuyen::all();
        return view('pages.tieuchidanhgiatukiemdiem.qltieuchi.edit', compact('pagetitle', 'info', 'quyen'));
    }

    public function updateTieuChiDanhGiaTuKiem(Request $request, $id)
    {
        try {
            $modelTieuChiDanhGiaTuKiem = TieuChiDanhGiaTuKiem::find($id);
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_noi_dung = $request->tcdgtukiemnoidung;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_noi_dung_active = $request->tcdgtukiemnoidungactive;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_danh_gia_active = $request->tcdgtukiemdanhgiaactive;
            if ($request->tcdgtukiemnoidungactive==-1 && $request->tcdgtukiemdanhgiaactive==-1)
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_active = -1;
            else $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_active = $request->tcdgtukiemactive;
            $modelTieuChiDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_quyen = $request->quyen;
            $modelTieuChiDanhGiaTuKiem->save();
            return redirect()->route('tieuchidanhgiatukiemManage.indexTieuChiDanhGiaTuKiem')->with('seccess', 'Cập nhật tiêu chí thành công! "id:'.$id.'"');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function updateTieuChiDanhGiaTuKiemActive($id) {
        try {
            $modelTieuChiDanhGiaTuKiem = TieuChiDanhGiaTuKiem::find($id);
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
