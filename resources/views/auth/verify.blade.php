@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="">
                <div class=""><h2 style="color: darkgreen;">{{ __('Verify Your Email Address') }}</h2></div>

                <div class="verify">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif


                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}

                        <div class="col-md-8 offset-md-2 mt-5" >
                            <a style="background: orangered" class="btn btn-block text-white" href="{{ route('verification.resend') }}"><h6>{{ __('Get Link') }}</h6></a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
