<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_name',
        'order_id',
        'client_id',
        'worker_id',
        'order_date',
        'delivery_date',
        'spacification_id',
        'status',
        'price',
        'note'
    ];

    public function orderImage(){
        return $this->hasMany(Order_image::class,'order_id','id');
    }

    public function specification(){
        return $this->hasOne(Specification::class, 'id','spacification_id');
    }

    public function client(){
        return $this->hasOne(User::class, 'id','client_id');
    }

}


