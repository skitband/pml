<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //
    protected $table = 'pizzas';

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
