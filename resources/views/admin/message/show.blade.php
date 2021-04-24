@extends('admin.master')

@section('title','Dashboard')

@push('css')
<link href="{{ asset('user') }}/user.css" rel="stylesheet">

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
    .see_button {
        background: #fff !important;
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
                                    @foreach($chat_list as $list=>$v)
                                        <a href="{{ route('admin.messages.show',$list) }}" class="list-group-item list-group-item-action {{ Request::is('admin/messages/'.$list) ? 'active text-white' : 'list-group-item-light' }} rounded-0">
                                            <div class="media">

                                                <?php $user=\App\User::find($list); ?>

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
                    <!-- Chat Box-->
                    <div class="col-lg-8 px-0">
                        <div class="px-4 py-5 chat-box bg-white" id="addMessages">


                                @foreach($messages as $message)
                                    @if($message->sender_id == Auth::user()->id)
                                            <!-- Sender Message-->
                                    <div class="media w-50 ml-auto mb-3">
                                        <div class="media-body">
                                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                                <p class="text-small mb-0 text-white">{{ $message->message }}</p>
                                            </div>
                                            <p class="small text-muted">{{ date_format($message->created_at,'H:i A | M d')  }}</p>
                                            {{--<p class="small text-muted">12:00 PM | Aug 13</p>--}}
                                        </div>
                                    </div>

                                    @else
                                            <!-- Reciever Message-->
                                    <div class="media w-50 mb-3">
                                        {{--<img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">--}}
                                        <div class="media-body ml-3">
                                            <div class="bg-light rounded py-2 px-3 mb-2">
                                                <p class="text-small mb-0 text-muted">{{ $message->message }}</p>
                                            </div>
                                            <p class="small text-muted">{{ date_format($message->created_at,'h:i A | M d')  }}</p>
                                        </div>
                                    </div>

                                    @endif

                                @endforeach


                        </div>

                        <div class="see_button">
                            <center>

                                <button id="show-more" class="text-primary" data-page="2" data-last="{{$messages->lastPage()}}" data-link="http://localhost:8000/admin/messages/4?page=" data-div="#addMessages">See more</button>

                                <div class="Guides-loadMore ng-scope" id="loading">
                                    <img class="loading-gif" src="{{asset('img/gal-pinner.gif')}}">
                                </div>

                            </center>

                            <span style="display: none;">{{$messages->links()}}</span>
                        </div>





                        <!-- Typing area -->
                        <form action="{{ route('admin.messages.store') }}" method="post" class="bg-light">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <div class="input-group-append">
                                    <button id="button-addon2" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                {{--</div>--}}


            </div>
            <!-- /.row -->

        </div>
    </div>

@endsection

@push('js')
        <!-- ============Show more Button for local =============== -->
    <script>

        $("#show-more").click(function() {
            $("#show-more").hide();
            $("#loading").show();

            $div = $($(this).data('div')); //div to append
            $link = $(this).data('link'); //current URL
            $last_page = $(this).data('last'); //last page number


            $page = $(this).data('page'); //get the next page #
            $href = $link + $page; //complete URL

            $.get($href, function(response) { //append data

                $("#loading").hide();

                $html = $(response).find("#addMessages").html();
                $div.append($html);


                if ($last_page != $page){
                    $("#show-more").show();

                }
                else{
                    $("#show-more").hide();
                }

            });

            $(this).data('page', (parseInt($page) + 1)); //update page #

        });
    </script>
    <!-- ============end Show more Button  for local=============== -->
@endpush