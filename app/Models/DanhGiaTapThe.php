<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaTapThe extends Model
{
    use HasFactory;
    protected $table="form_danh_gia_tap_the";
    protected $primaryKey= "danh_gia_tap_the_id";
    protected $fillable=["danh_gia_tap_the_id","tai_khoan_id","tieu_chi_danh_gia_tap_the_id","danh_gia_tap_the_ten","danh_gia_tap_the_noi_dung","danh_gia_tap_the_danh_gia"];
    public $timestamps=false;

}
