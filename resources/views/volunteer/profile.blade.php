@extends('layouts.master')

@section('title','Volunteer Profile')


@section('content')

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 offset-md-2 offset-lg-2">

                <form class="" role="form" method="post" action="{{ route('volunteer.update',Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf

                    <h3 style="margin: 10px;">Update Profile</h3>

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