<?php

namespace App\Http\Controllers;

use App\Models\CapDoDanhGia;
use App\Models\NhomTapThe;
use App\Models\TapTheTuDanhGia;
use Validator;
use Illuminate\Http\Request;

class TapTheTuDanhGiaController extends Controller
{
    public function index($id)
    {
        $pagetitle = "ĐÁNH GIÁ TẬP THỂ";
        $datadanhgiatapthe=TapTheTuDanhGia::from('form_tap_the_tu_danh_gia')
                ->where('nhom_tap_the_id', $id)->first();
        $danhgia=CapDoDanhGia::all();
        $tab = session()->get('tab');
        $user_id=$id;
        $nhom=NhomTapThe::from('nhom_tap_the')
            ->where('nhom_tap_the_id',$id)->first();
        if($datadanhgiatapthe==null){
            for ($i = 1; $i <= 6; $i++)
                $ttdg[$i] = "chuadanhgia";
        }else{
            for( $i = 1; $i <= 6; $i++ )
                $ttdg[$i] = "dadanhgia";
            $tt_tab[1] = [$datadanhgiatapthe->uu_diem_1_noi_dung,  $datadanhgiatapthe->uu_diem_1_danh_gia];

            $tt_tab[2] = [$datadanhgiatapthe->uu_diem_2_noi_dung,  $datadanhgiatapthe->uu_diem_2_danh_gia];

            $tt_tab[3] = [$datadanhgiatapthe->uu_diem_3_noi_dung,  $datadanhgiatapthe->uu_diem_3_danh_gia,
                        $datadanhgiatapthe->uu_diem_4_noi_dung,  $datadanhgiatapthe->uu_diem_4_danh_gia,
                        // $datadanhgiatapthe->uu_diem_5_noi_dung,  $datadanhgiatapthe->uu_diem_5_danh_gia
                    ];

            $tt_tab[4] = [$datadanhgiatapthe->han_che_khuyet_diem, $datadanhgiatapthe->nguyen_nhan_han_che,
                        $datadanhgiatapthe->ket_qua_khac_phuc_noi_dung,$datadanhgiatapthe->ket_qua_khac_phuc_danh_gia];

            $tt_tab[5] = [$datadanhgiatapthe->giai_trinh_van_de, $datadanhgiatapthe->lam_ro_trach_nhiem,
                        $datadanhgiatapthe->bien_phap_khac_phuc];

            $tt_tab[6] = [$datadanhgiatapthe->tu_xep_loai];

            for ( $i = 1; $i <= 6; $i++ ) {
                foreach( $tt_tab[$i] as $item => $value) {
                    if ($value == null) {
                        $ttdg[$i] = "chuadanhgia";
                        break;
                    }
                }
            }
        }

        return view('pages.tapthetudanhgia.index', compact('pagetitle','datadanhgiatapthe','danhgia','tab','ttdg','user_id','nhom'));
    }

    public function index1()
    {
        $pagetitle = "ĐÁNH GIÁ TẬP THỂ";
        $datadanhgiatapthe=NhomTapThe::from('nhom_tap_the')->get();
        return view('pages.tapthetudanhgia.index1', compact('pagetitle', 'datadanhgiatapthe'));
    }

    public function validateKiemDiemTapThe($request, $tab)
    {
        try {
            if ($tab == 1) {
                $rules = [
                    'ud1noidung' => 'required',
                    'ud1danhgia' => 'required',
                ];
                $customMessages = [
                    'ud1noidung.required' => 'Nội dung không được bỏ trống.',
                    'ud1danhgia.required' => 'Đánh giá cấp độ không được bỏ trống.'
                ];
            } else if ($tab == 2) {
                $rules = [
                    'ud2noidung' => 'required',
                    'ud2danhgia' => 'required',
                ];
                $customMessages = [
                    'ud2noidung.required' => 'Nội dung không được bỏ trống.',
                    'ud2danhgia.required' => 'Đánh giá cấp độ không được bỏ trống.'
                ];
            } else if ($tab == 3) {
                $rules = [
                    'ud3noidung' => 'required',
                    'ud3danhgia' => 'required',
                    'ud4noidung' => 'required',
                    'ud4danhgia' => 'required',
                    // 'ud5noidung' => 'required',
                    // 'ud5danhgia' => 'required',
                ];
                $customMessages = [
                    'ud3noidung.required' => 'Nội dung không được bỏ trống.',
                    'ud3danhgia.required' => 'Đánh giá cấp độ không được bỏ trống.',
                    'ud4noidung.required' => 'Nội dung không được bỏ trống.',
                    'ud4danhgia.required' => 'Đánh giá cấp độ không được bỏ trống.',
                    // 'ud5noidung.required' => 'Nội dung không được bỏ trống.',
                    // 'ud5danhgia.required' => 'Đánh giá cấp độ không được bỏ trống.'
                ];
            } else if ($tab == 4) {
                $rules = [
                    'hanchekhuyetdiem' => 'required',
                    'nguyennhanhanche' => 'required',
                    'ketquakhacphucnoidung' => 'required',
                    'ketquakhacphucdanhgia' => 'required',
                ];
                $customMessages = [
                    'hanchekhuyetdiem.required' => 'Hạn chế không được bỏ trống.',
                    'nguyennhanhanche.required' => 'Nguyên nhân hạn chế không được bỏ trống.',
                    'ketquakhacphucnoidung.required' => 'Kết quả khắc phục không được bỏ trống.',
                    'ketquakhacphucdanhgia.required' => 'Đánh giá kết quả khắc phục không được bỏ trống.',
                ];
            } else if ($tab == 5) {
                $rules = [
                    'giaitrinhvande' => 'required',
                    'lamrotrachnhiem' => 'required',
                    'bienphapkhacphuc' => 'required',
                ];
                $customMessages = [
                    'giaitrinhvande.required' => 'Giải trình vấn đề không được bỏ trống.',
                    'lamrotrachnhiem.required' => 'Làm rõ trách nhiệm không được bỏ trống.',
                    'bienphapkhacphuc.required' => 'Biện pháp khắc phục không được bỏ trống.',
                ];
            } else if ($tab == 6) {
                $rules = [
                    'tuxeploai' => 'required',
                ];
                $customMessages = [
                    'tuxeploai.required' => 'Tự xép loại không được bỏ trống.',
                ];
            }
            // dd($request->noi_dung1_1);
            $validator = Validator::make($request->all(), $rules, $customMessages);
            return $validator;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function storeTapTheTuDanhGia(Request $request,$id)
    {
        try {
            $tab = $request->tab;

            $validator = $this->validateKiemDiemTapThe($request, $tab);
            // dd($validator->errors()->toArray());
            $user_id=$id;

            $modelTapTheTuDanhGia = new TapTheTuDanhGia();
            $modelTapTheTuDanhGia->nhom_tap_the_id=$id;
            if($tab==1){
                $modelTapTheTuDanhGia->uu_diem_1_noi_dung=$request->ud1noidung;
                $modelTapTheTuDanhGia->uu_diem_1_danh_gia=$request->ud1danhgia;
            }else if($tab== 2){
                $modelTapTheTuDanhGia->uu_diem_2_noi_dung=$request->ud2noidung;
                $modelTapTheTuDanhGia->uu_diem_2_danh_gia=$request->ud2danhgia;
            }else if($tab== 3){
                $modelTapTheTuDanhGia->uu_diem_3_noi_dung=$request->ud3noidung;
                $modelTapTheTuDanhGia->uu_diem_3_danh_gia=$request->ud3danhgia;

                $modelTapTheTuDanhGia->uu_diem_4_noi_dung=$request->ud4noidung;
                $modelTapTheTuDanhGia->uu_diem_4_danh_gia=$request->ud4danhgia;

                // $modelTapTheTuDanhGia->uu_diem_5_noi_dung=$request->ud5noidung;
                // $modelTapTheTuDanhGia->uu_diem_5_danh_gia=$request->ud5danhgia;
            }else if($tab== 4){
                $modelTapTheTuDanhGia->han_che_khuyet_diem=$request->hanchekhuyetdiem;
                $modelTapTheTuDanhGia->nguyen_nhan_han_che=$request->nguyennhanhanche;

                $modelTapTheTuDanhGia->ket_qua_khac_phuc_noi_dung=$request->ketquakhacphucnoidung;
                $modelTapTheTuDanhGia->ket_qua_khac_phuc_danh_gia=$request->ketquakhacphucdanhgia;
            }else if($tab== 5){
                $modelTapTheTuDanhGia->giai_trinh_van_de=$request->giaitrinhvande;
                $modelTapTheTuDanhGia->lam_ro_trach_nhiem= $request->lamrotrachnhiem;
                $modelTapTheTuDanhGia->bien_phap_khac_phuc= $request->bienphapkhacphuc;
            }else if($tab== 6){
                $modelTapTheTuDanhGia->tu_xep_loai= $request->tuxeploai;
            }

            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }
            $modelTapTheTuDanhGia->save();

            $tab++;
            return redirect()->route('tapthetudanhgiaManage.indexTapTheTuDanhGia',['user_id'=>$user_id])->with("tab",$tab);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }

    }

    public function updateTapTheTuDanhGia(Request $request, $id)
    {
        try {
            $tab = $request->tab;
            $validator = $this->validateKiemDiemTapThe($request, $tab);

            $user_id=$id;
            $model=TapTheTuDanhGia::from("form_tap_the_tu_danh_gia")
                ->where("nhom_tap_the_id",$id)->first();
            $modelTapTheTuDanhGia = TapTheTuDanhGia::find($model->form_tap_the_tu_danh_gia_id);
            $modelTapTheTuDanhGia->nhom_tap_the_id=$id;

            if($tab==1){
                $modelTapTheTuDanhGia->uu_diem_1_noi_dung=$request->ud1noidung;
                $modelTapTheTuDanhGia->uu_diem_1_danh_gia=$request->ud1danhgia;
            }else if($tab== 2){
                $modelTapTheTuDanhGia->uu_diem_2_noi_dung=$request->ud2noidung;
                $modelTapTheTuDanhGia->uu_diem_2_danh_gia=$request->ud2danhgia;
            }else if($tab== 3){
                $modelTapTheTuDanhGia->uu_diem_3_noi_dung=$request->ud3noidung;
                $modelTapTheTuDanhGia->uu_diem_3_danh_gia=$request->ud3danhgia;

                $modelTapTheTuDanhGia->uu_diem_4_noi_dung=$request->ud4noidung;
                $modelTapTheTuDanhGia->uu_diem_4_danh_gia=$request->ud4danhgia;

                // $modelTapTheTuDanhGia->uu_diem_5_noi_dung=$request->ud5noidung;
                // $modelTapTheTuDanhGia->uu_diem_5_danh_gia=$request->ud5danhgia;
            }else if($tab== 4){
                $modelTapTheTuDanhGia->han_che_khuyet_diem=$request->hanchekhuyetdiem;
                $modelTapTheTuDanhGia->nguyen_nhan_han_che=$request->nguyennhanhanche;

                $modelTapTheTuDanhGia->ket_qua_khac_phuc_noi_dung=$request->ketquakhacphucnoidung;
                $modelTapTheTuDanhGia->ket_qua_khac_phuc_danh_gia=$request->ketquakhacphucdanhgia;
            }else if($tab== 5){
                $modelTapTheTuDanhGia->giai_trinh_van_de=$request->giaitrinhvande;
                $modelTapTheTuDanhGia->lam_ro_trach_nhiem= $request->lamrotrachnhiem;
                $modelTapTheTuDanhGia->bien_phap_khac_phuc= $request->bienphapkhacphuc;
            }else if($tab== 6){
                $modelTapTheTuDanhGia->tu_xep_loai= $request->tuxeploai;
            }

            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }
            $modelTapTheTuDanhGia->save();
            $tab++;

            return redirect()->route('tapthetudanhgiaManage.indexTapTheTuDanhGia',['user_id'=>$user_id])->with(array('success' => 'Cập nhật thành công.', 'tab' => $tab));;
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
