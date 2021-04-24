@extends('admin.master')

@section('title','Donation')

@section('title','')


@push('css')

@endpush


@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- row -->
            <div class="row mt">
                <div class="col-md-10 offset-md-1 mb-5">
                    <div class="content-panel">
                        <div class="col-md-4 offset-md-4 mt-5 mb-5">
                            <img src="{{ asset('/donation/donationPic/'.$donation->food_pic)}}" alt="" class="img img-responsive img-thumbnail" width="300">
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <tr>
                                <th>Donar Name</th><td>{{ $donation->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Food Type</th><td>{{ $donation->foodType->name }}</td>
                            </tr>
                            <tr>
                                <th>Food Quantity</th><td>{{ $donation->quantity }}</td>
                            </tr>
                            <tr>
                                <th>Pick Up Date</th><td>{{ $donation->pickupdate->format('d-m-Y') }}</td>
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
                                    <span class="btn btn-danger btn-xs">Not Approved</span>
                                @elseif($donation->status == 1)
                                    <span class="btn btn-info btn-xs">Waiting For Collection</span>
                                @else
                                    <span class="btn btn-success btn-xs">Collected</span>
                                @endif

                                </td>
                            </tr>

                        </table>
                    </div>
                    <!-- /content-panel -->
                </div>
            </div>
        </section>
    </section>
@endsection


@push('js')
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