<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieuChiDanhGiaTapThe extends Model
{
    use HasFactory;
    protected $table='tieu_chi_danh_gia_tap_the';
    protected $primaryKey='tieu_chi_danh_gia_tap_the_id';
    protected $fillable=['tieu_chi_danh_gia_tap_the_noi_dung','tieu_chi_danh_gia_tap_the_active','tieu_chi_danh_gia_tap_the_noi_dung_active','tieu_chi_danh_gia_tap_the_danh_gia_active'];
    public $timestamps=false;
}
