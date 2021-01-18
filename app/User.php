<?php

namespace App;

use App\Model\Billing_info;
use App\Model\Profile;
use App\Model\Specification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'email', 'password', 'user_type','phone','photo','status','dob','is_approved'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class,'worker_id','id');
    }

    // Client Billing Info
    public function billing_info(){
        return $this->hasOne(Billing_info::class);
    }

    public function specification(){
        return $this->hasMany(Specification::class, 'creator_id','id');
    }
}
