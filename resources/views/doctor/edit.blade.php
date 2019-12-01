@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
        <div class="card mt-4 mb-4">
          <div class="card-header">
            Edit  doctor
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
            <form method="POST" action="{{ route('doctor.profile.update', $doctor->id) }}">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class=" row form-group p-2">
                <div class="col-md-6">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $doctor->user->name) }}" required autocomplete="name" autofocus>
                </div>
                <div class="col">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $doctor->user->email) }}" required autocomplete="email">
                </div>
              </div>
              <div class=" row form-group p-2">

                <div class="col">
                  <label for="password">Password</label>
                  <input id="text" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('email', $doctor->user->password) }}">
                </div>
                <div class="col">
                  <label for="password">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col">
                  <label for="address1"> Address 1</label>
                  <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1', $doctor->user->address1) }}" required autocomplete="address1" autofocus>
                </div>
                <div class="col">
                  <label for="address1"> Address 2</label>
                  <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2', $doctor->user->address2) }}" autocomplete="address2" autofocus>
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col-md-6">
                  <label for="city"> City </label>
                  <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $doctor->user->city) }}" required autocomplete="city" autofocus>
                </div>
                <div class="col-md-6">
                  <label for="country"> Country </label>
                  <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $doctor->user->country) }}" required autocomplete="country" autofocus>
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col-md-6">
                  <label for="phone_number"> Phone Number </label>
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $doctor->user->phone_number) }}" required autocomplete="phone_number" autofocus>
                </div>
                <div class="col-md-6">
                    <label for="date_start"> Date Start </label>
                    <input id="date_start" type="date" class="form-control" name="date_start" value="{{ old('date_start', $doctor->date_start) }}" required autocomplete="date_start" autofocus>
                </div>
              </div>
              <a href="{{ route('doctor.profile.show', $doctor->id) }}" class="btn btn-link mt-2"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
