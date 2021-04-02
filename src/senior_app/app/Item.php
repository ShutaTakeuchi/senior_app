<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['user_id', 'item_id', 'item_name', 'admin_id', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }   
}
