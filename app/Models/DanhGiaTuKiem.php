<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaTuKiem extends Model
{
    use HasFactory;
    protected $table='form_danh_gia_tu_kiem';
    protected $primaryKey='danh_gia_tu_kiem_id';
    protected $fillable=['danh_gia_tu_kiem_id','tai_khoan_id', 'tieu_chi_danh_gia_tu_kiem_id', 'danh_gia_tu_kiem_noi_dung', 'danh_gia_tu_kiem_muc_do'];
    public $timestamps=false;
}
