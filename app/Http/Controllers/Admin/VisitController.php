<?php

namespace App\Http\Controllers\Admin;
use App\Visit;
use App\Doctor;
use App\Patient;
use App\User;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $doctors = Doctor::All();
      $patients = Patient::All();
      $users = User::All();
      $visits = Visit::All();
      return view('admin.visits.index')->with([
        'doctors' => $doctors,
        'patients' => $patients,
        'users' => $users,
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctors = Doctor::All();
      $patients = Patient::All();
      $users = User::All();
      // $dId = Doctor::find();
      return view('admin.visits.create')->with([
        'doctors' => $doctors,
        'patients' => $patients,
        'users' => $users,
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

      $request->session()->flash('success', 'Visit added successfully!'); //create flash message
      return redirect()->route('admin.visits.index');
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
      return view('admin.visits.show')->with([
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
      return view('admin.visits.edit')->with([
        'doctor' => $doctor,
        'patient' => $patient,
        'visit' => $visit,
        'user' => $user,
        'doctors' => $doctors,
        'patients' => $patients,

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

      $request->session()->flash('info', 'Visit updated successfully!'); //create flash message
      return redirect()->route('admin.visits.index');
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
      // $user = User::findOrFail($id);
      $visit->delete();
      $request->session()->flash('danger', 'Visit deleted successfully!'); //create flash message
      return redirect()->route('admin.visits.index');
    }
}
