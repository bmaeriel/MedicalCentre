@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome Dr. {{Auth::user()->name}}! <br/>

                    <a href="{{ route('doctor.profile.show', Auth::user()->id) }}">Profile</a>
                    {{-- <a href="{{ route('doctor.visit.index') }}">Visits</a> --}}
                    {{-- <a href="{{ route('doctor.visits.create', Auth::user()->id) }}">Add Visits</a> --}}

                </div>
            </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Visits
              <a href="{{ route('doctor.visit.create', Auth::user()->id)}}" class="btn btn-primary float-right"> Add </a>
            </div>
            <div class="card-body">
              @if (count($visits) === 0)
                <p> There are no visits! </p>
              @else
                <table id="table-visits" class="table table-hover">
                  <thead>
                    <th> Doctor </th>
                    <th> Patient</th>
                    <th> Date </th>
                    <th> Time </th>
                    <th> Duration </th>
                    <th> Cost </th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @foreach ($visits as $visit)
                      <tr data-id="{{ $visit->id }}">
                        <td>{{ $visit->doctor->user->name }}</td>
                        <td>{{ $visit->patient->user->name }}</td>
                        <td>{{ $visit->date }}</td>
                        <td>{{ $visit->time }}</td>
                        <td>{{ $visit->duration }}</td>
                        <td>{{ $visit->cost }}</td>
                        <td>
                          <a href="{{ route('doctor.visit.show', $visit->id) }}" class="btn btn-default">View</a>
                          <a href="{{ route('doctor.visit.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                          <form style="display:inline-block" method="POST" action="{{ route('doctor.visit.destroy', $visit->id)}}">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button type="submit" class="form-control btn btn-danger">Cancel</a>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
