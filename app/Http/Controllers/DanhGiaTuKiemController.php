<?php

namespace App\Http\Controllers;

use App\Models\DanhGiaTuKiem;
use App\Models\TieuChiDanhGiaTuKiem;
use App\Models\CapDoDanhGia;
use Illuminate\Http\Request;
use Validator;

class DanhGiaTuKiemController extends Controller
{
    public function index()
    {
        $pagetitle = "Đánh giá Đảng viên - Phần tự kiểm";
        $tieuchi = TieuChiDanhGiaTuKiem::from('tieu_chi_danh_gia_tu_kiem')
            ->where("tieu_chi_danh_gia_tu_kiem_active", "=", 1)->get();
        $datacapdodanhgia = CapDoDanhGia::all();
        $datadanhgiatukiem = DanhGiaTuKiem::from("form_danh_gia_tu_kiem")
            ->where("tai_khoan_id", "=", session()->get('user_id'))->get();
        //dd($datadanhgiatukiem);
        $tab = session()->get('tab');
        return view('pages.danhgiatukiem.index1', compact('pagetitle', 'tieuchi', 'datacapdodanhgia', 'datadanhgiatukiem', 'tab'));
    }
    public function validateTuKiemDiem($request)
    {
        try {
            $rules = [];
            $customMessages = [];
            foreach ($request->all() as $key => $value) {
                $rules += [
                    $key => ['required'],
                ];
                $customMessages += [
                    ($key).'.required' => '**Nội dung không được bỏ trống!'
                ];
            }
            $validator = Validator::make($request->all(), $rules, $customMessages);
            return $validator;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function storeDanhGiaTuKiem(Request $request, $tai_khoan_id)
    {
        try {
            $tab = $request->tab;
            $TieuChi = TieuChiDanhGiaTuKiem::from('tieu_chi_danh_gia_tu_kiem')
                ->where("tieu_chi_danh_gia_tu_kiem_active", "=", 1)->get();
            foreach ($TieuChi as $key => $value) {
                $index = $value->tieu_chi_danh_gia_tu_kiem_id;
                $st = "noidung{$index}";
                $stdanhgia = "danhgia{$index}";

                $modelDanhGiaTuKiem = new DanhGiaTuKiem();
                $modelDanhGiaTuKiem->tai_khoan_id = $tai_khoan_id;
                $modelDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_id = $index;
                $modelDanhGiaTuKiem->danh_gia_tu_kiem_noi_dung = $request->$st;
                $modelDanhGiaTuKiem->danh_gia_tu_kiem_danh_gia = $request->$stdanhgia;
                $validator = $this->validateTuKiemDiem($request);
                // dd($validator->errors()->toArray());
                if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with('tab', $tab)
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
                }
                $modelDanhGiaTuKiem->save();
            }
            $tab++;
            return redirect()->route('danhgiatukiemManage.indexDanhGiaTuKiem', ['tai_khoan_id' => session()->get('user_id')])
                        ->with(array('success' => "Lưu thành công", 'tab' => $tab));
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function updateDanhGiaTuKiem(Request $request, $id)
    {
        try {
            $tieuchi = TieuChiDanhGiaTuKiem::from("tieu_chi_danh_gia_tu_kiem")
                ->where("tieu_chi_danh_gia_tu_kiem_active", 1)
                ->get();
            $tab = $request->tab;
            foreach ($tieuchi as $key => $value) {
                $index = $value->tieu_chi_danh_gia_tu_kiem_id;
                $st = "noidung{$index}";
                $stdanhgia = "danhgia{$index}";

                $danhgiatukiemid = DanhGiaTuKiem::from("form_danh_gia_tu_kiem")
                    ->where("tieu_chi_danh_gia_tu_kiem_id", $value->tieu_chi_danh_gia_tu_kiem_id)
                    ->where("tai_khoan_id", $id)
                    ->first();
                $modelDanhGiaTuKiem = DanhGiaTuKiem::find($danhgiatukiemid->danh_gia_tu_kiem_id);
                $modelDanhGiaTuKiem->tai_khoan_id = $id;
                $modelDanhGiaTuKiem->tieu_chi_danh_gia_tu_kiem_id = $index;
                $modelDanhGiaTuKiem->danh_gia_tu_kiem_noi_dung = $request->$st;
                $modelDanhGiaTuKiem->danh_gia_tu_kiem_danh_gia = $request->$stdanhgia;

                $validator = $this->validateTuKiemDiem($request);
                // dd($validator->errors()->toArray());
                if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with('tab', $tab)
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
                }
                $modelDanhGiaTuKiem->save();
            }
            $tab++;
            // dd($tab);
            return redirect()->back()->withInput()->with(array('success'=> "Lưu thành công", 'tab' => $tab));
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
