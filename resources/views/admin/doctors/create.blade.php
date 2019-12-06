@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new doctor
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
            <form method="POST" action="{{ route('admin.doctors.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class=" row form-group p-2">
                <div class="col">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control p-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="col">
                    <label for="date_start"> Date Start </label>
                    <input id="date_start" type="date" class="form-control p-3 @error('date_start') is-invalid @enderror" name="date_start" value="{{ old('date_start') }}" required autocomplete="date_start" autofocus>
                      @error('date_start')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control p-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="phone_number"> Phone Number </label>
                    <input id="phone_number" type="text" class="form-control p-3 @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col">
                  <label for="address1"> Address 1</label>
                  <input id="address1" type="text" class="form-control p-3 @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>
                    @error('address1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                  <label for="address1"> Address 2</label>
                  <input id="address2" type="text" class="form-control p-3 @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" autocomplete="address2" autofocus>
                    @error('address2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class=" row form-group p-2">
                <div class="col-md-6">
                  <label for="city"> City </label>
                  <input id="city" type="text" class="form-control p-3 @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                  <label for="country"> Country </label>
                  <input id="country" type="text" class="form-control p-3 @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>


              <a href="{{ route('admin.doctors.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
