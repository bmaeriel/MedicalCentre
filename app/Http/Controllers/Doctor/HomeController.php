<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:27:40+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T20:29:33+00:00




namespace App\Http\Controllers\Doctor;
use App\Doctor;
use App\User;
use App\Role;
use App\Visit;
use Auth;

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
    $doctor = Auth::user();
    //retrieve the visits of the doctor 
    $visits = $doctor->visits()->get();
    // dd($doctor);
    return view('doctor.home')->with([
      'doctor' => $doctor,
      'visits' => $visits
    ]);
  }
}
