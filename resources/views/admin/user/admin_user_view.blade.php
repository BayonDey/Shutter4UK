@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>View Admin</h3>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    {{--main details--}}
                    <div class="spec-details">
                        <div class="user-details-warp card card-outline card-info">
                            <div class="card-body">
                                <div class="title">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <span>User details

                                                <!-- <a href="#" class="btn-success btn-sm">Active</a> -->
                                            </span>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="user-action-part pb-0">
                                                <a href="{{ route('admin_users') }}">
                                                    <button class="btn btn-outline-info">
                                                        Go List
                                                    </button>
                                                </a> &nbsp;
                                                <!-- <button class="btn btn-outline-primary">
                                                        Resend Password
                                                    </button>
                                                    <button class="btn btn-outline-secondary">
                                                        View Past Orders
                                                    </button> -->

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="user-images">

                                            <?php
                                            $imgPh = (($user->image != '') && file_exists(public_path() . "/uploads/users/$user->image")) ? asset("uploads/users/$user->image") : asset('admin/dist/img/noUser.png');
                                            ?>
                                            <img src="{{$imgPh}}" class="rounded img-fluid">

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content-wraps">
                                            <p class="name-details"><label>Name:</label>
                                                <span>{{$user->b_firstname}}</span>
                                            </p>
                                            <p class="name-details"><label>Email:</label>
                                                <span>{{$user->email}}</span>
                                            </p>
                                            <p class="name-details"><label>Initial ID:</label>
                                                <span>{{($user->initials == null) ? '--' : $user->initials}}</span>
                                            </p>
                                            <p class="name-details"><label>Group:</label>
                                                <span>{{$user->access_group}}</span>
                                            </p>
                                            <p class="name-details"><label>Registration Date:</label>
                                                <span>{{($user->registration_date == null) ? '--' : $user->registration_date}}</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection