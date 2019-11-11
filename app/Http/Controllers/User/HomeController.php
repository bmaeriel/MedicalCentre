<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:13:43+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T20:14:20+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:user');
  }

  public function index() {
    return view('user.home');
  }
}
