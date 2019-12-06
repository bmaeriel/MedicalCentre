@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            My profile
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{ $patient->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $patient->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{ $patient->user->address1 }}
                        {{ $patient->user->address2 }}</br>
                        {{ $patient->user->city }}
                        {{ $patient->user->country }}
                    </td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $patient->user->phone_number }}</td>
                  </tr>
                  <tr>
                    <td>Medical Insurance</td>
                    <td>{{ $patient->medical_insurance }}</td>
                  </tr>
                  @if ($patient->medical_insurance == 'Yes')
                    <tr>
                      <td>Insurance Company</td>
                      <td>{{ $patient->insurance_company }}</td>
                    </tr>
                    <tr>
                      <td>Policy Number</td>
                      <td>{{ $patient->policy_number }}</td>
                    </tr>
                  @endif
                </tbody>
              </table>
              <a href="{{ route('patient.home', $patient->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('patient.profile.edit', $patient->id)}}" class="btn btn-warning">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('layouts.footer')
@endsection
