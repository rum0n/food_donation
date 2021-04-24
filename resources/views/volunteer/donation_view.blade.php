
@extends('layouts.master')


@section('title','Donation')


@push('css')
    <link href="{{ asset('user') }}/user.css" rel="stylesheet">
@endpush


@section('banner')

@endsection


@section('content')

    <div class="container emp-profile" style="min-height: 604px;">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="profile-img">
                            <img src="{{ asset('user/proPic/'.Auth::user()->pro_pic) }}" alt="Profile Picture"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="profile-work ml-1">

                        <h3>
                            {{ Auth::user()->name }}
                        </h3>
                        <h4>
                            {{ Auth::user()->role->name }}
                        </h4>

                        <p class="row">
                            <a href="{{ route('volunteer.edit') }}"  type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"> Edit Profile</a>
                        </p>
                    </div>
                </div>
                </div>

            {{--</div>--}}
            {{--<div class="row ">--}}

                <div class="col-md-8">
                    <div class="col-md-4 offset-md-4 mb-4" >
                        <img src="{{ asset('/donation/donationPic/'.$donation->food_pic)}}" alt="Donation Picture" class="img img-responsive img-thumbnail" width="300">
                    </div>
                    <table class="table table-advance">
                        <tr>
                            <th>Food Type</th><td>{{ $donation->foodType->name }}</td>
                        </tr>
                        <tr>
                            <th>Food Quantity</th><td>{{ $donation->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Pick Up Date</th><td>{{ $donation->pickupdate->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Pick Up Time</th><td>{{ $donation->pickuptime }}</td>
                        </tr>

                        <tr>
                            <th>Description</th><td>{{ $donation->description }}</td>
                        </tr>
                        <tr>
                            <th>Address</th><td>{{ $donation->pickup_address }}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th><td>{{ $donation->mobile_no }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($donation->status == 0)
                                    <span class="">Not Approved</span>
                                @elseif($donation->status == 1)
                                    <span class="">Waiting For Collection</span>
                                @else
                                    <span class="">Collected</span>
                                @endif

                            </td>

                        </tr>

                    </table>
                </div>

            </div>
        </form>
    </div>

@endsection


@push('js')

@endpush
