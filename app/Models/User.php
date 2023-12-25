<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // protected $guards = 'tai_khoan';
    // protected $table = 'tai_khoan';
    // protected $primaryKey = 'tai_khoan_id';
    // protected $fillable = ['tai_khoan_id', 'user_id', 'nhom_quyen_id', 'tai_khoan_ten', 'tai_khoan_mat_khau', 'tai_khoan_active'];
    // public $timestamps = false;
    protected $fillable = [
        'user_ma', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->tai_khoan_mat_khau;
    }
}
