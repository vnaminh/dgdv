<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyenDanhGiaTapThe extends Model
{
    use HasFactory;
    protected $table='phan_quyen_danh_gia_tap_the';
    protected $primaryKey='phan_quyen_danh_gia_tap_the_id';
    protected $fillable=['phan_quyen_danh_gia_tap_the_id','user_id','nhom_tap_the_id'];
    public $timestamps=false;
}
