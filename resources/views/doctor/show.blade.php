@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Doctor details: {{$doctor->user->name}}
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
                    <td>Address 1</td>
                    <td>{{ $doctor->user->address1 }}</td>
                  </tr>
                  <tr>
                    <td>Address 2</td>
                    <td>{{ $doctor->user->address2 }}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{ $doctor->user->city }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{ $doctor->user->country }}</td>
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
