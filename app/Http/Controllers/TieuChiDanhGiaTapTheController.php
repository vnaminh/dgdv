<?php

namespace App\Http\Controllers;

use App\Models\TieuChiDanhGiaTapThe;
use Illuminate\Http\Request;

class TieuChiDanhGiaTapTheController extends Controller
{
    public function index()
    {
        $pagetitle = "Quản lý tiêu chí đánh giá tập thể";
        $data = TieuChiDanhGiaTapThe::all();
            // from('tieu_chi_danh_gia_tap_the')
            // ->select(['tieu_chi_danh_gia_tap_the_id', 'tieu_chi_danh_gia_tap_the_ten', 'tieu_chi_danh_gia_tap_the_active','tieu_chi_danh_gia_tap_the_active_noi_dung','tieu_chi_danh_gia_tap_the_active_danh_gia'])->get();
        return view('pages.tieuchidanhgiatapthe.index', compact('pagetitle', 'data'));
    }
    public function createTieuChiDanhGiaTapThe()
    {
        $pagetitle = "Tạo mới tiêu chí đánh giá tập thể";
        return view('pages.tieuchidanhgiatapthe.create', compact('pagetitle'));
    }

    public function storeTieuChiDanhGiaTapThe(Request $request)
    {
        try {
            $modelTieuChiDanhGiaTapThe = new TieuChiDanhGiaTapThe();
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung = $request->tcdgtaptheten;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_active = $request->tcdgtaptheactive;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung_active = $request->tcdgtaptheactivenoidung;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_danh_gia_active = $request->tcdgtaptheactivedanhgia;
            $modelTieuChiDanhGiaTapThe->save();
            return redirect()->route('tieuchidanhgiataptheManage.indexTieuChiDanhGiaTapThe')->with('success', 'Thêm mới tiêu chí thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function editTieuChiDanhGiaTapThe($id)
    {
        $pagetitle = "Chỉnh sửa tiêu chí đánh giá tập thể";
        $info = TieuChiDanhGiaTapThe::find($id);
        return view('pages.tieuchidanhgiatapthe.edit', compact('pagetitle', 'info'));
    }

    public function updateTieuChiDanhGiaTapThe(Request $request, $id)
    {
        try {
            $modelTieuChiDanhGiaTapThe = TieuChiDanhGiaTapThe::find($id);
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung = $request->tcdgtaptheten;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_active = $request->tcdgtaptheactive;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung_active = $request->tcdgtaptheactivenoidung;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_danh_gia_active = $request->tcdgtaptheactivedanhgia;
            $modelTieuChiDanhGiaTapThe->save();
            return redirect()->route('tieuchidanhgiataptheManage.indexTieuChiDanhGiaTapThe')->with('success', 'Cập nhật tiêu chí thành công! "id:'.$id.'"');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function updateTieuChiDanhGiaTapTheActive($id) {
        try {
            $modelTieuChiDanhGiaTapThe = TieuChiDanhGiaTapThe::find($id);
            $active = $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_active;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_active = $active*-1;
            $modelTieuChiDanhGiaTapThe->save();
            $submessage = $active==1?"Inactive ":"Active ";
            $mesage = 'Cập nhật tiêu chí có id='.$id.' thành '.$submessage;
            return redirect()->back()->withInput()->with('success', $mesage);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function updateTieuChiDanhGiaTapTheActiveNoiDung($id) {
        try {
            $modelTieuChiDanhGiaTapThe = TieuChiDanhGiaTapThe::find($id);
            $active = $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung_active;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_noi_dung_active = $active*-1;
            $modelTieuChiDanhGiaTapThe->save();
            $submessage = $active==1?"Inactive ":"Active ";
            $mesage = 'Cập nhật tiêu chí có id='.$id.' thành '.$submessage;
            return redirect()->back()->withInput()->with('success', $mesage);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    public function updateTieuChiDanhGiaTapTheActiveDanhGia($id) {
        try {
            $modelTieuChiDanhGiaTapThe = TieuChiDanhGiaTapThe::find($id);
            $active = $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_danh_gia_active;
            $modelTieuChiDanhGiaTapThe->tieu_chi_danh_gia_tap_the_danh_gia_active = $active*-1;
            $modelTieuChiDanhGiaTapThe->save();
            $submessage = $active==1?"Inactive ":"Active ";
            $mesage = 'Cập nhật tiêu chí có id='.$id.' thành '.$submessage;
            return redirect()->back()->withInput()->with('success', $mesage);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
