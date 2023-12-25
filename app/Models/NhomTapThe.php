<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomTapThe extends Model
{
    use HasFactory;
    protected $table='nhom_tap_the';
    protected $primaryKey='nhom_tap_the_id';
    protected $fillable=['nhom_tap_the_id','nhom_tap_the_ten'];
    public $timestamps=false;
}
