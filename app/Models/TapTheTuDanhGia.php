<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TapTheTuDanhGia extends Model
{
    use HasFactory;

    protected $table='form_tap_the_tu_danh_gia';
    protected $primaryKey= 'form_tap_the_tu_danh_gia_id';
    protected $fillable = ['nhom_tap_the_id','uu_diem_1_noi_dung','uu_diem_1_danh_gia',
    'uu_diem_2_noi_dung','uu_diem_2_danh_gia','uu_diem_3_noi_dung','uu_diem_3_danh_gia',
    'uu_diem_4_noi_dung','uu_diem_4_danh_gia','uu_diem_5_noi_dung','uu_diem_5_danh_gia',
    'han_che_khuyet_diem','nguyen_nhan_han_che','ket_qua_khac_phuc_noi_dung','ket-qua_khac_phuc_danh_gia',
    'giai_trinh_van_de','lam_ro_trach_nhiem','bien_phap_khac_phuc','tu_xep_loai'];

    public $timestamps = false;
}
