<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CamKet extends Model
{
    use HasFactory;
    protected $table = "form_cam_ket";
    protected $primaryKey = "form_cam_ket_id";

    protected $fillable = ['user_id', 'tieu_chi_1', 'tieu_chi_2', 'tieu_chi_3', 'tieu_chi_4', 'tieu_chi_5', 'tieu_chi_6', 'tieu_chi_7'];

    public $timestamps = false;
}
