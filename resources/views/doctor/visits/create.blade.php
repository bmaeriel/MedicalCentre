@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new visit
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
            <form method="POST" action="{{ route('doctor.visit.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group row">
                <label for="doctor_id" class="col-md-4 col-form-label text-md-right">{{ __('Doctor') }}</label>
                <div class="col-md-6">
                  <select name="doctor_id" class="form-control">
                    {{-- {{$districts = App\District::All()}} --}}
                    <option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="patient_id" class="col-md-4 col-form-label text-md-right">{{ __('Patient') }}</label>
                <div class="col-md-6">
                <select name="patient_id" class="form-control">
                  {{-- {{$districts = App\District::All()}} --}}
                  <option value="">Select Patient</option>
                  @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">
                      {{$patient->user->name}}
                    </option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                  <div class="col-md-6">
                      <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="email">
                      @error('date')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                  <div class="col-md-6">
                      <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                      @error('time')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>
                  <div class="col-md-6">
                    <select name="duration" class="form-control">
                      <option value="" >Select duration</option>
                      <option value="15 minutes" >15 minutes </option>
                      <option value="30 minutes">30 minutes </option>
                      <option value="1 hour">1 hour </option>
                    </select>
                      @error('duration')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('Cost') }}</label>

                  <div class="col-md-6">
                      <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" required autocomplete="cost" autofocus>

                      @error('cost')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <a href="{{ route('doctor.home') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
