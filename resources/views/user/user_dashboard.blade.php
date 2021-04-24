
@extends('layouts.master')


@section('title','Profile')


@push('css')
    <link rel="stylesheet" href="{{asset('frontEnd/css')}}/bootstrap-3.4.1.min.css">
@endpush


@section('banner')

@endsection


@section('content')

@push('css')
    <link href="{{ asset('user') }}/user.css" rel="stylesheet">
@endpush

    <div class="container emp-profile" style="font-size: 16px">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('user/proPic/'.Auth::user()->pro_pic) }}" alt="Profile Picture"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Donations</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-md-2">--}}
                    {{--<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>--}}
                {{--</div>--}}
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="profile-work ml-1">
                        <h3>
                            {{ Auth::user()->name }}
                        </h3>
                        <h4>
                            {{ Auth::user()->role->name }}
                        </h4>

                        <p class="message">
                            <a href="{{ route('user.messages.index') }}" class=""> Message Admin</a>
                        </p>

                        <p class="row">
                            <a href="{{ route('user.edit') }}"  type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"> Edit Profile</a>
                        </p>

                    </div>
                </div>

                <div class="col-md-8" style="top: -100px;">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->role->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>About</label>
                                </div>
                                <div class="col-md-6">
                                    @if(!Auth::user()->about)
                                        <a href="{{ route('user.edit') }}" ><p class="text-warning">Update Info</p></a>
                                    @else
                                    <p>{{ Auth::user()->about }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div style="position: relative; top: -82px;">
                            @if(count($donations)==0)
                                <h3 class="text-danger ml-5" >No Donations Available</h3>
                            @else
                            <table class="table table-striped table-advance">

                                {{--<h4><i class="fa fa-angle-right"></i> Donations</h4>--}}

                                <thead>
                                <tr>
                                    <th>S.I</th>
                                    <th>Title</th>
                                    <th>Pick up date</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($donations as $donation)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $donation->foodType->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($donation->pickupdate)->diffForHumans() }}</td>
                                        <td>{{ $donation->mobile_no }}</td>

                                        <td>
                                            @if($donation->status == 0)
                                                <span class="btn btn-danger btn-xs">Not Approved</span>
                                            @elseif($donation->status == 1)
                                                <span class="btn btn-info btn-xs">Waiting For Collection</span>
                                            @else
                                                <span class="btn btn-success btn-xs">Collected</span>
                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('user.donate.show',$donation->id) }}" class="btn btn-success btn-xs ml-1 text-white" title="See Donation details"><i class="fa fa-eye"></i></a>

                                            @if($donation->status == 0)
                                                <a href="{{ route('user.donate.edit',$donation->id) }}" class="btn btn-primary btn-xs ml-1 text-white" title="Edit Donation details"><i class="fa fa-edit"></i></a>
                                            @else
                                            @endif

                                            {{--<button onclick="deletePost({{ $donation->id }})" type="submit" class="btn btn-danger btn-xs ml-1 text-white" ><i class="fa fa-trash-o"></i></button>--}}
                                            {{--<form id="delete-form-{{ $donation->id }}" action="{{ route('user.donate.destroy',$donation->id) }}" method="POST">--}}
                                                {{--@method('DELETE')--}}
                                                {{--@csrf--}}
                                            {{--</form>--}}
                                            {{--<button onclick="deletePost({{ $donation->id }})" type="submit" class="btn btn-danger btn-xs ml-1 text-white" ><i class="fa fa-trash-o"></i></button>--}}
                                            {{--<form id="delete-form-{{ $donation->id }}" action="{{ route('user.delete_donation',$donation->id) }}">--}}
                                                {{--@csrf--}}
                                            {{--</form>--}}

                                            <a href="{{ route('user.delete_donation',$donation->id) }}" class="btn btn-danger btn-xs ml-1 text-white" title="See Donation details"><i class="fa fa-trash-o"></i></a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection


@push('js')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#myTab a').on('click', function (e) {
                e.preventDefault()
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
//                    $(this).tab('show');
            })
        });
    </script>

    <!--Onclick delete js-->
    <script type="text/javascript">
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger mr-2',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                    // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                )
            }
        })
        }
    </script>
@endpush
