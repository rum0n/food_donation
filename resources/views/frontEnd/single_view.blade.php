@extends('layouts.master')


@section('title','Donation Details')


@push('css')

@endpush


@section('banner')

@endsection


@section('content')

    <div class="featured-cause">
        <div class="container">
            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--<div class="section-heading">--}}
                        {{--<h2 class="entry-title">Donation Details</h2>--}}
                    {{--</div><!-- .section-heading -->--}}
                {{--</div><!-- .col -->--}}
            {{--</div><!-- .row -->--}}

            <div class="row">
                <div class="col-12 col-lg-10 col-md-10 offset-md-1 offset-lg-1">
                    <div class="cause-wrap d-flex flex-wrap justify-content-between">
                        <div class="centered ">
                            <figure class="m-0">
                                <img src="{{ asset('/donation/donationPic/'.$donation->food_pic)}}" alt="Donation Pictures">

                                {{--<img src="{{asset('frontEnd/images')}}/featured-causes.jpg" alt="">--}}
                            </figure>
                        </div>

                        <div class="cause-content-wrap mt-5">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <h3 class="entry-title w-100 m-0"><a>{{ $donation->foodType->name }}</a></h3>

                                <div class="posted-date">
                                    <a>{{ Carbon\Carbon::parse($donation->created_at)->diffForHumans() }}</a>
                                </div><!-- .posted-date -->

                                <div class="cats-links">
                                    <a>{{ $donation->pickup_address }}</a>
                                </div><!-- .cats-links -->


                                {{--<div class="posted-date">--}}
                                    {{--<a>{{ Carbon\Carbon::parse($donation->created_at)->diffForHumans() }} </a>--}}
                                {{--</div><!-- .posted-date -->--}}

                                {{--<div class="cats-links">--}}
                                    {{--<a>{{ $donation->pickup_address }}</a>--}}
                                {{--</div><!-- .cats-links -->--}}


                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p class="m-0">{{ $donation->description }}.</p>
                            </div><!-- .entry-content -->


                        </div><!-- .cause-content-wrap -->


                    </div><!-- .cause-wrap -->
                </div><!-- .col -->


            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .featured-cause -->


    <!-- .our-donars -->
    <div class="home-page-limestone">
        <div class="container">
            <div class="row align-items-end">

                <div class="col-12 col-lg-6 offset-md-3 offset-lg-3 ">
                    <div class="milestones d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{asset('frontEnd/images')}}/teamwork.png" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="{{$approve_donations}}" data-speed="2000"></div>
                                    <div class="counter-k"></div>
                                </div>

                                <h3 class="entry-title">Donations</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->

                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{asset('frontEnd/images')}}/donation.png" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="{{$donars}}" data-speed="2000"></div>
                                </div>

                                <h3 class="entry-title">Donar</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->

                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{asset('frontEnd/images')}}/dove.png" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="{{$volunteers}}" data-speed="2000"></div>
                                </div>

                                <h3 class="entry-title">Volunteeres</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->
                    </div><!-- .milestones -->
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- .our-donars -->


@endsection

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@push('js')



@endpush