<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuKiemDiem extends Model
{
    use HasFactory;
    protected $table='form_tu_kiem_diem';
    protected $primaryKey='form_tu_kiem_diem_id';
    protected $fillable=['form_kiem_diem_id', 'tai_khoan_id', 'uu_diem_1_noi_dung', 'uu_diem_2_noi_dung',
                         'uu_diem_3_noi_dung', 'uu_diem_4_noi_dung', 'uu_diem_5_noi_dung',
                         'uu_diem_6_noi_dung', 'uu_diem_3_2_noi_dung', 'han_che_1_noi_dung', 'han_che_2_noi_dung',
                         'giai_trinh', 'lam_ro_trach_nhiem', 'bien_phap_khac_phuc', 'lanh_dao_don_vi_noi_dung',
                         'chi_bo_noi_dung', 'uu_diem_1_danh_gia', 'uu_diem_2_danh_gia', 'ket_qua_khac_phuc_danh_gia',
                         'ket_qua_khac_phuc_noi_dung','tu_nhan_muc_xl_can_bo', 'tu_nhan_muc_xl_dang_vien', 'lanh_dao_don_vi_danh_gia',
                         'chi_bo_danh_gia', 'chi_uy_danh_gia', 'form_tu_kiem_diem_doan_thanh_nien_danh_gia',
                         'form_tu_kiem_diem_cong_doan_danh_gia', 'thoi_gian_cap_nhat_lan_cuoi'
                        ];
    public $timestamps=false;
}
