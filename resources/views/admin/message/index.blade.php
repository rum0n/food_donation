@extends('admin.master')

@section('title','Dashboard')

@push('css')

<style>


    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        width: 5px;
        background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
        width: 1em;
        background-color: #ddd;
        outline: 1px solid slategrey;
        border-radius: 1rem;
    }

    .text-small {
        font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
        height: 510px;
        overflow-y: scroll;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    input::placeholder {
        font-size: 0.9rem;
        color: #999;
    }

</style>

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                {{--<div class="container py-5 px-4">--}}

                    <div class="row rounded-lg overflow-hidden shadow col-12 col-md-12 col-lg-12">
                        <!-- Users box-->
                        <div class="col-lg-4 px-0">
                            <div class="bg-white">

                                <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recent</p>
                                </div>

                                <div class="messages-box">
                                    <div class="list-group rounded-0">
                                        @foreach($messages as $message=>$v)
                                            <a href="{{ route('admin.messages.show',$message) }}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                                <div class="media">

                                                    <?php $user=\App\User::find($message); ?>

                                                    <img src="{{ asset('user/proPic/'.$user->pro_pic) }}" alt="user" width="50" class="rounded-circle">
                                                    <div class="media-body ml-4">
                                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                                            <h6 class="mb-0">{{ $user->name }}</h6>
                                                        </div>
                                                        {{--<p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, </p>--}}
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                        {{--<a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">--}}
                                            {{--<div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">--}}
                                                {{--<div class="media-body ml-4">--}}
                                                    {{--<div class="d-flex align-items-center justify-content-between mb-1">--}}
                                                        {{--<h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>--}}
                                                    {{--</div>--}}
                                                    {{--<p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, .</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{--</div>--}}


            </div>
            <!-- /.row -->

        </div>
    </div>

@endsection

@push('js')

@endpush