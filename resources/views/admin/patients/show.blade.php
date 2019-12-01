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
                    <td>{{ $patient->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $patient->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Address 1</td>
                    <td>{{ $patient->user->address1 }}</td>
                  </tr>
                  <tr>
                    <td>Address 2</td>
                    <td>{{ $patient->user->address2 }}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{ $patient->user->city }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{ $patient->user->country }}</td>
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
              <a href="{{ route('admin.patients.index', $patient->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.patients.edit', $patient->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id)}}">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <button type="submit" class="form-control btn btn-danger">Delete</a>
              </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Visits <a href="{{ route('admin.visits.create', $patient->id)}}" class="btn btn-primary float-right"> Add </a>
          </div>
          <div class="card-body">

              <ul>
                @if (count($visits) == 0)
                  <p>There are no visits!</p>
                @else
                    {{-- <li> {{ $visit->time}} </li> --}}
                    <table id="table-visits" class="table table-hover">
                      <thead>
                        <th> Name</th>
                        <th> Date</th>
                        <th> Time</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @foreach($visits as $visit)
                          <tr data-id="{{ $visit->id }}">
                            <td>{{ $visit->doctor->user->name }}</td>
                            <td>{{ $visit->date }}</td>
                            <td>{{ $visit->time }}</td>
                            <td>
                              <a href="{{ route('admin.visits.show', $patient->id) }}" class="btn btn-default">View</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                @endif
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
