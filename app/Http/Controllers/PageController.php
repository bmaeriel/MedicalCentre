<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:53:35+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-12T14:02:57+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
      return view('welcome');
    }
}
