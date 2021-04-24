
@extends('admin.master')

@section('title','Food Types')

@push('css')

@endpush

@section('content')


    <div class="container">
        <div class="row mt-1">
            <div class="col-md-12">

                {{--@if($errors->all())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<li>{{$error}}</li>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--@endif--}}

                {{--@if(session('success'))--}}
                    {{--<div class="alert alert-success">--}}
                        {{--{{session('success')}}--}}
                    {{--</div>--}}
                {{--@endif--}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-10 offset-md-2 offset-lg-1">
                            <div class="mt-3 mb-3">
                                <form role="form" class="form-horizontal style-form" method="post" action="{{route('admin.type.store')}}">
                                    @csrf
                                    <div class="form-group has-success">
                                        <div class="col-lg-offset-1 col-lg-10">
                                            <input type="text" placeholder="Add New Food Type" id="f-name" class="form-control" name="name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-10">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus"> Add Food Type</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-advance table-hover">

                        <h4><i class="fa fa-angle-right"></i> Food Types</h4>
                        <hr>

                        <thead>
                        <tr>
                            <th>S.I</th>
                            <th> Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($food_types as $x)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $x->name }}</td>

                                <td>
                                    <button onclick="deletePost({{ $x->id }})" type="submit" class="btn btn-danger btn-xs ml-1" ><i class="fa fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $x->id }}" action="{{ route('admin.type.destroy',$x->id) }}" method="POST">
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