<?php

namespace App\Http\Controllers\Doctor;

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
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $doctor = Auth::user();
    // dd($doctor);
    $visits = Doctor::user()->visits()->orderBy('time', 'desc')->get();
    dd($doctor);
    return view('doctor.visits.index')->with([
      'doctor' => $doctor,
      'visits' => $visits
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $doctor = Doctor::find($id);
    $patients = Patient::All();
    $users = User::All();
    // $dId = Doctor::find();
    return view('doctor.visits.create')->with([
      'doctor' => $doctor,
      'patients' => $patients,
      'users' => $users
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'doctor_id' => ['required', 'integer'],
      'patient_id' => ['required', 'integer'],
      'date' => ['required', 'date', 'max:255'],
      'time' => ['required', 'date_format:H:i'],
      'duration' => ['required', 'string', 'max:255'],
      'cost' => ['required', 'numeric']
    ]);

    $doctor = Doctor::find(1);
    $patient = Patient::find(1);
    // $user = User::findOrFail(1);

    $visit = new Visit();
    $visit->doctor_id = $request->input('doctor_id');
    $visit->patient_id = $request->input('patient_id');
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->duration = $request->input('duration');
    $visit->cost = $request->input('cost');
    $visit->save();

    return redirect()->route('doctor.home');
  }

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
    return view('doctor.visits.show')->with([
      'doctors' => $doctor,
      'patients' => $patient,
      'visit' => $visit
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $doctors = Doctor::all();
    $patients = Patient::all();
    $user = User::findOrFail(1);

    $doctor = Doctor::find(1);
    $patient = Patient::find(1);
    $visit = Visit::find($id);
    return view('doctor.visits.edit')->with([
      'doctor' => $doctor,
      'patient' => $patient,
      'visit' => $visit,
      'user' => $user,
      'patients' => $patients,
      'doctors' => $doctors
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'doctor_id' => ['required', 'integer'],
      'patient_id' => ['required', 'integer'],
      'date' => ['required', 'date', 'max:255'],
      'time' => ['required'],
      'duration' => ['required', 'string', 'max:255'],
      'cost' => ['required', 'numeric']
    ]);

    $doctor = Doctor::find(1);
    $patient = Patient::find(1);
    $visit = Visit::findOrFail($id);
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->duration = $request->input('duration');
    $visit->cost = $request->input('cost');
    $visit->save();

    return redirect()->route('doctor.home');
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
    return redirect()->route('doctor.home');
  }
}
