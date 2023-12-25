<?php

namespace App\Http\Controllers;

use App\Models\CapDoDanhGia;
use App\Models\DanhGiaTapThe;
use App\Models\TieuChiDanhGiaTapThe;
use Illuminate\Http\Request;

class DanhGiaTapTheController extends Controller
{
    public function index($id)
    {
        $pagetitle = "Tạo mới đánh giá tập thể";
        $tieuchi=TieuChiDanhGiaTapThe::from("tieu_chi_danh_gia_tap_the")
            ->where("tieu_chi_danh_gia_tap_the_active", 1)
            ->get();
        $datacapdodanhgia=CapDoDanhGia::all();
        $datadanhgiatapthe = DanhGiaTapThe::from("form_danh_gia_tap_the")
            ->where("tai_khoan_id", "=", session()->get('user_id'))->get();
        $tab = session()->get('tab');
        return view('pages.danhgiatapthe.index', compact('pagetitle','tieuchi','datacapdodanhgia', 'datadanhgiatapthe','tab'));
    }
    public function createDanhGiaTapThe($id)
    {
        $pagetitle = "Tạo mới đánh giá tập thể";
        $tieuchi=TieuChiDanhGiaTapThe::from("tieu_chi_danh_gia_tap_the")
        //->select(["tieu_chi_danh_gia_tap_the_id","tieu_chi_danh_gia_tap_the_ten", "tieu_chi_danh_gia_tap_the_active_noi_dung","tieu_chi_danh_gia_tap_the_active_danh_gia"])
        ->where("tieu_chi_danh_gia_tap_the_active", 1)
        ->get();
        $danhgia=CapDoDanhGia::all();
        $datadanhgiatapthe = DanhGiaTapThe::from("form_danh_gia_tap_the")
            ->where("tai_khoan_id", "=", session()->get('user_id'))->get();
        return view('pages.danhgiatapthe.create', compact('pagetitle','tieuchi','danhgia', 'datadanhgiatapthe'));
    }

    public function storeDanhGiaTapThe(Request $request,$id)
    {
        try {
            $tieuchi=TieuChiDanhGiaTapThe::from("tieu_chi_danh_gia_tap_the")
            ->where("tieu_chi_danh_gia_tap_the_active", 1)
            ->get();
            $tab=$request->tab;

            $t=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_id;
            $st="noidungtieuchi{$t}";
            $stdanhgia="danhgiatieuchi{$t}";
            $modelDanhGiaTapThe = new DanhGiaTapThe();
            $modelDanhGiaTapThe->tai_khoan_id = $id;
            $modelDanhGiaTapThe->tieu_chi_danh_gia_tap_the_id=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_id;
            $modelDanhGiaTapThe->danh_gia_tap_the_ten=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_noi_dung;

            $modelDanhGiaTapThe->danh_gia_tap_the_noi_dung = $request->$st;
            $modelDanhGiaTapThe->danh_gia_tap_the_danh_gia = $request->$stdanhgia;
            $modelDanhGiaTapThe->save();

            if($tieuchi->count()>2*($tab-1)+1){
                $t=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_id;
                $st="noidungtieuchi{$t}";
                $stdanhgia="danhgiatieuchi{$t}";
                $modelDanhGiaTapThe = new DanhGiaTapThe();
                $modelDanhGiaTapThe->tai_khoan_id = $id;
                $modelDanhGiaTapThe->tieu_chi_danh_gia_tap_the_id=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_id;
                $modelDanhGiaTapThe->danh_gia_tap_the_ten=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_noi_dung;
                $modelDanhGiaTapThe->danh_gia_tap_the_noi_dung = $request->$st;
                $modelDanhGiaTapThe->danh_gia_tap_the_danh_gia = $request->$stdanhgia;
                $modelDanhGiaTapThe->save();
            }
            $tab++;
            if($tab>$tieuchi->count()/2){
                $tab=1;
            }
            return redirect()->route('danhgiataptheManage.indexDanhGiaTapThe',['tai_khoan_id'=>session()->get('user_id')])->with("tab",$tab);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }

    }
    public function editDanhGiaTapThe($id)
    {
        $pagetitle = "Chỉnh sửa đánh giá tập thể";
        $info = DanhGiaTapThe::find($id);
        return view('pages.danhgiatapthe.edit', compact('pagetitle', 'info'));
    }

    public function updateDanhGiaTapThe(Request $request, $id)
    {
        try {

            $tieuchi=TieuChiDanhGiaTapThe::from("tieu_chi_danh_gia_tap_the")
            ->where("tieu_chi_danh_gia_tap_the_active", 1)
            ->get();
            $tab=$request->tab;
            $t=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_id;
            $st="noidungtieuchi{$t}";
            $stdanhgia="danhgiatieuchi{$t}";
            $danhgiataptheid = DanhGiaTapThe::from("form_danh_gia_tap_the")
                    ->where("tieu_chi_danh_gia_tap_the_id", $tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_id)
                    ->where("tai_khoan_id", $id)
                    ->first();
            if($danhgiataptheid==null){
                $modelDanhGiaTapThe = new DanhGiaTapThe();
            }else{
                $modelDanhGiaTapThe = DanhGiaTapThe::find($danhgiataptheid->danh_gia_tap_the_id);
            }
            $modelDanhGiaTapThe->tai_khoan_id = $id;
            $modelDanhGiaTapThe->tieu_chi_danh_gia_tap_the_id=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_id;
            $modelDanhGiaTapThe->danh_gia_tap_the_ten=$tieuchi[2*($tab-1)]->tieu_chi_danh_gia_tap_the_noi_dung;

            $modelDanhGiaTapThe->danh_gia_tap_the_noi_dung = $request->$st;
            $modelDanhGiaTapThe->danh_gia_tap_the_danh_gia = $request->$stdanhgia;
            $modelDanhGiaTapThe->save();
            if($tieuchi->count()>2*($tab-1)+1){
                echo "ddd";
                $t=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_id;
                $st="noidungtieuchi{$t}";
                $stdanhgia="danhgiatieuchi{$t}";
                echo 2*($tab-1)+1;
                $danhgiataptheid = DanhGiaTapThe::from("form_danh_gia_tap_the")
                    ->where("tieu_chi_danh_gia_tap_the_id", $tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_id)
                    ->where("tai_khoan_id", $id)
                    ->first();
                if($danhgiataptheid==null){
                    $modelDanhGiaTapThe = new DanhGiaTapThe();
                }else{
                    $modelDanhGiaTapThe = DanhGiaTapThe::find($danhgiataptheid->danh_gia_tap_the_id);
                }
                $modelDanhGiaTapThe->tai_khoan_id = $id;
                $modelDanhGiaTapThe->tieu_chi_danh_gia_tap_the_id=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_id;
                $modelDanhGiaTapThe->danh_gia_tap_the_ten=$tieuchi[2*($tab-1)+1]->tieu_chi_danh_gia_tap_the_noi_dung;
                $modelDanhGiaTapThe->danh_gia_tap_the_noi_dung = $request->$st;
                $modelDanhGiaTapThe->danh_gia_tap_the_danh_gia = $request->$stdanhgia;
                $modelDanhGiaTapThe->save();
            }
            $tab++;
            if($tab>$tieuchi->count()/2){
                $tab=1;
            }
            return redirect()->route('danhgiataptheManage.indexDanhGiaTapThe',['tai_khoan_id'=>session()->get('user_id')])->with("tab",$tab);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
