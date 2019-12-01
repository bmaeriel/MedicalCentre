<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medical Centre') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm pt-4 mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Medical Centre') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                      {{-- <a class="navbar-brand" href="{{ route('admin.doctors.index') }}">
                              Doctors
                      </a>
                      <a class="navbar-brand" href="{{ route('admin.patients.index') }}">
                              Patients
                      </a>
                      <a class="navbar-brand" href="{{ route('admin.visits.index') }}">
                              Visits
                      </a> --}}

                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                           @if (Auth::user()->isAdmin())
                          <a class="navbar-brand" href="{{ route('admin.doctors.index') }}">
                                  Doctors
                          </a>
                          <a class="navbar-brand" href="{{ route('admin.patients.index') }}">
                                  Patients
                          </a>
                          <a class="navbar-brand" href="{{ route('admin.visits.index') }}">
                                  Visits
                          </a>
                          @endif
                        @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                          @if(Auth::check())
                            @if(Auth::user()->isPatient())
                              <a class="nav-link" href="{{ route('patient.home') }}">
                                      Dashboard
                              </a>
                              <a class="nav-link" href="{{ route('patient.profile.show', Auth::user()->id) }}">
                                      Profile
                              </a>
                            @endif
                            @if(Auth::user()->isDoctor())
                              <a class="nav-link" href="{{ route('doctor.home') }}">
                                      Dashboard
                              </a>
                              <a class="nav-link" href="{{ route('doctor.profile.show', Auth::user()->id) }}">
                                      Profile
                              </a>
                            @endif
                          @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main>
          <div class="container">
            <div class="row">
              {{-- loops through the alert keys then show specific alert style --}}
              <div class="col-md-12">
                @foreach (['danger','info','success'] as $key)
                  @if(Session::has($key))
                    <div class="alert alert-{{$key}} alert-dismissible fade show" role="alert">
                            {{ Session::get($key)}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
            @yield('content')
        </main>
    </div>
</body>
<script>
  setTimeout(function(){ $(".alert").alert('close') }, 5000); //alert disappears after 2 seconds
</script>
</html>
