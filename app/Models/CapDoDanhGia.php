<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapDoDanhGia extends Model
{
    use HasFactory;
    protected $table='cap_do_danh_gia';
    protected $primaryKey='cap_do_danh_gia_id';
    protected $fillable=['cap_do_danh_gia_ten'];
    public $timestamps=false;
}
