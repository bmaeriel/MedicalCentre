<?php
# @Author: maerielbenedicto
# @Date:   2019-08-27T22:26:48+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:02:34+00:00




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');

//Doctors  - Admin can create, read, update and delete doctors
Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

//Doctors - doctors can read and update own details
Route::get('/doctor/{id}', 'Doctor\ProfileController@show')->name('doctor.profile.show');
Route::get('/doctor/{id}/edit', 'Doctor\ProfileController@edit')->name('doctor.profile.edit');
Route::put('/doctors/{id}', 'Doctor\ProfileController@update')->name('doctor.profile.update');

//Patients - Admin can create, read, update and delete patients
Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

//Patients - Patient can read and update own details
Route::get('/patient/{id}', 'Patient\ProfileController@show')->name('patient.profile.show');
Route::get('/patient/{id}/edit', 'Patient\ProfileController@edit')->name('patient.profile.edit');
Route::put('/patient/{id}', 'Patient\ProfileController@update')->name('patient.profile.update');

//Visits - Admin can create, read, update and delete visits
Route::get('/admin/visits', 'Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitController@destroy')->name('admin.visits.destroy');

//Visits - Doctors can create, read, update and delete(cancel) a visit
Route::get('/doctor/visits', 'Doctor\VisitController@index')->name('doctor.visit.index');
Route::get('/doctor/visits/create/{id}', 'Doctor\VisitController@create')->name('doctor.visit.create');
Route::get('/doctor/visits/{id}', 'Doctor\VisitController@show')->name('doctor.visit.show');
Route::post('/doctor/visits/store', 'Doctor\VisitController@store')->name('doctor.visit.store');
Route::get('/doctor/visits/{id}/edit', 'Doctor\VisitController@edit')->name('doctor.visit.edit');
Route::put('/doctor/visits/{id}', 'Doctor\VisitController@update')->name('doctor.visit.update');
Route::delete('/doctor/visits/{id}', 'Doctor\VisitController@destroy')->name('doctor.visit.destroy');

//Visits - Patients can create, read, update and delete(cancel) a visit
Route::get('/patient/visits', 'Patient\VisitController@index')->name('patient.visit.index');
Route::get('/patient/visits/{id}', 'Patient\VisitController@show')->name('patient.visit.show');
Route::delete('/patient/visits/{id}', 'Patient\VisitController@destroy')->name('patient.visit.destroy');
