<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use Auth;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($id);
      $patient = User::find($id);
      // dd($patient);
       return view('patient.show')->with([
        'patient' => $patient
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
      $patient = User::findOrFail($id);
      return view('patient.edit')->with([
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
      $patient->date_start = $request->input('date_start');
      $patient->medical_insurance = $request->input('medical_insurance');
      $patient->insurance_company = $request->input('insurance_company');
      $patient->policy_number = $request->input('policy_number');
      $patient->user->save();

      return redirect()->route('patient.home');
    }
}
