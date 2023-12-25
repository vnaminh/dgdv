<?php

namespace App\Http\Controllers;

use App\Models\CamKet;
use App\Models\ThoiGianDanhGiaTuKiemDiem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Validator;
class ThoiGianDanhGiaTuKiemDiemController extends Controller
{
    public function index()
    {
        $pagetitle = "QUẢN LÝ THỜI GIAN ĐÁNH GIÁ - TỰ KIỂM ĐIỂM";
        $data = ThoiGianDanhGiaTuKiemDiem::all()->first();
        $data->thoi_gian_danh_gia_tu_kiem_diem_dang_vien = Carbon::createFromFormat('Y-m-d', $data->thoi_gian_danh_gia_tu_kiem_diem_dang_vien)->format('d/m/Y');
        $data->thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi = Carbon::createFromFormat('Y-m-d', $data->thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi)->format('d/m/Y');
        $data->thoi_gian_danh_gia_tu_kiem_diem_chi_bo = Carbon::createFromFormat('Y-m-d', $data->thoi_gian_danh_gia_tu_kiem_diem_chi_bo)->format('d/m/Y');
        $data->thoi_gian_danh_gia_tu_kiem_diem_chi_uy = Carbon::createFromFormat('Y-m-d', $data->thoi_gian_danh_gia_tu_kiem_diem_chi_uy)->format('d/m/Y');
        return view('pages.thoigiandanhgia_tukiemdiem.index', compact('pagetitle', 'data'));
    }

    // public function create()
    // {
    //     $pagetitle = "Thêm mới thời gian đánh giá - Tự kiểm điểm";
    //     return view('pages.thoigiandanhgia_tukiemdiem.create', compact('pagetitle'));
    // }

    // public function store()
    // {
    //     return redirect()->route('thoigiandanhgiaManage.index');
    // }

    public function edit()
    {
        $pagetitle = "QUẢN LÝ THỜI GIAN ĐÁNH GIÁ - TỰ KIỂM ĐIỂM";
        $page_name = "Chỉnh sửa thời gian đánh giá";
        $data_loai = ['', 'thoi_gian_danh_gia_tu_kiem_diem_dang_vien', 'thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi',
                    'thoi_gian_danh_gia_tu_kiem_diem_chi_bo', 'thoi_gian_danh_gia_tu_kiem_diem_chi_uy'];
        $data = ThoiGianDanhGiaTuKiemDiem::all()->first();
        return view('pages.thoigiandanhgia_tukiemdiem.edit', compact('page_name', 'pagetitle', 'data'));
    }

    public function update(Request $request)
    {
        $data = ThoiGianDanhGiaTuKiemDiem::all()->first();
        $data->thoi_gian_danh_gia_tu_kiem_diem_dang_vien = $request->thoigiandanhgiadangvien;
        $data->thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi = $request->thoigiandanhgialanhdao;
        $data->thoi_gian_danh_gia_tu_kiem_diem_chi_bo = $request->thoigiandanhgiachibo;
        $data->thoi_gian_danh_gia_tu_kiem_diem_chi_uy = $request->thoigiandanhgiachiuy;
        $data->save();
        return redirect()->route('thoigiandanhgiaManage.index');
    }
}
