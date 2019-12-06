<?php
# @Author: maerielbenedicto
# @Date:   2019-11-12T14:43:50+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:14:53+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  public function user(){
    return $this->belongsTo('App\User','user_id');
  }

  public function visits(){
    return $this->hasMany('App\Visit','doctor_id');
  }

}
