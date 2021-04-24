<!-- //Login Modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" id="defaultForm-email" class="form-control validate" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="defaultForm-pass" class="form-control validate" required autocomplete="current-password">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                    </div>
                    <div class="checkbox ml-2 mt-0">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>

                <div class="form-group row mb-0 mt-2">
                    <div class="col-md-6 offset-md-3">
                        @if (Route::has('password.request'))
                            <a class="btn-link ml-4" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    {{--<div class="modal-footer d-flex justify-content-center centered">--}}
                    {{--<button type="submit" class="btn btn-info"  onclick="window.location.href='{{ route('register') }}'">Sign Up</button>--}}

                    {{--<button type="submit" class="btn btn-danger"  onclick="window.location.href='{{ url('login/google') }}'">Login with Google</button>--}}
                    {{--</div>--}}
                </div>
            </form>
            <div class="modal-footer d-flex justify-content-center centered">
                <button type="submit" class="btn btn-info"  onclick="window.location.href='{{ route('register') }}'">Sign Up</button>

                <button type="submit" class="btn btn-danger"  onclick="window.location.href='{{ url('login/google') }}'">Login with Google</button>
            </div>
        </div>
    </div>
</div>
<!-- //Login Modal Ends -->


<!-- //Sign Up Modal -->
<div class="modal fade" id="modalSignUpForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign Up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input id="orangeForm-name" class="form-control validate" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" id="defaultForm-email" class="form-control validate" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="defaultForm-pass" class="form-control validate" required autocomplete="new-password">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control validate" required autocomplete="new-password">
                        <label data-error="wrong" data-success="right" for="password-confirm">Confirm password</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">{{ __('Sign Up') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- //Sign Up Modal Ends -->

