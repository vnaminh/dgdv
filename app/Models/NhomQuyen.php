<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomQuyen extends Model
{
    use HasFactory;
    protected $table='nhom_quyen';
    protected $primaryKey='nhom_quyen_id';
    protected $fillable=['nhom_quyen_id','nhom_quyen_ten','nhom_quyen_level'];
    public $timestamps=false;
}
