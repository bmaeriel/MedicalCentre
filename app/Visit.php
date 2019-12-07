<?php
# @Author: maerielbenedicto
# @Date:   2019-11-18T23:45:43+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-18T23:53:59+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function patient(){
    return $this->belongsTo('App\Patient','patient_id');
  }

  public function doctor(){
    return $this->belongsTo('App\Doctor','doctor_id');
  }

}
