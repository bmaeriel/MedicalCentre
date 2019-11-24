<?php
# @Author: maerielbenedicto
# @Date:   2019-11-17T22:40:33+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:15:12+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }

  // public function visits(){
  //   return $this->belongsToMany('App\Doctor','visits','patient_id','doctor_id')->using('App\Visit');
  // }
  public function visits(){
    return $this->hasMany('App\Visit','patient_id');
  }
}
