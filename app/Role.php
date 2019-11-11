<?php
# @Author: maerielbenedicto
# @Date:   2019-11-09T00:56:45+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T19:54:13+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users() {
      return $this->belongsToMany('App\User','user_role');
    }
}
