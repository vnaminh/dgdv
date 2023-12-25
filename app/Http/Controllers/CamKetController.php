<?php

namespace App\Http\Controllers;

use App\Models\CamKet;
use Illuminate\Http\Request;
use Validator;
class CamKetController extends Controller
{
    public function index1()
    {
        $pagetitle = "CAM KẾT";
        //Data danh sách đảng viên cam kết
        $datacamket =CamKet::from('form_cam_ket')
            ->leftJoin('ql_user', 'ql_user.user_id', 'form_cam_ket.user_id')
            ->leftJoin('thong_tin_nhan_vien', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
            ->get();
        return view('pages.camket.index1', compact('pagetitle', 'datacamket'));
    }
    public function index($id)
    {
        $pagetitle = "CAM KẾT";
        $datacamket=CamKet::from("form_cam_ket")
                ->where("user_id", $id)->first();
        $tab = session()->get('tab');
        $user_id=$id;
        if($datacamket==null){
            for ($i = 1; $i <= 3; $i++)
                $ttdg[$i] = "chuadanhgia";
        }else{
            for( $i = 1; $i <= 3; $i++ )
            $ttdg[$i] = "dadanhgia";
            $tt_tab[1] = [$datacamket->tieu_chi_1,  $datacamket->tieu_chi_2];

            $tt_tab[2] = [$datacamket->tieu_chi_3,  $datacamket->tieu_chi_4];

            $tt_tab[3] = [$datacamket->tieu_chi_5, $datacamket->tieu_chi_7];

            for ( $i = 1; $i <= 3; $i++ ) {
                foreach( $tt_tab[$i] as $item => $value) {
                    if ($value == null) {
                        $ttdg[$i] = "chuadanhgia";
                        break;
                    }
                }
            }
        }
        return view('pages.camket.index', compact('pagetitle','datacamket','tab','ttdg','user_id'));
    }
    public function storeCamKet(Request $request,$id)
    {
        try {
            $tab = $request->tab;
            $validator = $this->validateCamKet($request, $tab);
            $user_id=$id;

            $modelCamKet = new CamKet();
            $modelCamKet->user_id=$user_id;
            if($tab==1){
                $modelCamKet->tieu_chi_1=$request->tieuchi1;
                $modelCamKet->tieu_chi_2=$request->tieuchi2;
            }else if($tab== 2){
                $modelCamKet->tieu_chi_3=$request->tieuchi3;
                $modelCamKet->tieu_chi_4=$request->tieuchi4;
            }else if($tab== 3){
                $modelCamKet->tieu_chi_5=$request->tieuchi5;
                $modelCamKet->tieu_chi_6=$request->tieuchi6;

                $modelCamKet->tieu_chi_7=$request->tieuchi7;
            }


            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }
            $modelCamKet->save();
            $tab++;
            return redirect()->route('camketManage.indexCamKet',['user_id'=>$user_id])->with("tab",$tab);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }

    }

    public function updateCamKet(Request $request, $id)
    {
        try {
            $tab = $request->tab;
            $validator = $this->validateCamKet($request, $tab);
            $user_id=$id;
            $model=CamKet::from("form_cam_ket")
                ->where("user_id",$id)->first();
            $modelCamKet = CamKet::find($model->form_cam_ket_id);
            $modelCamKet->user_id=$user_id;

            if($tab==1){
                $modelCamKet->tieu_chi_1=$request->tieuchi1;
                $modelCamKet->tieu_chi_2=$request->tieuchi2;
            }else if($tab== 2){
                $modelCamKet->tieu_chi_3=$request->tieuchi3;
                $modelCamKet->tieu_chi_4=$request->tieuchi4;
            }else if($tab== 3){
                $modelCamKet->tieu_chi_5=$request->tieuchi5;
                $modelCamKet->tieu_chi_6=$request->tieuchi6;

                $modelCamKet->tieu_chi_7=$request->tieuchi7;
            }

            if ($validator->fails()) {
                // dd($validator->errors()->all());
                return redirect()->back()->with(array('tab' => $tab))
                    ->withErrors($validator->errors()->toArray())
                    ->withInput();
            }
            $modelCamKet->save();
            $tab++;
            return redirect()->route('camketManage.indexCamKet',['user_id'=>$user_id])->with("tab",$tab);
        } catch (\Exception $e) {
            echo 'Có lỗi phát sinh: ', $e->getMessage(), "\n";
        }
    }

    public function validateCamKet($request, $tab)
    {
        try {
            if ($tab == 1) {
                $rules = [
                    'tieuchi1' => 'required',
                    'tieuchi2' => 'required',
                ];
                $customMessages = [
                    'tieuchi1.required' => 'Nội dung tiêu chí 1 không được bỏ trống.',
                    'tieuchi2.required' => 'Nội dung tiêu chí 2 không được bỏ trống.'
                ];
            } else if ($tab == 2) {
                $rules = [
                    'tieuchi3' => 'required',
                    'tieuchi4' => 'required',
                ];
                $customMessages = [
                    'tieuchi3.required' => 'Nội dung tiêu chí 3 không được bỏ trống.',
                    'tieuchi4.required' => 'Nội dung tiêu chí 4 không được bỏ trống.'
                ];
            } else if ($tab == 3) {
                $rules = [
                    'tieuchi5' => 'required',
                    // 'tieuchi6' => 'required',
                    //'tieuchi7' => 'required',
                ];
                $customMessages = [
                    'tieuchi5.required' => 'Nội dung tiêu chí 5 không được bỏ trống.',
                    // 'tieuchi6.required' => 'Nội dung tiêu chí 6 không được bỏ trống.',
                    //'tieuchi7.required' => 'Nội dung tiêu chí 7 không được bỏ trống.',
                ];
            }

            // dd($request->noi_dung1_1);
            $validator = Validator::make($request->all(), $rules, $customMessages);
            return $validator;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
