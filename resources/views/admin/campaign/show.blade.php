@extends('admin.master')


@section('title','Campaign Details')


@push('css')

@endpush


@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- row -->
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="content-panel">
                        <div class="col-md-4 offset-md-4 mb-5 mt-5">
                            <img src="{{ asset('campaign_pics/'.$ourCampaign->picture) }}" alt="Picture" class="img img-responsive img-thumbnail" width="300">
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <tr>
                                <th>Name</th><td>{{ $ourCampaign->name }}</td>
                            </tr>
                            <tr>
                               <th>Created at</th><td>{{ \Carbon\Carbon::parse($ourCampaign->created_at)->format('d-m-Y') }}</td>

                            </tr>
                            <tr>
                                <th>Email</th><td>{{ $ourCampaign->description }}</td>
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
    <!-- Script for Delete -->
    <script type="text/javascript">
        function deleteUser(id) {
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