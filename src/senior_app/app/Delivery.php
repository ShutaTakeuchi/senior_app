<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['user_id', 'shop_id', 'shop_name', 'staff'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }   
}