<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
    ];

    protected $table = 'user_orders';

    public $timestamps = false;
}
