<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table = 'codes';

    protected $casts = [
        'items_code' => 'array'
    ];
    protected $fillable = ['order_code', 'item', 'no_of_items', 'items_code'];
}
