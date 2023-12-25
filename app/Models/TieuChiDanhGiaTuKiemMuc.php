<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieuChiDanhGiaTuKiemMuc extends Model
{
    use HasFactory;
    protected $table='tieu_chi_danh_gia_tu_kiem_diem_muc';
    protected $primaryKey='tieu_chi_danh_gia_tu_kiem_diem_muc_id';
    protected $fillable=['tieu_chi_danh_gia_tu_kiem_diem_muc_ten','tieu_chi_danh_gia_tu_kiem_diem_muc_active', 'has_noi_dung', 'has_danh_gia'];
    public $timestamps=false;
}
