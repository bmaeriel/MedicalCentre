@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
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
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>

                  <div class="col-md-6">
                      <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address1" autofocus>

                      @error('address1')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>
                  <div class="col-md-6">
                      <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" autocomplete="address2" autofocus>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                  <div class="col-md-6">
                      <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                      @error('city')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                  <div class="col-md-6">
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                      @error('country')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                  <div class="col-md-6">
                      <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="medical_insurance" class="col-md-4 col-form-label text-md-right">{{ __('Medical Insurance') }}</label>
                  <div class="col-md-6">
                    <input type="radio" onclick="showForm();" name="medical_insurance" value="Yes"/> Yes</br>
                    <input type="radio" onclick="hideForm();" name="medical_insurance" value="No"/> No</br>
                      @error('medical_insurance')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div id="more-details" class="more-details">
              <div class="form-group row">
                  <label for="insurance_company" class="col-md-4 col-form-label text-md-right">{{ __('Insurance company name') }}</label>
                  <div class="col-md-6">
                      <input id="insurance_company" type="text" class="form-control @error('insurance_company') is-invalid @enderror" name="insurance_company" value="{{ old('insurance_company') }}" autocomplete="insurance_company" autofocus>
                      @error('insurance_company')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="policy_number" class="col-md-4 col-form-label text-md-right">{{ __(' Policy Number') }}</label>
                  <div class="col-md-6">
                      <input id="policy_number" type="text" class="form-control @error('policy_number') is-invalid @enderror" name="policy_number" value="{{ old('policy_number') }}" autocomplete="policy_number" autofocus>
                      @error('policy_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
            </div>

              <a href="{{ route('admin.patients.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
