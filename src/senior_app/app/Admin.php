<?php
 
namespace App;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Admin extends Authenticatable
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function deliveries()
    {
        return $this->hasMany('App\Delivery');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

}