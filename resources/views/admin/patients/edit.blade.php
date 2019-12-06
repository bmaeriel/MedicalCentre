@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-md-offset-2">
        <div class="card mb-5">
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
            <form method="POST" action="{{ route('admin.patients.update', $patient->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class=" row form-group">
                <div class="col-md-6">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $patient->user->name) }}" required autocomplete="name" autofocus>
                </div>
                <div class="col">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $patient->user->email) }}" required autocomplete="email">
                </div>
              </div>
              <div class=" row form-group">
                <div class="col">
                  <label for="address1"> Address 1</label>
                  <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1', $patient->user->address1) }}" required autocomplete="address1" autofocus>
                </div>
                <div class="col">
                  <label for="address1"> Address 2</label>
                  <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2', $patient->user->address2) }}" autocomplete="address2" autofocus>
                </div>
              </div>
              <div class=" row form-group">
                <div class="col-md-6">
                  <label for="city"> City </label>
                  <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $patient->user->city) }}" required autocomplete="city" autofocus>
                </div>
                <div class="col-md-6">
                  <label for="country"> Country </label>
                  <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $patient->user->country) }}" required autocomplete="country" autofocus>
                </div>
              </div>
              <div class=" row form-group">
                <div class="col-md-6">
                  <label for="phone_number"> Phone Number </label>
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $patient->user->phone_number) }}" required autocomplete="phone_number" autofocus>
                </div>
              </div>
              <div class="row form-group pt-3">
                <div class="col-md-3 ">
                    <label for="medical_insurance"> Medical Insurance </label> </br>
                </div>
                <div class="col-md-2">
                    <input id="Yes" type="radio" name="medical_insurance" value="Yes" {{ ($patient->medical_insurance == 'Yes') ? "checked" : ""}}/> Yes</br>
                </div>
                <div class="col-md-2">
                    <input id="No" type="radio" name="medical_insurance" value="No" {{ ($patient->medical_insurance == 'No') ? "checked" : ""}}/> No</br>
                </div>
              </div>
              <hr>
              <div class="row form-group mb-0">
                <div class="col">
                  <p class="m-0"> If Yes, please fill up the following:</p>
                </div>
              </div>
              <div class="form-group row m-0">
                  <div class="col p-0">
                      <label for="insurance_company"> Insurance company </label>
                        <input id="insurance_company" type="text" class="form-control" name="insurance_company" value="{{ old('insurance_company', $patient->insurance_company) }}"  autocomplete="insurance_company" autofocus>
                  </div>
                  <div class="col">
                    <label for="policy_number"> Policy Number </label>
                    <input id="policy_number" type="text" class="form-control" name="policy_number" value="{{ old('policy_number', $patient->policy_number) }}"  autocomplete="policy_number" autofocus>
                  </div>
              </div>
              <div class="form-row pt-4">
                <div class="col">
                  <a href="{{ route('admin.patients.index') }}" class="btn btn-link"> Cancel </a>
                  <button type="submit" class="btn btn-primary float-right"> Submit </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
