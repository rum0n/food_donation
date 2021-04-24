@extends('layouts.master')


@section('title','Waste No Food')


@push('css')

    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/swiper.min.css">
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/style.css">
    {{--<link rel="stylesheet" href="{{asset('frontEnd/css')}}/modal.css">--}}

@endpush


@section('banner')
    <!-- .hero-slider -->
    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">

                <img src="{{asset('frontEnd/images')}}/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>4 a better world</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Waste No Food is a [non-profit organization] that provides a web-based food rescue "marketplace" allowing excess food to be donated from the food service industry to qualified charities that work with the needy</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <a href="{{ route('user.donate.create') }}" class="btn gradient-bg mr-2">Donate Now</a>

                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            <div class="swiper-slide hero-content-wrap">

                <img src="{{asset('frontEnd/images')}}/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>4 a better world</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Waste No Food is a [non-profit organization] that provides a web-based food rescue "marketplace" allowing excess food to be donated from the food service industry to qualified charities that work with the needy</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <a href="{{ route('user.donate.create') }}" class="btn gradient-bg mr-2">Donate Now</a>

                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            <div class="swiper-slide hero-content-wrap">

                <img src="{{asset('frontEnd/images')}}/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>4 a better world</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Waste No Food is a [non-profit organization] that provides a web-based food rescue "marketplace" allowing excess food to be donated from the food service industry to qualified charities that work with the needy</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <a href="{{ route('user.donate.create') }}" class="btn gradient-bg mr-2">Donate Now</a>

                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->
        </div><!-- .swiper-wrapper -->

        <div class="pagination-wrap position-absolute w-100">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div><!-- .container -->
        </div><!-- .pagination-wrap -->

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div>
    <!-- .hero-slider -->
@endsection


@section('content')

    <div class="our-causes pt-0">
        <div class="container">
            <div class="row">
                <div class="coL-12 ml-3">
                    <div class="section-heading">
                        <h2 class="entry-title">Latest Donations</h2>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">

                @foreach($donations as $donation)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="cause-wrap">
                            <figure class="m-0">
                                {{--<img src="{{asset('frontEnd/images')}}/hero.jpg" alt="">--}}
                                <img src="{{ asset('/donation/donationPic/'.$donation->food_pic)}}" alt="Pictures">

                                <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">

                                    {{--<a href="{{route('donation_view', $donation->id)}}"  class="btn gradient-bg mr-2" data-toggle="modal" data-target="#centralModalInfo">--}}
                                        {{--See Details--}}
                                    {{--</a>--}}

                                    <a href="{{ route('donation_view',$donation->id) }}" class="btn gradient-bg mr-2">See Details</a>

                                </div><!-- .figure-overlay -->
                            </figure>

                            <div class="cause-content-wrap">
                                <header class="entry-header d-flex flex-wrap align-items-center" style="min-height: 90px;;">
                                    <h3 class="entry-title w-100 m-0"><a href="{{ route('donation_view',$donation->id) }}" title="See Details">{{ $donation->foodType->name }}</a></h3>
                                </header><!-- .entry-header -->
                                <div class="fund-raised-total" style="font-size: 14px; font-weight: 500">
                                    Donated by : <span class="text-info">{{ $donation->user->name }}</span>
                                </div><!-- .fund-raised-total -->

                                <div class="entry-content">
                                    {{--<p class="m-0">{{  }}</p>--}}

                                    <p class="m-0">{{ str_limit($donation->description, 100)  }}</p>
                                </div><!-- .entry-content -->

                                <div class="fund-raised w-100">
                                    <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="fund-raised-total mt-4">
                                            Status :
                                            <b>
                                                @if($donation->status == 0)
                                                    Pending
                                                @elseif($donation->status == 1)
                                                    Approved
                                                @else
                                                    Distributed
                                                @endif
                                            </b>

                                        </div><!-- .fund-raised-total -->

                                        <div class="fund-raised-goal mt-4">
                                            {{ Carbon\Carbon::parse($donation->created_at)->diffForHumans() }}
                                        </div><!-- .fund-raised-goal -->
                                    </div><!-- .fund-raised-details -->
                                </div><!-- .fund-raised -->


                            </div><!-- .cause-content-wrap -->
                        </div><!-- .cause-wrap -->
                    </div><!-- .col -->

                @endforeach

            </div><!-- .row -->

            <span class="paginate_design">{{$donations->links()}}</span>

        </div><!-- .container -->

    </div><!-- .our-causes -->

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


@push('js')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


@endpush