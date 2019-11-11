<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:27:40+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T20:29:33+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }

  public function index() {
    return view('doctor.home');
  }
}
