<?php
# @Author: maerielbenedicto
# @Date:   2019-11-17T23:06:50+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-18T22:56:30+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Patient;

class PatientController extends Controller
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
    $patients = Patient::all();
    return view('admin.patients.index')->with([
      'patients' => $patients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.patients.create');
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
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'address1' => ['required', 'string', 'max:255'],
      'city' => ['required', 'string', 'max:255'],
      'country' => ['required', 'string', 'max:255'],
      'phone_number' => ['required', 'string', 'max:255']
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt('secret');
    $user->address1 = $request->input('address1');
    $user->address2 = $request->input('address2');
    $user->city = $request->input('city');
    $user->country = $request->input('country');
    $user->phone_number = $request->input('phone_number');
    $user->save();

    $patient = new Patient();
    $patient->user_id = $user->id;
    $patient->medical_insurance = $request->input('medical_insurance');
    $patient->insurance_company = $request->input('insurance_company');
    $patient->policy_number = $request->input('policy_number');
    $patient->save();

    $user->roles()->attach(Role::where('name','patient')->first());

    $request->session()->flash('success', 'Patient added successfully!'); //create flash message
    return redirect()->route('admin.patients.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $patient = Patient::findOrFail($id);
    $visits = $patient->visits()->get();
    return view('admin.patients.show')->with([
      'patient' => $patient,
      'visits' => $visits
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
    $patient = Patient::find($id);
    return view('admin.patients.edit')->with([
      'patient' => $patient
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
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'address1' => ['required', 'string', 'max:255'],
      'city' => ['required', 'string', 'max:255'],
      'country' => ['required', 'string', 'max:255'],
      'phone_number' => ['required', 'string', 'max:255']
    ]);

    $user = User::findOrFail($id);
    $patient = Patient::findOrFail($id);
    $patient->user->name = $request->input('name');
    $patient->user->email = $request->input('email');
    $patient->user->password = bcrypt('secret');
    $patient->user->address1 = $request->input('address1');
    $patient->user->address2 = $request->input('address2');
    $patient->user->city = $request->input('city');
    $patient->user->country = $request->input('country');
    $patient->user->phone_number = $request->input('phone_number');
    $patient->user_id = $user->id;
    $patient->medical_insurance = $request->input('medical_insurance');
    $patient->insurance_company = $request->input('insurance_company');
    $patient->policy_number = $request->input('policy_number');
    $patient->user->save();

    $request->session()->flash('info', 'Patient updated successfully!'); //create flash message
    return redirect()->route('admin.patients.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $patient = Patient::find($id);
    $patient->user()->delete();
    $request->session()->flash('danger', 'Patient deleted successfully!'); //create flash message
    return redirect()->route('admin.patients.index');
  }
}
