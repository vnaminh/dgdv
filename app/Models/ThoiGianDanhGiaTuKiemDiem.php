<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiGianDanhGiaTuKiemDiem extends Model
{
    use HasFactory;
    protected $table = "thoi_gian_danh_gia_tu_kiem_diem";
    protected $primaryKey = "thoi_gian_danh_gia_tu_kiem_diem_id";
    protected $fillable = ['thoi_gian_danh_gia_tu_kiem_diem_id',
                'thoi_gian_danh_gia_tu_kiem_diem_dang_vien',
                'thoi_gian_danh_gia_tu_kiem_diem_lanh_dao_don_vi',
                'thoi_gian_danh_gia_tu_kiem_diem_chi_bo',
                'thoi_gian_danh_gia_tu_kiem_diem_chi_uy'];

    public $timestamps = false;
}
