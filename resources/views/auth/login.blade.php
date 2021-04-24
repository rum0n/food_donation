@extends('layouts.master')

@section('title','Login')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6 col-md-6">

                @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <h4>Sign in</h4>

                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                        <input id="exampleInputEmail2" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">

                    </div>


                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                        <input id="exampleInputPassword2" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        {{--@error('password')--}}
                        {{--<span class="invalid-feedback alert alert-danger" role="alert">--}}
                                     {{--<strong class="">{{ $message }}</strong>--}}
                                {{--</span>--}}
                        {{--@enderror--}}

                    </div>

                    <div class="checkbox ml-4">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="form-group row mb-0 mt-4 centered">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-xs btn-primary">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn-link ml-5" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="col-md-8 mt-2 mb-5 mt-3 offset-md-2">
                            <button type="submit" class="btn btn-xs btn-info"  onclick="window.location.href='{{ route('register') }}'">Sign Up</button>

                            <button type="submit" class="btn btn-xs btn-danger ml-3"  onclick="window.location.href='{{ url('login/google') }}'">Login with Google</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
