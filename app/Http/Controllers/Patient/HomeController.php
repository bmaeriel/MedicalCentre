<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:27:47+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T20:32:37+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:patient');
  }

  public function index() {
    return view('patient.home');
  }
}
