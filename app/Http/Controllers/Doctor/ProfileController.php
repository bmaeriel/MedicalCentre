<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;

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
    public function show($id)
    {
      $doctor = Doctor::find($id);
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
        'address1' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'country' => ['required', 'string', 'max:255'],
        'phone_number' => ['required', 'string', 'max:255']
      ]);

      $user = User::findOrFail($id);
      $doctor = Doctor::findOrFail($id);
      $doctor->user->name = $request->input('name');
      $doctor->user->email = $request->input('email');
      $doctor->user->password = bcrypt('secret');
      $doctor->user->address1 = $request->input('address1');
      $doctor->user->address2 = $request->input('address2');
      $doctor->user->city = $request->input('city');
      $doctor->user->country = $request->input('country');
      $doctor->user->phone_number = $request->input('phone_number');
      $doctor->user_id = $user->id;
      $doctor->date_start = $request->input('date_start');
      $doctor->user->save();


      return redirect()->route('doctor.home');
    }
}
