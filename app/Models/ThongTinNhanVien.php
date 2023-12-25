<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinNhanVien extends Model
{
    use HasFactory;
    protected $table='thong_tin_nhan_vien';
    protected $primaryKey='user_id';
    protected $fillable=['user_id','user_ho_ten','user_ma',
                'chi_bo','user_ngay_sinh','user_gioi_tinh','chuc_vu_dang',
                'chuc_vu_chinh_quyen','chuc_vu_doan_the','don_vi_con_tac'];

    public $timestamps=false;
}
