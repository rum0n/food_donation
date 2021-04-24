@extends('layouts.master')

@section('title','Update Profile')

@section('content')
    <div class="container">
        <div class="row">
            {{--@if($errors -> any())--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<div class="alert alert-dismissible alert-warning">--}}
                        {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                        {{--<strong>Oh snap!</strong>{{ $error }}--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--@endif--}}
            <div class="col-lg-8 col-md-8 offset-md-2 offset-lg-2">

                <form class="" role="form" method="post" action="{{ route('user.update',Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf

                    <h3 style="margin: 10px;">Update User Profile</h3>

                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="name" class="control-label" >Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="name" class="control-label" >About</label>
                            <input type="text" name="about" class="form-control" id="name" value="{{ Auth::user()->about }}" required>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="name" class="control-label" >Phone</label>
                            <input type="text" name="phone" class="form-control" id="name" value="{{ Auth::user()->phone }}" required>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="name" class="control-label" >Address</label>
                            <input type="text" name="address" class="form-control" id="name" value="{{ Auth::user()->address }}" required>
                        </div>
                    </div>


                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="pic" class="control-label" >Profile Picture</label>
                            <input type="file" name="pro_pic" class="form-control" id="pic">
                        </div>
                    </div>


                    <div class="form-group col-lg-2">
                        <button type="submit"  class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

@endsection