@extends('admin.master')

@section('title','Donations')

@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins')}}/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')

    <div class="container">
        <div class="row mt-1">
            <div class="col-md-12">

                @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <div class="container">
                    {{--<table id="example1" class="table table-bordered table-striped">--}}
                    <table id="example1" class="table table-striped table-advance table-hover">

                        <h4><i class="fa fa-angle-right"></i> Donations</h4>
                        <hr>

                        <thead>
                        <tr>
                            <th>S.I</th>
                            <th>Donation Event</th>
                            <th>Donar Name</th>
                            <th>Food Type</th>
                            <th>Food Quantity</th>
                            <th>Pick up date</th>
                            <th>Mobile</th>
                            {{--<th>Picture</th>--}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($donations as $donation)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $donation->campaign->name }}</td>
                                <td>{{ $donation->user->name }}</td>
                                <td>{{ $donation->foodType->name }}</td>
                                <td>{{ $donation->quantity }}</td>
                                {{--<td>{{ $donation->pickupdate->diffForHumans() }}</td>--}}
                                <td>{{ \Carbon\Carbon::parse($donation->created_at)->format('d-m-Y') }}</td>

                                <td>{{ $donation->mobile_no }}</td>

                                {{--<td>--}}
                                    {{--<img src="{{ asset('donation/thumbnail/'.$donation->food_pic)}}" alt="Picture" class="img img-responsive img-thumbnail" width="100">--}}
                                {{--</td>--}}
                                <td style="width: 80px">

                                    @if($donation->status == 0)
                                        <button onclick="approveDonation({{ $donation->id }})" class="btn btn-danger btn-xs">Not Approved</button>
                                        <form id="approve-form-{{ $donation->id }}" class="form-horizontal" action="{{ route('admin.donation_status',$donation->id) }}" method="POST">
                                            @csrf
                                        </form>
                                    @elseif($donation->status == 1)
                                        <span class="btn btn-info btn-xs">Waiting For Collection</span>
                                    @else
                                        <span class="btn btn-success btn-xs">Collected</span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.donations.show',$donation->id) }}" class="btn btn-success btn-xs ml-1" title="See Donation details"><i class="fa fa-eye"></i></a>

                                    <button onclick="deletePost({{ $donation->id }})" type="submit" class="btn btn-danger btn-xs ml-1" ><i class="fa fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $donation->id }}" action="{{ route('admin.donations.destroy',$donation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-md-12 -->
        </div>
    </div>

@endsection

@push('js')
    <!--Data Table js-->
    <script src="{{asset('admin/plugins')}}/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('admin/plugins')}}/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
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

    <!--Onclick approve js-->
    <script type="text/javascript">
        function approveDonation(id) {
            swal({
                title: 'Are you sure?',
                //                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger mr-2',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                event.preventDefault();
                document.getElementById('approve-form-'+id).submit();
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