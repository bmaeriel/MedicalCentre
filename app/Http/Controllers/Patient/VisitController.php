<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Doctor;
use App\Patient;
use App\User;
use Auth;
use DB;

class VisitController extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $doctor = Doctor::find(1);
    $patient = Patient::find(1);
    $visit = Visit::find($id);
    return view('patient.visits.show')->with([
      'doctors' => $doctor,
      'patients' => $patient,
      'visit' => $visit
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $visit = Visit::findOrFail($id);
    // $user = User::findOrFail($id);
    $visit->delete();
    return redirect()->route('patient.home');
  }

}
