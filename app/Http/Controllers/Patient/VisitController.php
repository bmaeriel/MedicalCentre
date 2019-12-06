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
    $visit = Visit::find($id);
    return view('patient.visits.show')->with([
      'visit' => $visit
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $visit = Visit::findOrFail($id);
    $visit->delete();
    $request->session()->flash('danger', 'Visit cancelled successfully!'); //create flash message
    return redirect()->route('patient.home');
  }

}
