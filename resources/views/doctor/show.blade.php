@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-2">
        <div class="card" >
          <div class="card-header">
            My Profile
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{ $doctor->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $doctor->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{ $doctor->user->address1 }}
                        {{ $doctor->user->address2 }} <br/>
                        {{ $doctor->user->city }}<br/>
                        {{ $doctor->user->country }}
                  </td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $doctor->user->phone_number }}</td>
                  </tr>
                  <tr>
                    <td>Date started</td>
                    <td>{{ $doctor->date_start }}</td>
                  </tr>

                </tbody>
              </table>
              <a href="{{ route('doctor.home', $doctor->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('doctor.profile.edit', $doctor->id)}}" class="btn btn-warning">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
