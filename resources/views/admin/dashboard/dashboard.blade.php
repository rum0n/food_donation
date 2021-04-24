@extends('admin.master')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $donars }}</h3>

                            <p>Donars</p>
                        </div>
                        <div class="icon">
                            {{--<i class="ion ion-bag"></i>--}}
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$volunteers}}<sup style="font-size: 20px"></sup></h3>

                            <p>Volunteers</p>
                        </div>
                        <div class="icon">
                            {{--<i class="ion ion-stats-bars"></i>--}}
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$donations}}</h3>

                            <p>Donations</p>
                        </div>
                        <div class="icon">
                            {{--<i class="ion ion-person-add"></i>--}}
                        </div>
                        <a href="{{ route('admin.donations.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$campaigns}}</h3>

                            <p>Campaigns</p>
                        </div>
                        <div class="icon">
                            {{--<i class="ion ion-pie-graph"></i>--}}
                        </div>
                        <a href="{{ route('admin.our_campaign.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </div>
    </div>

@endsection

@push('js')

@endpush