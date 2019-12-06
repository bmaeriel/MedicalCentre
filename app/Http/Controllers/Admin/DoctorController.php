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

  //to be able to use the function, need to be authorized - admin
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
      // limit data display to 6
      $doctor = Doctor::orderBy('created_at','desc')->paginate(6);
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

      //create new user
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

      //create new doctor
      $doctor = new Doctor();
      $doctor->user_id = $user->id; //set user id as doctor's user_id
      $doctor->date_start = $request->input('date_start');
      $doctor->save();

      //attach doctor to a role
      $user->roles()->attach(Role::where('name','doctor')->first());

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
      //get visits of doctor($id)
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

      $doctor = Doctor::findOrFail($id);
      $doctor->user->name = $request->input('name');
      $doctor->user->email = $request->input('email');
      $doctor->user->password = bcrypt('secret');
      $doctor->user->address1 = $request->input('address1');
      $doctor->user->address2 = $request->input('address2');
      $doctor->user->city = $request->input('city');
      $doctor->user->country = $request->input('country');
      $doctor->user->phone_number = $request->input('phone_number');
      $doctor->date_start = $request->input('date_start');
      $doctor->user->save(); //save updates in user table
      $doctor->save(); //save doctor

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
