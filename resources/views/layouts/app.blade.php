<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Medical Center</title>

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

      {{-- NAVBAR --}}
        <nav class="row">
          @include('layouts.navbar')
        </nav>

        <main class="container mb-3" style="position:relative;">
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
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <div class="row">
          @include('layouts.footer')
        </div>
    </div>
</body>

<script>
  setTimeout(function(){ $(".alert").alert('close') }, 5000); //alert disappears after 2 seconds
</script>
</html>
