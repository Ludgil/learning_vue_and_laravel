<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [

        'order_details' => 'array'
    ];

    protected $fillable = [];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
