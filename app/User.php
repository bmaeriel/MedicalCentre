<?php
# @Author: maerielbenedicto
# @Date:   2019-08-27T22:26:48+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:05:32+00:00




namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address1','city','country','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor(){
      return $this->hasOne('App\Doctor');
    }

    public function patient(){
      return $this->hasOne('App\Patient');
    }

    public function roles() {
      return $this->belongsToMany('App\Role','user_role');
    }

    public function visits() {
      return $this->hasManyThrough('App\Visit','App\Doctor');
    }

    public function visit() {
      return $this->hasManyThrough('App\Visit','App\Patient');
    }

    public function authorizeRoles($roles) {
      if(is_array($roles)){
        return $this->hasAnyRoles($roles) || abort(401,'This action is unathorized.');
      }
      return $this->hasRole($roles) || abort(401,'This action is unathorized.');
    }

    public function hasRole($role) {
      return null != $this->roles()->where('name',$role)->first();
    }

    //In -> looks for element in a list
    public function hasAnyRole($roles) {
      return null != $this->roles()->whereIn('name',$roles)->first();
    }


}
