@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Welcome <br/> {{Auth::user()->name}}!</h2> <br/>
                    Manage your appointments: <br/>
                    View and cancel anytime!
                    <br/>
                </div>
            </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Visits
            </div>
            <div class="card-body">
              @if (count($visits) === 0)
                <p> There are no visits! </p>
              @else
                <table id="table-visits" class="table table-hover">
                  <thead>
                    <th> Doctor </th>
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
                        <td>{{ $visit->date }}</td>
                        <td>{{ $visit->time }}</td>
                        <td>{{ $visit->duration }}</td>
                        <td>{{ $visit->cost }}</td>
                        <td>
                          <a href="{{ route('patient.visit.show', $visit->id) }}" class="btn btn-default">View</a>
                          <form style="display:inline-block" method="POST" action="{{ route('patient.visit.destroy', $visit->id)}}">
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
