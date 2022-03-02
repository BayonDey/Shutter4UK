@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>User Details</h3>
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
            <div class="user-details-warp">
                <div class="card card-outline card-warning w-100">
                    <div class="card-body">
                        <div class="title">
                            <div class="row">
                                <div class="col-md-5">
                                    <span>Personal Information

                                        @if($userData->user_status == 't')
                                        <a href="#" class="btn-success btn-sm">Active</a>
                                        @else
                                        <a href="#" class="btn-danger btn-sm">Inactive</a>
                                        @endif
                                    </span>
                                </div>
                                <div class="col-md-7">
                                    <div class="user-action-part pb-0">
                                        <a href="{{ route('frontend_users') }}">
                                            <button class="btn btn-outline-info">
                                                Go List
                                            </button>
                                        </a> &nbsp;
                                        <button class="btn btn-outline-primary">
                                            Resend Password
                                        </button>
                                        <button class="btn btn-outline-secondary">
                                            View Past Orders
                                        </button>
                                        <a href="{{ route('user_edit', $userData->id) }}">
                                            <button class="btn btn-outline-success">
                                                Edit Users
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="name-details"><label>Name:</label>
                            <span>{{$userData->b_title." ".$userData->b_firstname." ".$userData->b_lastname}}</span>
                        </p>
                        <p class="name-details"><label>Email:</label> <span>{{$userData->email}}</span></p>
                        <p class="name-details"><label>Password:</label> <span>{{$userData->password_encode}}</span></p>
                        <p class="name-details"><label>Registration date:</label>
                            <span>{{ date('d-M-Y h:i A', strtotime($userData->registration_date)) }}</span>
                        </p>
                        <p class="name-details"><label>Customer Account No:</label> <span>{{$userData->id}}</span>
                        </p>
                    </div>
                </div>


                <div class="card card-outline card-info">
                    <div class="card-body">
                        <div class="title">Billing Address</div>
                        <p class="name-details"><label>Name:</label>
                            <span>{{$userData->b_title." ".$userData->b_firstname." ".$userData->b_lastname}}</span>
                        </p>
                        <!-- <p class="name-details"><label>First name:</label> <span>{{$userData->b_firstname}}</span></p>
                        <p class="name-details"><label>Last name:</label> <span> {{$userData->b_lastname}}</span></p> -->
                        <p class="name-details"><label>Company name:</label> <span>{{$userData->b_company}}</span>
                        </p>
                        <p class="name-details"><label>Address:</label> <span>{{$userData->b_address1}}</span></p>
                        <p class="name-details"><label>Address2:</label> <span>{{$userData->b_address2}}</span></p>
                        <p class="name-details"><label>City:</label> <span>{{$userData->b_city }}</span></p>
                        <p class="name-details"><label>County:</label> <span>{{$userData->b_county }}</span></p>
                        <p class="name-details"><label>Postcode:</label> <span>{{$userData->b_postcode}}</span></p>
                        <p class="name-details"><label>Telephone:</label>
                            <span>{{$userData->b_telephone }}</span>
                        </p>
                        <p class="name-details"><label>Country:</label> <span>{{$userData->b_country}}</span></p>

                    </div>
                </div>
                <div class="card card-outline card-info">
                    <div class="card-body">
                        <div class="title">Shipping Address</div>
                        <p class="name-details"><label>Name:</label>
                            <span>{{$userData->s_title." ".$userData->s_firstname." ".$userData->s_lastname}}</span>
                        </p>
                        <!-- <p class="name-details"><label>First name:</label> <span>{{$userData->s_firstname}}</span></p>
                        <p class="name-details"><label>Last name:</label> <span> {{$userData->s_lastname}}</span></p> -->
                        <p class="name-details"><label>Company name:</label> <span>{{$userData->s_company}}</span>
                        </p>
                        <p class="name-details"><label>Address:</label> <span>{{$userData->s_address1}}</span></p>
                        <p class="name-details"><label>Address2:</label> <span>{{$userData->s_address2}}</span></p>
                        <p class="name-details"><label>City:</label> <span>{{$userData->s_city }}</span></p>
                        <p class="name-details"><label>County:</label> <span>{{$userData->s_county }}</span></p>
                        <p class="name-details"><label>Postcode:</label> <span>{{$userData->s_postcode}}</span></p>
                        <p class="name-details"><label>Telephone:</label>
                            <span>{{$userData->s_telephone }}</span>
                        </p>
                        <p class="name-details"><label>Country:</label> <span>{{$userData->s_country}}</span></p>
                    </div>
                </div>
                <div class="card card-outline card-danger w-100">
                    <div class="card-body">
                        <div class="title">Other Information</div>
                        <p class="name-details"><label>How did you hear about blinds4Uk?
                                : </label><span>{{$userData->how_hear}}</span></p>
                        <p class="name-details"><label>Is subscribed to our newsletter? :
                            </label><span>{{ ($userData->is_subscribed == 1) ? "Yes" : "No" }}</span>
                        </p>
                        <p class="name-details"><label>GDPR opt in
                                : </label><span>{{$userData->optin_datetime}}</span>
                        </p>
                        <p class="name-details"><label>GDPR sent email status :
                            </label><span>{{$userData->gdpr_sent_email_status}}</span></p>
                        <p class="name-details"><label>GDPR email text :
                            </label><span>{{$userData->gdpr_email_text}}</span></p>
                        <p class="name-details"><label>GDPR newsletter subject :
                            </label><span>{{$userData->gdpr_newsletter_subject}}</span></p>
                        <p class="name-details"><label>GDPR email sent date :
                            </label><span>{{$userData->gdpr_email_sent_date}}</span></p>
                        <p class="name-details"><label>GDPR welcomeemail text :
                            </label><span>{{$userData->gdpr_welcomeemail_text}}</span></p>
                        <p class="name-details"><label>GDPR welcomeemail subject :
                            </label><span>{{$userData->gdpr_welcomeemail_subject}}</span></p>
                        <p class="name-details"><label>Reset link time :
                            </label><span>{{$userData->resetlinktimestmp}}</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection