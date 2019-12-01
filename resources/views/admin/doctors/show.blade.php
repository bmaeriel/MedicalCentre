@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Doctor: {{$doctor->user->name}}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{ $doctor->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $doctor->user->email }}</td>
                  </tr>
                  <tr>
                    <td>Address 1</td>
                    <td>{{ $doctor->user->address1 }}</td>
                  </tr>
                  <tr>
                    <td>Address 2</td>
                    <td>{{ $doctor->user->address2 }}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{ $doctor->user->city }}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{ $doctor->user->country }}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $doctor->user->phone_number }}</td>
                  </tr>
                  <tr>
                    <td>Date started</td>
                    <td>{{ $doctor->date_start }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.doctors.index', $doctor->id)}}" class="btn btn-default">Back</a>
              <a href="{{ route('admin.doctors.edit', $doctor->id)}}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id)}}">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <button type="submit" class="form-control btn btn-danger">Delete</a>
              </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Visits <a href="{{ route('admin.visits.create', $doctor->id)}}" class="btn btn-primary float-right"> Add </a>
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
                        <th> Time</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @foreach($visits as $visit)
                          <tr data-id="{{ $visit->id }}">
                            <td>{{ $visit->patient->user->name }}</td>
                            <td>{{ $visit->time }}</td>
                            <td>
                              <a href="{{ route('admin.visits.show', $doctor->id) }}" class="btn btn-default">View</a>
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
