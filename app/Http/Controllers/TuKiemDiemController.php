<?php

namespace App\Http\Controllers;

use App\Models\ThoiGianDanhGiaTuKiemDiem;
use App\Models\TuKiemDiem;
use App\Models\NhatKyTuKiemDiem;
use App\Models\ThongTinNhanVien;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class TuKiemDiemController extends Controller
{
    public function index()
    {
        $pagetitle = "FORM 02 - TỰ KIỂM ĐIỂM";
        //Data danh sách đảng viên đánh giá tự kiểm điểm
        if (session()->get('quyen')>0) {
            $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')
                ->leftJoin('ql_user', 'ql_user.user_id', 'form_tu_kiem_diem.user_id')
                ->leftJoin('thong_tin_nhan_vien', 'thong_tin_nhan_vien.user_id', 'ql_user.user_id')
                ->get();
        } else {
            $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')
                ->leftJoin('ql_user', 'ql_user.user_id', 'form_tu_kiem_diem.user_id')
                ->leftJoin('thong_tin_nhan_vien', 'thong_tin_nhan_vien.user_id', 'ql_user.user_id')
                ->where('ql_user.user_id', session()->get('user_id'))
                ->get();
        }
        $checkStatus = TuKiemDiem::all();
        $datastatus = []; //Data trạng thái tự kiểm điểm 1: đã đánh giá
        foreach ($checkStatus as $item => $value) {
            $t = $value->toArray();
            $datastatus[$item] = 1;
            $quyen = session()->get('quyen');
            if ($quyen == 1 && ($t['lanh_dao_don_vi_noi_dung'] == null || $t['lanh_dao_don_vi_danh_gia'] == null))
                $datastatus[$item] = 0;
            else if ($quyen == 2 && ($t['chi_bo_noi_dung'] == null || $t['chi_bo_danh_gia'] == null))
                $datastatus[$item] = 0;
            else if ($quyen == 3 && ($t['chi_uy_danh_gia'] == null))
                $datastatus[$item] = 0;
        }
        session()->remove('tab');
        return view('pages.danhgiatukiem.index', compact('pagetitle', 'datastatus', 'datatukiemdiem'));
    }
    public function dgTuKiemDiem($user_id)
    {
        $pagetitle = "FORM 02 - ĐÁNH GIÁ ĐẢNG VIÊN";
        $page_name = "Đánh Giá Đảng Viên";
        $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')->where('user_id', $user_id)->first();
        $tab = session()->get('tab');

        if ($tab == null)
            if (session()->has('quyen'))
                $tab = session()->get('quyen') + 4;

        $logs = NhatKyTuKiemDiem::from("nhat_ky_form_tu_kiem_diem")
            ->leftJoin('ql_user', 'ql_user.user_id', 'nhat_ky_form_tu_kiem_diem.id_user_thuc_hien')
            ->leftJoin('thong_tin_nhan_vien', 'thong_tin_nhan_vien.user_id', 'ql_user.user_id')->get()
            ->where("id_user_duoc_thay_doi", $user_id)->sortDesc();
        if ($logs != NULL) {
            foreach ($logs as $item => $log) {
                $log->thoi_gian_thay_doi = Carbon::createFromFormat('Y-m-d H:i:s', $log->thoi_gian_thay_doi)->format('d/m/Y H:i:s');
            }
        }
        $toptenlogs = $logs->take(10);
        $quyen_level = User::from('ql_user')->where('user_id', $user_id)
                        ->leftJoin('nhom_quyen', 'ql_user.nhom_quyen_id', 'nhom_quyen.nhom_quyen_id')->first()->nhom_quyen_level;
        $ttdg = $this->kiemtrathongtin($user_id);
        // if ($ttdg[$tab]=="dadanhgia" && $tab>1) $tab--;
        $ds_loai = [
            "thoi_gian_danh_gia_tu_kiem_diem_dang_vien",
            "thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi",
            "thoi_gian_danh_gia_tu_kiem_diem_chi_bo",
            "thoi_gian_danh_gia_tu_kiem_diem_chi_uy"
        ];
        $m_thoihandanhgia = ThoiGianDanhGiaTuKiemDiem::all()->first();
        $item = $ds_loai[session()->get('quyen')];
        $thoihan = Carbon::createFromFormat('Y-m-d', $m_thoihandanhgia->$item)->format('d-m-Y');
        $hientai = date('d-m-Y', time());
        if (strtotime($hientai) > strtotime($thoihan)) $quahan = 1;
        else $quahan = 0;

        return view('pages.danhgiatukiem.formtukiemdiem', compact('page_name', 'pagetitle', 'user_id', 'tab', 'datatukiemdiem', 'logs', 'toptenlogs', 'ttdg', 'quahan', 'quyen_level'));
    } // Chi bộ, chi uỷ đánh giá
    public function formTuKiem()
    {
        $pagetitle = "Form 02 - TỰ KIỂM ĐIỂM";
        $page_name = "Tự Kiểm Điểm";
        $user_id = session()->get('user_id');
        $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')->where('user_id', $user_id)->first();
        $tab = session()->get('tab');
        if ($tab == "") $tab = 1;
        $logs = NhatKyTuKiemDiem::from("nhat_ky_form_tu_kiem_diem")
            ->leftJoin('ql_user', 'ql_user.user_id', 'nhat_ky_form_tu_kiem_diem.id_user_thuc_hien')
            ->leftJoin('thong_tin_nhan_vien', 'thong_tin_nhan_vien.user_id', 'ql_user.user_id')->get()
            ->where("id_user_duoc_thay_doi", $user_id)->sortDesc();
        if ($logs != NULL) {
            foreach ($logs as $item => $log) {
                $log->thoi_gian_thay_doi = Carbon::createFromFormat('Y-m-d H:i:s', $log->thoi_gian_thay_doi)->format('d/m/Y H:i:s');
            }
        }
        $toptenlogs = $logs->take(10);
        $ttdg = $this->kiemtrathongtin($user_id);
        $quyen_level = session('quyen');
        if ($ttdg[$tab]=='dadanhgia' && $tab>1) $tab--;
        $m_thoihandanhgia = ThoiGianDanhGiaTuKiemDiem::all()->first();
        $thoihan = Carbon::createFromFormat('Y-m-d', $m_thoihandanhgia->thoi_gian_danh_gia_tu_kiem_diem_dang_vien)->format('d-m-Y');
        $hientai = date('d-m-Y', time());
        if (strtotime($hientai) > strtotime($thoihan)) $quahan = 1;
        else $quahan = 0;
        return view('pages.danhgiatukiem.formtukiemdiem', compact('page_name', 'pagetitle', 'user_id', 'tab', 'datatukiemdiem', 'ttdg', 'logs', 'toptenlogs', 'quahan', 'quyen_level'));
    } // Tự đánh giá

    //Kiem tra thong tin danh gia
    public function kiemtrathongtin($user_id) {
        $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')->where('user_id', $user_id)->first();
        $quyen = User::from('ql_user')->where('user_id', $user_id)
                        ->leftJoin('nhom_quyen', 'ql_user.nhom_quyen_id', 'nhom_quyen.nhom_quyen_id')->first()->nhom_quyen_level;
        if ($datatukiemdiem == null) {
            for ($i = 1; $i <= 7; $i++)
                $ttdg[$i] = "chuadanhgia";
        } else {
            for ($i = 1; $i <= 7; $i++)
                $ttdg[$i] = "dadanhgia";
            $tt_tab[1] = [
                $datatukiemdiem->uu_diem_1_noi_dung,
                $datatukiemdiem->uu_diem_2_noi_dung,
                $datatukiemdiem->uu_diem_6_noi_dung,
                $datatukiemdiem->uu_diem_1_danh_gia,
                $datatukiemdiem->uu_diem_2_danh_gia
            ];

            if ($quyen>0) { //Nếu là LĐ trở lên
                $tt_tab[1] += [
                    5=>$datatukiemdiem->uu_diem_3_noi_dung,
                    6=>$datatukiemdiem->uu_diem_4_noi_dung,
                    7=>$datatukiemdiem->uu_diem_5_noi_dung,
                    8=>$datatukiemdiem->uu_diem_3_danh_gia,
                    9=>$datatukiemdiem->uu_diem_4_danh_gia,
                    10=>$datatukiemdiem->uu_diem_5_danh_gia,
                ];
            }

            $tt_tab[2] = [
                $datatukiemdiem->han_che_1_noi_dung,
                $datatukiemdiem->han_che_2_noi_dung,
                $datatukiemdiem->ket_qua_khac_phuc_noi_dung,
                $datatukiemdiem->ket_qua_khac_phuc_danh_gia
            ];

            $tt_tab[3] = [
                // $datatukiemdiem->giai_trinh,
                // $datatukiemdiem->lam_ro_trach_nhiem,
                // $datatukiemdiem->bien_phap_khac_phuc
            ];

            $tt_tab[4] = [$datatukiemdiem->tu_nhan_muc_xl_can_bo, $datatukiemdiem->tu_nhan_muc_xl_dang_vien];

            $tt_tab[5] = [$datatukiemdiem->lanh_dao_don_vi_noi_dung, $datatukiemdiem->lanh_dao_don_vi_danh_gia];

            $tt_tab[6] = [$datatukiemdiem->chi_bo_noi_dung, $datatukiemdiem->chi_bo_danh_gia];

            $tt_tab[7] = [$datatukiemdiem->chi_uy_danh_gia];
            for ($i = 1; $i <= 7; $i++) {
                foreach ($tt_tab[$i] as $item => $value) {
                    if ($value == null) {
                        $ttdg[$i] = "chuadanhgia";
                        break;
                    }
                }
            }
        }
        return $ttdg;
    }
    public function history($id)
    {
        $pagetitle = "Nhật ký cập nhật form 2 - Tự kiểm điểm";
        $user_id = $id;
        $logs = NhatKyTuKiemDiem::from("nhat_ky_form_tu_kiem_diem")
            ->leftJoin('ql_user', 'ql_user.user_id', 'nhat_ky_form_tu_kiem_diem.id_user_thuc_hien')
            ->leftJoin('thong_tin_nhan_vien', 'thong_tin_nhan_vien.user_id', 'ql_user.user_id')->get()
            ->where("id_user_duoc_thay_doi", $user_id)->sortDesc();
        // $toptenlogs = $logs->take(10);
        if ($logs != NULL) {
            foreach ($logs as $item => $log) {
                $log->thoi_gian_thay_doi = Carbon::createFromFormat('Y-m-d H:i:s', $log->thoi_gian_thay_doi)->format('d/m/Y H:i:s');
            }
        }
        return view('pages.danhgiatukiem.history', compact('pagetitle', 'user_id', 'logs'));
    }


    public function validateTuKiemDiem($request, $tab, $quyen)
    {
        try {
            if ($tab == 1) {

                $rules = [
                    'noidung1_1' => 'required',
                    'noidung1_2' => 'required',
                    'noidung1_6' => 'required',
                    // 'noidung1_3_2' => 'required',
                    'danhgia1_1' => 'required',
                    'danhgia1_2' => 'required'
                ];
                $customMessages = [
                    'noidung1_1.required' => 'Nội dung mục I.1 không được bỏ trống.',
                    'noidung1_2.required' => 'Nội dung mục I.2 không được bỏ trống.',
                    'noidung1_6.required' => 'Nội dung mục I.3 không được bỏ trống.',
                    // 'noidung1_3_2.required' => 'Nội dung mục I.3.2 không được bỏ trống.',
                    'danhgia1_1.required' => 'Đánh giá cấp độ thực hiện mục I.1 không được bỏ trống.',
                    'danhgia1_2.required' => 'Đánh giá cấp độ thực hiện mục I.2 không được bỏ trống.'
                ];
                // if ($quyen==2)
                if ($quyen>0) {
                    $rules += [
                        'noidung1_3' => 'required',
                        'noidung1_4' => 'required',
                        'noidung1_5' => 'required',
                        'danhgia1_3' => 'required',
                        'danhgia1_4' => 'required',
                        'danhgia1_5' => 'required',
                    ];
                    $customMessages['noidung1_6'] = "'Nội dung mục I.6 không được bỏ trống.',";
                    $customMessages += [
                        'noidung1_3.required' => 'Nội dung mục I.3 không được bỏ trống.',
                        'noidung1_4.required' => 'Nội dung mục I.4 không được bỏ trống.',
                        'noidung1_5.required' => 'Nội dung mục I.5 không được bỏ trống.',
                        'danhgia1_3.required' => 'Đánh giá cấp độ thực hiện mục I.3 không được bỏ trống.',
                        'danhgia1_4.required' => 'Đánh giá cấp độ thực hiện mục I.4 không được bỏ trống.',
                        'danhgia1_5.required' => 'Đánh giá cấp độ thực hiện mục I.5 không được bỏ trống.',
                    ];
                }
            } else if ($tab == 2) {
                $rules = [
                    'noidung2_1' => 'required',
                    'noidung2_2' => 'required',
                    'noidung3' => 'required',
                    'danhgia3' => 'required',
                ];
                $customMessages = [
                    'noidung2_1.required' => 'Nội dung mục II.1 không được bỏ trống.',
                    'noidung2_2.required' => 'Nội dung mục II.2 không được bỏ trống.',
                    'noidung3.required' => 'Nội dung mục III không được bỏ trống.',
                    'danhgia3.required' => 'Đánh giá cấp độ thực hiện mục III không được bỏ trống.'
                ];
            } else if ($tab == 3) {
                $rules = [
                    // 'noidung4' => 'required',
                    // 'noidung5' => 'required',
                    // 'noidung6' => 'required'
                ];
                $customMessages = [
                    // 'noidung4.required' => 'Nội dung mục IV không được bỏ trống.',
                    // 'noidung5.required' => 'Nội dung mục V không được bỏ trống.',
                    // 'noidung6.required' => 'Nội dung mục VI không được bỏ trống.',
                ];
            } else if ($tab == 4) {
                $rules = [
                    'danhgia7_1' => 'required',
                    'danhgia7_2' => 'required',
                ];
                $customMessages = [
                    'danhgia7_1.required' => 'Đánh giá cấp độ thực hiện mục VII.1 không được bỏ trống.',
                    'danhgia7_2.required' => 'Đánh giá cấp độ thực hiện mục VII.2 không được bỏ trống.',
                ];
            } else if ($tab == 5) {
                $rules = [
                    'noidung8' => 'required',
                    'danhgia8' => 'required',
                ];
                $customMessages = [
                    'noidung8.required' => 'Nội dung mục VIII không được bỏ trống.',
                    'danhgia8.required' => 'Đánh giá cấp độ thực hiện mục VIII không được bỏ trống.',
                ];
            } else if ($tab == 6) {
                $rules = [
                    'noidung9' => 'required',
                    'danhgia9' => 'required',
                ];
                $customMessages = [
                    'noidung9.required' => 'Nội dung mục IX không được bỏ trống.',
                    'danhgia9.required' => 'Đánh giá cấp độ thực hiện mục IX không được bỏ trống.',
                ];
            } else if ($tab == 7) {
                $rules = [
                    'danhgia10' => 'required',
                ];
                $customMessages = [
                    'danhgia10.required' => 'Đánh giá cấp độ thực hiện mục X không được bỏ trống.',
                ];
            }
            // dd($request->noi_dung1_1);
            $validator = Validator::make($request->all(), $rules, $customMessages);
            return $validator;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function storeTuKiemDiem(Request $request, $user_id)
    {
        try {
            $tab = $request->tab;
            $quyen = User::from('ql_user')->select('nhom_quyen.nhom_quyen_level')
                    ->leftJoin('nhom_quyen', 'nhom_quyen.nhom_quyen_id', 'ql_user.nhom_quyen_id')
                    ->first()->nhom_quyen_level;
            $validator = $this->validateTuKiemDiem($request, $tab, $quyen);
            // dd($validator->errors()->toArray());

            $tukiemdiem = new TuKiemDiem();
            $tukiemdiem->user_id = $user_id;

            if ($tab == 1) {
                $tukiemdiem->uu_diem_1_noi_dung = $request->noidung1_1;
                $tukiemdiem->uu_diem_2_noi_dung = $request->noidung1_2;
                $tukiemdiem->uu_diem_3_noi_dung = $request->noidung1_3;
                $tukiemdiem->uu_diem_4_noi_dung = $request->noidung1_4;
                $tukiemdiem->uu_diem_5_noi_dung = $request->noidung1_5;
                $tukiemdiem->uu_diem_6_noi_dung = $request->noidung1_6;

                $tukiemdiem->uu_diem_1_danh_gia = $request->danhgia1_1;
                $tukiemdiem->uu_diem_2_danh_gia = $request->danhgia1_2;
                $tukiemdiem->uu_diem_3_danh_gia = $request->danhgia1_3;
                $tukiemdiem->uu_diem_4_danh_gia = $request->danhgia1_4;
                $tukiemdiem->uu_diem_5_danh_gia = $request->danhgia1_5;
            } else if ($tab == 2) {
                $tukiemdiem->han_che_1_noi_dung = $request->noidung2_1;
                $tukiemdiem->han_che_2_noi_dung = $request->noidung2_2;
                $tukiemdiem->ket_qua_khac_phuc_noi_dung = $request->noidung3;

                $tukiemdiem->ket_qua_khac_phuc_danh_gia = $request->danhgia3;
            } else if ($tab == 3) {
                $tukiemdiem->giai_trinh = $request->noidung4;
                $tukiemdiem->lam_ro_trach_nhiem = $request->noidung5;
                $tukiemdiem->bien_phap_khac_phuc = $request->noidung6;
            } else if ($tab == 4) {
                $tukiemdiem->tu_nhan_muc_xl_can_bo = $request->danhgia7_1;
                $tukiemdiem->tu_nhan_muc_xl_dang_vien = $request->danhgia7_2;
            } else if ($tab == 5) {
                $tukiemdiem->lanh_dao_don_vi_noi_dung = $request->noidung8;
                $tukiemdiem->lanh_dao_don_vi_danh_gia = $request->danhgia8;
            } else if ($tab == 6) {
                $tukiemdiem->chi_bo_noi_dung = $request->noidung9;
                $tukiemdiem->chi_bo_danh_gia = $request->danhgia9;
            } else if ($tab == 7) {
                $tukiemdiem->chi_uy_danh_gia = $request->danhgia10;
            }
            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }
            $tukiemdiem->thoi_gian_cap_nhat_lan_cuoi = Carbon::now();
            $tukiemdiem->save();
            if ($tab < 4 && session()->get('quyen') == 0 || $tab < 5 && session()->get('quyen') == 1 || $tab < 6 && session()->get('quyen') == 2 || $tab < 7 && session()->get('quyen') == 3)
                $tab++;
            return redirect()->route('tukiemdiemManage.formTuKiemDiem')
                ->with(array('success' => 'Lưu thành công', 'tab' => $tab));
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function updateTuKiemDiem(Request $request, $user_id)
    {
        try {
            $tab = $request->tab;
                $quyen = User::from('ql_user')->select('nhom_quyen.nhom_quyen_level')
                        ->leftJoin('nhom_quyen', 'nhom_quyen.nhom_quyen_id', 'ql_user.nhom_quyen_id')
                        ->first()->nhom_quyen_level;
                $validator = $this->validateTuKiemDiem($request, $tab, $quyen);
            // dd($validator->errors()->toArray());

            $tk_thuc_hien = session()->get('user_id');

            $tukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')
                ->where('user_id', $user_id)
                ->first();

            $tukiemdiem_logs = TuKiemDiem::from('form_tu_kiem_diem')
            ->where('user_id', $user_id)
            ->first();
            // dd($tukiemdiem_logs);
            if ($tab == 1) {
                $tukiemdiem->uu_diem_1_noi_dung = $request->noidung1_1;
                $tukiemdiem->uu_diem_2_noi_dung = $request->noidung1_2;
                $tukiemdiem->uu_diem_3_noi_dung = $request->noidung1_3;
                $tukiemdiem->uu_diem_4_noi_dung = $request->noidung1_4;
                $tukiemdiem->uu_diem_5_noi_dung = $request->noidung1_5;
                $tukiemdiem->uu_diem_6_noi_dung = $request->noidung1_6;

                $tukiemdiem->uu_diem_1_danh_gia = $request->danhgia1_1;
                $tukiemdiem->uu_diem_2_danh_gia = $request->danhgia1_2;
                $tukiemdiem->uu_diem_3_danh_gia = $request->danhgia1_3;
                $tukiemdiem->uu_diem_4_danh_gia = $request->danhgia1_4;
                $tukiemdiem->uu_diem_5_danh_gia = $request->danhgia1_5;
            } else if ($tab == 2) {
                $tukiemdiem->han_che_1_noi_dung = $request->noidung2_1;
                $tukiemdiem->han_che_2_noi_dung = $request->noidung2_2;
                $tukiemdiem->ket_qua_khac_phuc_noi_dung = $request->noidung3;
                $tukiemdiem->ket_qua_khac_phuc_danh_gia = $request->danhgia3;
            } else if ($tab == 3) {
                $tukiemdiem->giai_trinh = $request->noidung4;
                $tukiemdiem->lam_ro_trach_nhiem = $request->noidung5;
                $tukiemdiem->bien_phap_khac_phuc = $request->noidung6;
            } else if ($tab == 4) {
                $tukiemdiem->tu_nhan_muc_xl_can_bo = $request->danhgia7_1;
                $tukiemdiem->tu_nhan_muc_xl_dang_vien = $request->danhgia7_2;
            } else if ($tab == 5) {
                $tukiemdiem->lanh_dao_don_vi_noi_dung = $request->noidung8;
                $tukiemdiem->lanh_dao_don_vi_danh_gia = $request->danhgia8;
            } else if ($tab == 6) {
                $tukiemdiem->chi_bo_noi_dung = $request->noidung9;
                $tukiemdiem->chi_bo_danh_gia = $request->danhgia9;
            } else if ($tab == 7) {
                $tukiemdiem->chi_uy_danh_gia = $request->danhgia10;
            }
            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }

            if ($tk_thuc_hien != $user_id) {
                if ($tab == 1) {
                    $this->subNhatKy($tukiemdiem_logs->uu_diem_1_noi_dung, $request->noidung1_1, "I.1", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->uu_diem_2_noi_dung, $request->noidung1_2, "I.2", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->uu_diem_6_noi_dung, $request->noidung1_6, "I.3", 1, $tk_thuc_hien, $user_id);
                    //Danh gia
                    $this->subNhatKy($tukiemdiem_logs->uu_diem_1_danh_gia, $request->danhgia1_1, "I.1", 2, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->uu_diem_2_danh_gia, $request->danhgia1_2, "I.2", 2, $tk_thuc_hien, $user_id);
                } else if ($tab == 2) {
                    $this->subNhatKy($tukiemdiem_logs->han_che_1_noi_dung, $request->noidung2_1, "II.1", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->han_che_2_noi_dung, $request->noidung2_2, "II.2", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->ket_qua_khac_phuc_noi_dung, $request->noidung3, "III", 1, $tk_thuc_hien, $user_id);
                    //Danh Gia
                    $this->subNhatKy($tukiemdiem_logs->ket_qua_khac_phuc_danh_gia, $request->danhgia3, "III", 2, $tk_thuc_hien, $user_id);
                } else if ($tab == 3) {
                    $this->subNhatKy($tukiemdiem_logs->giai_trinh, $request->noidung4, "IV", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->lam_ro_trach_nhiem, $request->noidung5, "V", 1, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->bien_phap_khac_phuc, $request->noidung6, "VI", 1, $tk_thuc_hien, $user_id);
                } else if ($tab == 4) {
                    $this->subNhatKy($tukiemdiem_logs->tu_nhan_muc_xl_can_bo, $request->danhgia7_1, "VII.1", 2, $tk_thuc_hien, $user_id);
                    $this->subNhatKy($tukiemdiem_logs->tu_nhan_muc_xl_dang_vien, $request->danhgia7_2, "VII.2", 2, $tk_thuc_hien, $user_id);
                }
                // else if ($tab == 5) {
                //     $this->subNhatKy($tukiemdiem->lanh_dao_don_vi_noi_dung, $request->noidung8, "VIII", 1, $tk_thuc_hien, $user_id);
                //     $this->subNhatKy($tukiemdiem->lanh_dao_don_vi_danh_gia, $request->danhgia8, "VIII", 2, $tk_thuc_hien, $user_id);
                // } else if ($tab == 6) {
                //     $this->subNhatKy($tukiemdiem->chi_bo_noi_dung, $request->noidung9, "IX", 1, $tk_thuc_hien, $user_id);
                //     $this->subNhatKy($tukiemdiem->chi_bo_danh_gia, $request->danhgia9, "IX", 2, $tk_thuc_hien, $user_id);
                // }
            }

            $tukiemdiem->thoi_gian_cap_nhat_lan_cuoi = Carbon::now();
            $tukiemdiem->save();
            if ($tab < 4 && session()->get('quyen') == 0 || $tab < 5 && session()->get('quyen') == 1 || $tab < 6 && session()->get('quyen') == 2 || $tab < 7 && session()->get('quyen') == 3)
                $tab++;
            $ttdg = $this->kiemtrathongtin($user_id);
                if ($ttdg[$tab]=="dadanhgia" && $tab>1) $tab--;
            return redirect()->back()
                ->with(array('success' => 'Cập nhật thành công.', 'tab' => $tab));
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function subNhatKy($dulieucu, $dulieumoi, $vitri, $loai, $tkth, $tktd)
    {
        $daycapdo = ["Xuất sắc", "Tốt", "Trung bình", "Kém"];
        if ($dulieucu != $dulieumoi) {
            $nhatky = new NhatKyTuKiemDiem();
            $nhatky->thoi_gian_thay_doi = Carbon::now('Asia/Ho_Chi_Minh')->toDateTime();
            $nhatky->id_user_thuc_hien = $tkth;
            $nhatky->id_user_duoc_thay_doi = $tktd;
            if ($loai == 2) {
                if ($dulieucu == null || $dulieucu == "")
                    $nhatky->du_lieu_cu = "chưa đánh giá";
                else
                    $nhatky->du_lieu_cu = $daycapdo[$dulieucu - 1];
                $nhatky->du_lieu_moi = $daycapdo[$dulieumoi - 1];
            } else {
                $nhatky->du_lieu_cu = $dulieucu;
                $nhatky->du_lieu_moi = $dulieumoi;
            }
            $nhatky->vi_tri_thay_doi = $vitri;
            $nhatky->loai_thay_doi = $loai;
            $nhatky->save();
            // echo $nhatky;
        }
    }
    public function doanThanhNienIndex()
    {
        $pagetitle = "Đoàn Thanh niên đánh giá";
        //Data danh sách đảng viên đánh giá tự kiểm điểm
        $datadoanthanhniendanhgia = User::from('thong_tin_nhan_vien')->select(
            'thong_tin_nhan_vien.user_id as user_id',
            'thong_tin_nhan_vien.user_ma',
            'thong_tin_nhan_vien.user_ho_ten',
            'form_tu_kiem_diem.form_tu_kiem_diem_doan_thanh_nien_danh_gia'
        )
            ->leftJoin('ql_user', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
            ->leftJoin('form_tu_kiem_diem', 'form_tu_kiem_diem.user_id', 'thong_tin_nhan_vien.user_id')
            ->where('user_dang_vien', 1)
            ->get();
        return view('pages.danhgiatukiem_doanthanhnien.index', compact('pagetitle', 'datadoanthanhniendanhgia'));
    }
    // Đoàn thanh niên đánh giá.
    public function updateDanhGiaCuaDoanThanhNien(Request $request)
    {
        try {
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key!= 'dsdoanthanhnien_length') {
                    $check = TuKiemDiem::where('user_id', $key)->first();
                    if ($check == null) {
                        $doanthanhnien = new TuKiemDiem();
                        $doanthanhnien->user_id = $key;
                        $doanthanhnien->form_tu_kiem_diem_doan_thanh_nien_danh_gia = $value;
                        $doanthanhnien->save();
                    } else {
                        $check->form_tu_kiem_diem_doan_thanh_nien_danh_gia = $value;
                        $check->save();
                    }

                }
            }
            return redirect()->back()->with('success', 'Cập nhật đánh giá thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
    // Công Đoàn đánh giá
    public function congDoanIndex()
    {
        $pagetitle = "Công Đoàn đánh giá";
        //Data danh sách đảng viên đánh giá tự kiểm điểm
        $datacongdoandanhgia = ThongTinNhanVien::from('thong_tin_nhan_vien')->select(
            'thong_tin_nhan_vien.user_id as user_id',
            'thong_tin_nhan_vien.user_ma',
            'thong_tin_nhan_vien.user_ho_ten',
            'form_tu_kiem_diem.form_tu_kiem_diem_cong_doan_danh_gia'
        )
            ->leftJoin('ql_user', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
            ->leftJoin('form_tu_kiem_diem', 'form_tu_kiem_diem.user_id', 'thong_tin_nhan_vien.user_id')
            ->where('user_dang_vien', 1)
            ->get();
        return view('pages.danhgiatukiem_congdoan.index', compact('pagetitle', 'datacongdoandanhgia'));
    }

    public function updateDanhGiaCuaCongDoan(Request $request)
    {
        try {
            // dd($request);
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key!= 'dscongdoan_length') {
                    $check = TuKiemDiem::where('user_id', $key)->first();
                    if ($check == null) {
                        $congdoan = new TuKiemDiem();
                        $congdoan->user_id = $key;
                        $congdoan->form_tu_kiem_diem_cong_doan_danh_gia = $value;
                        $congdoan->save();
                    } else {
                        $check->form_tu_kiem_diem_cong_doan_danh_gia = $value;
                        $check->save();
                    }

                }
            }
            return redirect()->back()->with('success', 'Cập nhật đánh giá thành công');
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }
}
