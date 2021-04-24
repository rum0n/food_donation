
@extends('admin.master')

@section('title','Campaign Lists')

@push('css')
@endpush

@section('content')


    <div class="container">
        <div class="row mt-1 ml-2 mr-2">
            <div class="col-md-8 offset-md-2">
                <div class="content-panel">

                    <form action="{{ route('admin.our_campaign.update', $ourCampaign->id) }}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ $ourCampaign->name }}" placeholder="Enter Organization Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputDesc">Description</label>
                                <textarea type="text" class="form-control" id="exampleInputDesc" name="description" rows="8">{{ $ourCampaign->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Picture</label>
                                <input type="file" name="picture" class="form-control" id="exampleInputFile">
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </div>

                        </form>

                </div>
                <!-- /content-panel -->
            </div>
            <!-- /col-md-12 -->

        </div>
    </div>


@endsection

@push('js')

@endpush