@extends('layouts.master')


@section('title','Waste No Food')


@push('css')

<link rel="stylesheet" href="{{asset('frontEnd/css')}}/swiper.min.css">
<link rel="stylesheet" href="{{asset('frontEnd/css')}}/style.css">
{{--<link rel="stylesheet" href="{{asset('frontEnd/css')}}/modal.css">--}}

@endpush


@section('banner')

@endsection


@section('content')

    <div class="our-causes pt-0">
        <div class="container">
            <div class="row">
                <div class="coL-12 ml-3">
                    <div class="section-heading">
                        <h3 class="entry-title">Our Campaigns</h3>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">

                @foreach($campaigns as $campaign)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="cause-wrap">
                            <figure class="m-0">
                                {{--<img src="{{asset('frontEnd/images')}}/hero.jpg" alt="">--}}
                                <img src="{{ asset('/campaign_pics/'.$campaign->picture)}}" alt="Pictures">

                                <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">

                                    <a href="{{ route('user.donate_now', $campaign->id) }}" class="btn gradient-bg mr-2">Donate Now</a>

                                </div><!-- .figure-overlay -->
                            </figure>

                            <div class="cause-content-wrap">
                                <header class="entry-header d-flex flex-wrap align-items-center">
                                    <h3 class="entry-title w-100 m-0"><a href="{{ route('user.donate_now', $campaign->id) }}" title="See Details">{{ $campaign->name }}</a></h3>
                                </header><!-- .entry-header -->
                                <div class="fund-raised-total" style="font-size: 14px; font-weight: 500">
                                    Created at : <span class="text-info">{{ \Carbon\Carbon::parse($campaign->created_at)->format('d-m-Y') }}</span>
                                </div><!-- .fund-raised-total -->

                                <div class="entry-content">
                                    <p class="m-0">{{ str_limit($campaign->description, 70)  }}</p>
                                    <div class="entry-footer text-right mr-1">
                                        <a class="btn-link text-decoration-none" href="{{ route('campaign_details',$campaign->id) }}">Read More</a>
                                    </div><!-- .entry-footer -->
                                </div><!-- .entry-content -->

                                {{--<div class="fund-raised w-100">--}}
                                    {{--<div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">--}}
                                        {{--<div class="fund-raised-total mt-4">--}}
                                            {{--Status :--}}

                                        {{--</div><!-- .fund-raised-total -->--}}

                                        {{--<div class="fund-raised-goal mt-4">--}}
                                            {{--{{ Carbon\Carbon::parse($campaign->created_at)->diffForHumans() }}--}}
                                        {{--</div><!-- .fund-raised-goal -->--}}
                                    {{--</div><!-- .fund-raised-details -->--}}
                                {{--</div><!-- .fund-raised -->--}}


                            </div><!-- .cause-content-wrap -->
                        </div><!-- .cause-wrap -->
                    </div><!-- .col -->

                @endforeach

            </div><!-- .row -->

            <span class="paginate_design">{{$campaigns->links()}}</span>

        </div><!-- .container -->

    </div><!-- .our-causes -->

    <!-- .our-donars, users, volunteers -->
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