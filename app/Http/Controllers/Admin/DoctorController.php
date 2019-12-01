<?php
# @Author: maerielbenedicto
# @Date:   2019-11-12T15:15:23+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T16:37:07+00:00




namespace App\Http\Controllers\Admin;
use App\User;
use App\Doctor;
use App\Role;
use App\Visit;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
      $doctor = Doctor::all();
      return view('admin.doctors.index')->with([
        'doctors' => $doctor
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.doctors.create');
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

      $doctor = new Doctor();
      $doctor->user_id = $user->id;
      $doctor->date_start = $request->input('date_start');
      $doctor->save();

      $user->roles()->attach(Role::where('name','doctor')->first());

      // DB::table('password_resets')->insert( ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()] );
      $request->session()->flash('success', 'Doctor added successfully!'); //create flash message
      return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Doctor::findOrFail($id);
      $visits = $doctor->visits()->get();
      return view('admin.doctors.show')->with([
        'doctor' => $doctor,
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
      $doctor = Doctor::findOrFail($id);
      return view('admin.doctors.edit')->with([
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


      $request->session()->flash('info', 'Doctor updated successfully!'); //create flash message
      return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $doctor = Doctor::find($id);
      // dd($doctor);
      $doctor->user->delete();
      $request->session()->flash('danger', 'Doctor deleted successfully!'); //create flash message
      return redirect()->route('admin.doctors.index');
    }
}
