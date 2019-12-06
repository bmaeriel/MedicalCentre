<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;


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

      //get patient's id where user_id matches the $id
      $patient = Patient::where('user_id', $id)->first();
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
      $patient = Patient::find($id);
      // dd($patient);
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
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'address1' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'phone_number' => ['required', 'string', 'max:255']
      ]);

      $patient = Patient::findOrFail($id);
      $patient->user->name = $request->input('name');
      $patient->user->email = $request->input('email');
      $patient->user->password = Hash::make($request['password']); //encrypt password
      $patient->user->address1 = $request->input('address1');
      $patient->user->address2 = $request->input('address2');
      $patient->user->city = $request->input('city');
      $patient->user->country = $request->input('country');
      $patient->user->phone_number = $request->input('phone_number');
      $patient->medical_insurance = $request->input('medical_insurance');
      $patient->insurance_company = $request->input('insurance_company');
      $patient->policy_number = $request->input('policy_number');
      $patient->user->save();
      $patient->save();

      $request->session()->flash('success', 'Profile updated successfully!'); //create flash message
      return redirect()->route('patient.home');
    }
}
