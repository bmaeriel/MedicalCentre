@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Patient Details: {{$patient->name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{ $patient->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $patient->email }}</td>
                  </tr>
                  <tr>
                    <td>Address 1</td>
                    <td>{{ $patient->address1 }}</td>
                  </tr>
                  <tr>
                    <td>Address 2</td>
                    <td>{{ $patient->address2 }}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{ $patient->city }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{ $patient->country }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $patient->phone_number }}</td>
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
@endsection
