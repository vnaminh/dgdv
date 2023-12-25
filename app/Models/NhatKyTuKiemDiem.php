<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhatKyTuKiemDiem extends Model
{
    use HasFactory;
    protected $table='nhat_ky_form_tu_kiem_diem';
    protected $primaryKey='nhat_ky_form_tu_kiem_diem_id';
    protected $fillable=['thoi_gian_thay_doi', 'du_lieu_cu', 'du_lieu_moi', 'id_user_thuc_hien', 'id_user_duoc_thay_doi', 'vi_tri_thay_doi', 'loai_thay_doi'];
    public $timestamps=false;
}
