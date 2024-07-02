<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'status',
        'warranty_case',
        'comment',
        'resolution'
    ];

    protected $table = 'orders';
}
