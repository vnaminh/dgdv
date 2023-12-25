<?php

namespace App\Http\Controllers;

use App\Models\CamKet;
use App\Models\TapTheTuDanhGia;
use App\Models\TuKiemDiem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PDF;
use ZipArchive;

class DocumentController extends Controller
{
    // public function form06()
    // {
    //     $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')
    //         ->leftJoin('ql_user', 'ql_user.user_id', 'form_tu_kiem_diem.user_id')
    //         ->leftJoin('thong_tin_nhan_vien', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
    //         ->get();
    //     $data = [
    //         'datatukiemdiem' => $datatukiemdiem,
    //         'year'=> Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('Y'),
    //         'month'=> Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('m'),
    //         'day'=> Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('d'),
    //     ];
    //     $pdf = PDF::loadView('pages.word.form6', $data);
    //     $pdf->setPaper('A4', 'landscape');
    //     return $word->stream("form06.doc");
    // }

    // public function laydulieuform2($user_id)
    // {
    //     $datatukiemdiem = TuKiemDiem::from('form_tu_kiem_diem')
    //         ->leftJoin('ql_user', 'ql_user.user_id', 'form_tu_kiem_diem.user_id')
    //         ->leftJoin('thong_tin_nhan_vien', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
    //         ->where('form_tu_kiem_diem.user_id', $user_id)->first();

    //     if ($datatukiemdiem==null) return "";
    //     $dg = [""=>"", 0=>"", 1=>"Hoàn thành xuất sắc nhiệm vụ", 2=>"Hoàn thành tốt nhiệm vụ", 3=>"Hoàn thành nhiệm vụ", 4=>"Không hoàn thành nhiệm vụ"];
    //     $datatukiemdiem->lanh_dao_don_vi_danh_gia = $dg[$datatukiemdiem->lanh_dao_don_vi_danh_gia];
    //     $datatukiemdiem->chi_bo_danh_gia = $dg[$datatukiemdiem->chi_bo_danh_gia];
    //     $datatukiemdiem->chi_uy_danh_gia = $dg[$datatukiemdiem->chi_uy_danh_gia];
    //     // $datatukiemdiem->user_ngay_sinh = Carbon::createFromFormat('Y-m-d', $datatukiemdiem->user_ngay_sinh)->format('d/m/Y');

    //     $ngaycapnhat_lancuoi = $datatukiemdiem->thoi_gian_cap_nhat_lan_cuoi;
    //     $year = Carbon::createFromFormat('Y-m-d', $ngaycapnhat_lancuoi)->format('Y');
    //     $month = Carbon::createFromFormat('Y-m-d', $ngaycapnhat_lancuoi)->format('m');
    //     $day = Carbon::createFromFormat('Y-m-d', $ngaycapnhat_lancuoi)->format('d');
    //     $ten = $datatukiemdiem->user_ho_ten;
    //     $title = $year . '_' . "BanKiemDiemCaNhan" . '_' . $ten . ".doc";
    //     return array('datatukiemdiem' => $datatukiemdiem, 'year' => $year,'month' => $month,'day' => $day, 'title' => $title);
    // }
    // public function form02($user_id)
    // {
    //     $data = $this->laydulieuform2($user_id);
    //     $user_quyen = User::from('ql_user')->where('user_id', $user_id)->leftJoin('nhom_quyen', 'ql_user.nhom_quyen_id', 'nhom_quyen.nhom_quyen_id')->first()->nhom_quyen_level;
    //     $data += ['quyen_level'=>$user_quyen];
    //     if ($data=="") return redirect()->back()->withErrors('Lỗi chưa có dữ liệu', 'dulieu');
    //     $word = WORD::loadView('pages.word.form2', $data);
    //     return $word->stream($data['title']);
    // }
    // public function form01($user_id)
    // {
    //     $datakiemdiemtapthe = TapTheTuDanhGia::from('form_tap_the_tu_danh_gia')
    //         ->leftJoin('nhom_tap_the', 'nhom_tap_the.nhom_tap_the_id', 'form_tap_the_tu_danh_gia.nhom_tap_the_id')
    //     //     ->leftJoin('user', 'tai_khoan.user_id', 'user.user_id')
    //         ->where('form_tap_the_tu_danh_gia.nhom_tap_the_id', $user_id)->first();
    //     // $datatukiemdiem->user_ngay_sinh = Carbon::parse($datatukiemdiem->user_ngay_sinh)->format('d/m/Y');
    //     if($datakiemdiemtapthe==null){
    //         $error="Chưa hoàn thành đánh giá tập thể";
    //         return redirect()->back()
    //         ->with(array('error' => $error));
    //     }
    //     $year = Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('Y');
    //     $month= Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('m');
    //     $day=Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('d');
    //     $ten = $datakiemdiemtapthe->nhom_tap_the_ten;
    //     $title = $year . '_' . "BanKiemDiemTapThe" . '_' . $ten . ".doc";

    //     $data = ['datakiemdiemtapthe'=>$datakiemdiemtapthe,'year'=>$year,'month' => $month,'day' => $day,'title'=>$title];
    //     $word = WORD::loadView('pages.word.form1', $data);
    //     return $word->stream($data['title']);
    // }
    public function formcamketword($user_id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Hello World!');
        $file = 'HelloWorld.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // $xmlWriter->save(__DIR__ . '/formcamket.blade.php');
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
        // $xmlWriter->save(__DIR__ . '/formcamket.blade.php');

        // $datacamket = CamKet::from('form_cam_ket')
        // ->leftJoin('ql_user', 'ql_user.user_id', 'form_cam_ket.user_id')
        // ->leftJoin('thong_tin_nhan_vien', 'ql_user.user_id', 'thong_tin_nhan_vien.user_id')
        // ->where('form_cam_ket.user_id', $user_id)->first();
        // if($datacamket==null){
        //     $error="Chưa hoàn thành cam kết";
        //     return redirect()->route('camketManage.indexCamKet',['user_id'=>$user_id])
        //     ->with(array('error' => $error));
        // }
        // $year = Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('Y');
        // $month= Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('m');
        // $day=Carbon::now('Asia/Ho_Chi_Minh')->toDate()->format('d');
        // $ten = $datacamket->user_ho_ten;
        // $title = $year . '_' . "CamKet" . '_' . $ten . ".pdf";

        // // $data = new \PhpOffice\PhpWord\PhpWord();
        // $data = ['datacamket'=>$datacamket,'year'=>$year,'month' => $month,'day' => $day,'title'=>$title];
        // // $word = IOFactory::createReader('PHP');
        // // $word->load(__DIR__ . 'pages.word.formcamket');
        // $pdf = PDF::loadView('pages.pdf.formcamket', $data);
        // return $pdf->stream($data['title']);

//         // Tạo một đối tượng PhpWord
// $phpWord = new PhpWord();

// // Tạo một section mới
// $section = $phpWord->addSection();

// // Đọc nội dung của file PHP
// $content = file_get_contents('formcamket.blade.php');

// // Chèn nội dung vào section
// $section->addText($content);

// // Lưu tài liệu
// $phpWord->save('formcamket.docx');
}
    // public function downloadForm02(Request $request)
    // {
    //     $selected_user = $request->input('check');
    //     if ($selected_user==null)
    //         return redirect()->back()->withErrors('Chưa chọn Đảng viên muốn tải file word về!');
    //     $files = [];
    //     foreach ($selected_user as $key => $user_id) {
    //         $user_quyen = User::from('ql_user')->where('user_id', $user_id)->leftJoin('nhom_quyen', 'ql_user.nhom_quyen_id', 'nhom_quyen.nhom_quyen_id')->first()->nhom_quyen_level;
    //         // dd($value);
    //         $data = $this->laydulieuform2($user_id);
    //         $data += ['quyen_level'=>$user_quyen];
    //         $word = \PhpOffice\PhpWord\IOFactory::createWriter($data, 'Word2007');
    //         $word->save("php://output");
    //         $word->save(resource_path('views\pages\files\form02\\'.$data['title']));
    //         $files[] = resource_path('views\pages\files\form02\\'.$data['title']);
    //     }
    //     $zipname = $this->zipform2($files);
    //     return response()->download($zipname);
    // }

    // public function zipform2($files) {
    //     $zip = new ZipArchive;
    //     $fileName = 'form2_'.session('namhientai').'.zip';
    //     //Xoá file zip nếu tồn tại
    //     if(\File::exists(resource_path('views\pages\files\\'.$fileName))){
    //         \File::delete(resource_path('views\pages\files\\'.$fileName));
    //     }
    //     if ($zip->open(resource_path('views\pages\files\\'.$fileName), ZipArchive::CREATE) === TRUE) {
    //         foreach ($files as $key => $value) {
    //             $relativeNameInZipFile = basename($value);
    //             $zip->addFile($value, $relativeNameInZipFile);
    //         }
    //         $zip->close();
    //     }
    //     return resource_path('views\pages\files\\'.$fileName);
    // }
}
