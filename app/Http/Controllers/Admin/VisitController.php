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
      //limit data to 6
      $visits = Visit::orderBy('date','asc')->paginate(6);
      return view('admin.visits.index')->with([
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
      //retrieve all doctors/patients data
      $doctors = Doctor::All();
      $patients = Patient::All();
      return view('admin.visits.create')->with([
        'doctors' => $doctors,
        'patients' => $patients
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

      //create new visit
      $visit = new Visit();
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->save(); //save visit

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
      $visit = Visit::find($id);
      return view('admin.visits.show')->with([
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
      //retrieve all doctors/patients
      $doctors = Doctor::all();
      $patients = Patient::all();

      //get visit with the $id
      $visit = Visit::find($id);
      return view('admin.visits.edit')->with([
        'visit' => $visit,
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
      $visit->delete();
      $request->session()->flash('danger', 'Visit deleted successfully!'); //create flash message
      return redirect()->route('admin.visits.index');
    }
}
