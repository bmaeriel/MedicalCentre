@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-md-offset-2">
        <div class="card mb-5">
          <div class="card-header">
            Add new patient
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
            <form method="POST" action="{{ route('admin.patients.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class=" row form-group">
                <div class="col-md-6">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <div class="col">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
              </div>
              <div class=" row form-group">
                <div class="col">
                  <label for="address1"> Address 1</label>
                  <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>
                </div>
                <div class="col">
                  <label for="address1"> Address 2</label>
                  <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" autocomplete="address2" autofocus>
                </div>
              </div>
              <div class=" row form-group">
                <div class="col-md-6">
                  <label for="city"> City </label>
                  <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                </div>
                <div class="col-md-6">
                  <label for="country"> Country </label>
                  <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                </div>
              </div>
              <div class=" row form-group">
                <div class="col-md-6">
                  <label for="phone_number"> Phone Number </label>
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                </div>
              </div>
              <div class="row form-group ">
                <div class="col-md-3">
                    <label for="medical_insurance"> Medical Insurance </label> </br>
                </div>
                <div class="col-md-2 p-1">
                    <input id="Yes" type="radio" name="medical_insurance" value="Yes"/> Yes</br>
                </div>
                <div class="col-md-2 p-1">
                    <input id="No" type="radio" name="medical_insurance" value="No"/> No</br>
                </div>
              </div>
                <hr>
              <div class="row form-group">
                <div class="col">
                <p> If Yes, please fill up the following:</p>
              </div>
              </div>
              <div id="more-details" class="form-row more-details">
                  <div class="col-md-6">
                      <label for="insurance_company"> Insurance company </label>
                        <input id="insurance_company" type="text" class="form-control" name="insurance_company" value="{{ old('insurance_company') }}"  autocomplete="insurance_company" autofocus>
                  </div>
                  <div class="col-md-6">
                    <label for="policy_number"> Policy Number </label>
                    <input id="policy_number" type="text" class="form-control" name="policy_number" value="{{ old('policy_number') }}"  autocomplete="policy_number" autofocus>
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
