
@extends('layouts.master')


@section('title','Profile')


@push('css')
<link rel="stylesheet" href="{{asset('frontEnd/css')}}/bootstrap-3.4.1.min.css">
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
        font-size: 1.9rem;
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


    .input-group .form-control {
        width: 90%;
    }
    .input-group-append {
        background: darkorange;
    }
</style>

@endpush


@section('banner')

@endsection


@section('content')


    <div class="container emp-profile" style="font-size: 16px; max-height: 650px;">

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('user/proPic/'.Auth::user()->pro_pic) }}" alt="Profile Picture"/>
                    </div>
                </div>
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

                <div class="col-md-8" style="top: -300px;">
                    <div class="container py-5 px-4">
                        <!-- For demo purpose-->

                        <div class="row">

                            <!-- Chat Box-->
                            <div class="col-7 px-0">

                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                                <span>Admin</span>
                                <hr>
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
                                                <p class="small text-muted">{{ date_format($message->created_at,'H:i A | M d')  }}</p>
                                            </div>
                                        </div>

                                        @endif

                                    @endforeach

                                </div>


                                <center>

                                    <button id="show-more" class="text-primary" data-page="2" data-last="{{$messages->lastPage()}}" data-link="http://localhost:8000/user/messages?page=" data-div="#addMessages">See more</button>

                                    <div class="Guides-loadMore ng-scope" id="loading">
                                        <img class="loading-gif" src="{{asset('img/gal-pinner.gif')}}">
                                    </div>

                                </center>

                                <span style="display: none;">{{$messages->links()}}</span>


                                <!-- Typing area -->
                                {{--<form action="#" class="bg-light">--}}
                                <form action="{{ route('user.messages.store') }}" method="post" class="bg-light">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" placeholder="Type a message" name="message" class="form-control rounded-0 border-0 bg-light">
                                        <div class="input-group-append">
                                            <button id="button-addon" type="submit" class="btn btn-link">Send</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

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
