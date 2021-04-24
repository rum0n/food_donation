@extends('layouts.master')


@section('title','Donate')


@push('css')

@endpush


@section('banner')

@endsection


@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-8 col-sm-10 col-md-10 offset-lg-2 offset-md-1">

                <form class="form-group" action="{{ route('user.donate.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInput1">Food Type</label>
                        <select class="form-control" type="text" id="exampleInput1" name="food_type">
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example2">Quantity (kg/Ltr)</label>
                        <input type="number" class="form-control" id="example2" aria-describedby="emailHelp" placeholder="Food Quantity" name="quantity">
                    </div>

                    <input type="hidden" value="1" name="campaign_id">

                    <div class="form-group">
                        <label for="exampledat">Pick up date</label>
                        <input type="date" class="form-control" id="exampledat" aria-describedby="emailHelp" name="pickupdate">
                    </div>

                    <div class="form-group">
                        <label for="exampletime">Pick up time</label>
                        <input type="time" class="form-control" id="exampletime" aria-describedby="emailHelp" name="pickuptime">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputmob1">Contact No.</label>
                        <input type="text" class="form-control" id="exampleInputmob1" aria-describedby="emailHelp" placeholder="Mobile Number" name="mobile_no">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputdes1">Description</label>
                        <textarea type="text" class="form-control" id="exampleInputdes1" aria-describedby="emailHelp" placeholder="Food Description" name="description"></textarea>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputaddr1">Pick up Location</label>--}}
                        {{--<input type="text" class="form-control" id="exampleInputaddr1" aria-describedby="emailHelp" placeholder="Your Address" name="pickup_address">--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <label for="searchmap">Pick Up Address</label>
                        <input type="text" id="searchmap" class="form-control mb-2" aria-describedby="emailHelp" name="pickup_address" placeholder="Enter Address">
                        <div id="map-canvas"></div>
                    </div>

                    <div class="form-group">
                         {{--<label for="lat">Lat</label>--}}
                        <input type="hidden" id="lat" class="form-control" name="lat">
                    </div>

                    <div class="form-group">
                         {{--<label for="lng">Long</label>--}}
                        <input type="hidden" id="lng" class="form-control" name="lon">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputpic1">Pictures</label>
                        <input type="file" class="default" id="exampleInputpic1" aria-describedby="emailHelp" name="food_pic">
                    </div>

                    <button type="submit" class="btn btn-info">Donate</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <!--------Js for google map---------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!--------Js for google map---------->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>

    <script>

        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat:23.810700943005976,
                lng:90.41672480468752
            },
            zoom:15,
            mapTypeId: 'roadmap'

        });
        var marker = new google.maps.Marker({
            position:{
                lat:23.810700943005976,
                lng:90.41672480468752
            },
            map:map,
            draggable:true

        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i , place;
            for(i=0;place=places[i];i++){

                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);

            }
            map.fitBounds(bounds);
            map.setZoom(8);
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

            //        $('#searchmap').val(getPosition(lat,lng));

        });
    </script>
@endpush