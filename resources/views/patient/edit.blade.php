@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit patient
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('patient.profile.update', $patient->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group ">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $patient->name) }}" required autocomplete="name" autofocus>
              </div>

              <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $patient->email) }}" required autocomplete="email">
              </div>
              <div class="form-group ">
                      <label for="address1"> Address 1</label>
                      <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1', $patient->address1) }}" required autocomplete="address1" autofocus>
              </div>
              <div class="form-group ">
                      <label for="address1"> Address 2</label>
                      <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2', $patient->address2) }}" autocomplete="address2" autofocus>
              </div>
              <div class="form-group ">
                      <label for="city"> City </label>
                      <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $patient->city) }}" required autocomplete="city" autofocus>
              </div>
              <div class="form-group ">
                    <label for="country"> Country </label>
                      <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $patient->country) }}" required autocomplete="country" autofocus>
              </div>

              <div class="form-group ">
                    <label for="phone_number"> Phone Number </label>
                      <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $patient->phone_number) }}" required autocomplete="phone_number" autofocus>
              </div>

              <div class="form-group ">
                    <label for="medical_insurance"> Medical Insurance </label> </br>
                    <input type="radio" name="medical_insurance" value="Yes" {{ ($patient->medical_insurance == 'Yes') ? "checked" : ""}}/> Yes</br>
                    <input type="radio" name="medical_insurance" value="No" {{ ($patient->medical_insurance == 'No') ? "checked" : ""}}/> No</br>
              </div>
                <div class="form-group ">
                      <label for="insurance_company"> Insurance company </label>
                        <input id="insurance_company" type="text" class="form-control" name="insurance_company" value="{{ old('insurance_company', $patient->insurance_company) }}"  autocomplete="insurance_company" autofocus>
                </div>
                <div class="form-group ">
                      <label for="policy_number"> Policy Number </label>
                        <input id="policy_number" type="text" class="form-control" name="policy_number" value="{{ old('policy_number', $patient->policy_number) }}"  autocomplete="policy_number" autofocus>
                </div>
                <a href="{{ route('patient.profile.show', $patient->id) }}" class="btn btn-link"> Cancel </a>
                <button type="submit" class="btn btn-primary float-right"> Submit </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
