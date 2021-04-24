
@extends('admin.master')

@section('title','Campaign Lists')

@push('css')
<link rel="stylesheet" href="{{asset('admin/plugins')}}/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')


    <div class="container">
        <div class="row mt-1 ml-2 mr-2">
            <div class="col-md-12">

                <div class="content-panel">
                    <div class="mt-3 mb-3">
                        <a href="" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i> <b> CAMPAIGN</b></a>

                        {{--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">--}}
                            {{--Launch Large Modal--}}
                        {{--</button>--}}

                    </div>
                    <table id="example1" class="table table-striped table-advance table-hover">

                        <h4><i class="fa fa-angle-right"></i> Our Campaign List</h4>
                        <hr>

                        <thead>
                        <tr>
                            <th>S.I</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($campaigns as $x)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $x->name }}</td>
                                <td>{{ str_limit($x->description,50)  }}</td>
                                <td>{{ \Carbon\Carbon::parse($x->created_at)->format('d-m-Y')  }}</td>
                                <td>
                                    @if(!$x->picture)
                                        <p>No image</p>
                                    @else
                                        <img src="{{ asset('campaign_pics/'.$x->picture) }}" class="img-responsive img-thumbnail" width="100">
                                    @endif
                                </td>


                                <td>
                                    <a href="{{ route('admin.our_campaign.show',$x->id) }}" class="btn btn-success btn-xs ml-1" title="See Campain details"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.our_campaign.edit',$x->id) }}" class="btn btn-primary btn-xs ml-1" title="Edit Campaign"><i class="fa fa-edit"></i></a>

                                    <button onclick="deletePost({{ $x->id }})" type="submit" class="btn btn-danger btn-xs ml-1"  ><i class="fa fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $x->id }}" action="{{ route('admin.our_campaign.destroy',$x->id) }}" method="POST">
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

    <!-- /.Data input modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content row">
                <div class="modal-header">
                    <h4 class="modal-title ml-5">ADD NEW CAMPAIGN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.our_campaign.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="modal-body col-md-10 offset-md-1">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Organization Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDesc">Description</label>
                                <textarea type="text" class="form-control" id="exampleInputDesc" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Picture</label>
                                <input type="file" name="picture" class="form-control" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer justify-content-between">
                            <span class="modal_button"><button type="submit" class="btn btn-primary">Save changes</button></span>
                        </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


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

    <!--script for this pages-->
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