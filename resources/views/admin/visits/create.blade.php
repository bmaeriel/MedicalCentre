@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
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
            <form method="POST" action="{{ route('admin.visits.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group row p-2">
                <div class="col">
                  <label for="doctor_id">Doctor</label>
                  <select name="doctor_id" class="form-control">
                    <option value="">Select Doctor</option>
                    @foreach($doctors as $doctor)
                      <option value="{{ $doctor->id }}" {{ ( $doctor->doctor_id == $doctor->id) ? 'selected' : '' }} >
                        {{$doctor->user->name}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                  <label for="patient_id">Patient</label>
                  <select name="patient_id" class="form-control">
                    <option value="">Select Patient</option>
                    @foreach($patients as $patient)
                      <option value="{{ $patient->id }}" {{ ( $patient->patient_id == $patient->id) ? 'selected' : '' }}>
                        {{$patient->user->name}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row p-2">
                <div class="col">
                      <label for="date"> Date </label>
                      <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                </div>
                <div class="col">
                  <label for="time"> Time </label>
                  <input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" autocomplete="time" autofocus>
                </div>
              </div>

              <div class="form-group row p-2">
                <div class="col">
                      <label for="duration"> Duration </label>
                      <select name="duration" class="form-control">
                        <option value="">Select duration</option>
                        <option value="15 minutes">15 minutes </option>
                        <option value="30 minutes">30 minutes </option>
                        <option value="1 hour">1 hour </option>
                      </select>
                    </div>
                    <div class="col">
                      <label for="cost"> Cost </label>
                        <input id="cost" type="text" class="form-control" name="cost" value="{{ old('cost') }}" required autocomplete="cost" autofocus>
                    </div>
              </div>
              <a href="{{ route('admin.visits.index') }}" class="btn btn-link"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
