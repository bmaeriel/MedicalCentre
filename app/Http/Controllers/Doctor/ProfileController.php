<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //doctor can only view own profile
    public function show($id)
    {
      $doctor = Doctor::find($id);
      // dd($doctor);
      return view('doctor.show')->with([
        'doctor' => $doctor
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //doctor can update own profile
    public function edit($id)
    {
      $doctor = Doctor::findOrFail($id);
      return view('doctor.edit')->with([
        'doctor' => $doctor
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

      $doctor = Doctor::findOrFail($id);
      $doctor->user->name = $request->input('name');
      $doctor->user->email = $request->input('email');
      $doctor->user->password = Hash::make($request['password']); //encrypt password
      $doctor->user->address1 = $request->input('address1');
      $doctor->user->address2 = $request->input('address2');
      $doctor->user->city = $request->input('city');
      $doctor->user->country = $request->input('country');
      $doctor->user->phone_number = $request->input('phone_number');
      $doctor->date_start = $request->input('date_start');
      $doctor->user->save(); //save doctor info in user table
      $doctor->save(); //save doctor

      $request->session()->flash('success', 'Profile updated successfully!'); //create flash message
      return redirect()->route('doctor.home');
    }
}
