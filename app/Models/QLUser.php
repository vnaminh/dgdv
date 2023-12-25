<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QLUser extends Model
{
    use HasFactory;
    protected $table = "ql_user";
    protected $primaryKey = "user_id";
    protected $fillable = ['user_name', 'user_pass', 'user_code', 'dm_vai_tro_id',
                        'user_active', 'user_phu_trach_danh_gia_nang_suat', 'user_code_tam_thoi',
                        'user_hidden', 'user_avatar', 'dm_ly_do_khong_danh_gia_id', 'user_dang_vien',
                        'user_dang_vien', 'nhom_quyen_id'];
    public $timestamps = false;
    public function getAuthPassword()
    {
        return $this->user_pass;
    }
}
