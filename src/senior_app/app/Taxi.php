<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    protected $fillable = ['status', 'user_id', 'admin_id', 'place'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }   

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }   
}
