<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $with = ['category'];

    protected $guarded =[];

    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
