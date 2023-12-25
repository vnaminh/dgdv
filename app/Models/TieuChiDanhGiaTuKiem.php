<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieuChiDanhGiaTuKiem extends Model
{
    use HasFactory;
    protected $table='tieu_chi_danh_gia_tu_kiem';
    protected $primaryKey='tieu_chi_danh_gia_tu_kiem_id';
    protected $fillable=['tieu_chi_danh_gia_tu_kiem_noi_dung','tieu_chi_danh_gia_tu_kiem_active', 'tieu_chi_danh_gia_tu_kiem_noi_dung_active', 'tieu_chi_dadnh_gia_tu_kiem_danh_gia_active'];
    public $timestamps=false;
}
