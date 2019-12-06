<?php
# @Author: maerielbenedicto
# @Date:   2019-11-09T00:46:23+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-12T14:25:56+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $user = $request->user();
      $home = 'patient.home';

      //if user has role (admin/doctor/patient) leads to specific dashboard
      if($user->hasRole('admin')){
        $home = 'admin.home';
      } else if($user->hasRole('doctor')){
        $home = 'doctor.home';
      }
      else {
        $home = 'patient.home';
      }
      return redirect()->route($home);
    }
}
