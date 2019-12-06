<?php
# @Author: maerielbenedicto
# @Date:   2019-11-17T22:40:33+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:15:12+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id'
  ];

  // protected $attributes = [
  //     'medical_insurance' = "No";
  // ];

  public function user(){
    return $this->belongsTo('App\User','user_id');
  }

  public function visits(){
    return $this->hasMany('App\Visit','patient_id');
  }
}
