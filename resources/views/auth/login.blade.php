@extends('layouts.app')

@section('content')
<div class="container pb-5 pt-2">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div>
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="mt-2 mb-3">
                    <form  class="text-center pl-5 pr-5 pt-4 pb-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="mb-4"> Log in</h3>

                        <div class="form-group row">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password"> {{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mb-3" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            {{-- </div> --}}
                        </div>

                        <div class="form-group row ">
                            {{-- <div class="col-md-8 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary pl-4 pr-4">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link ml-3" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
