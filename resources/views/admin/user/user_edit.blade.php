@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Edit User #{{$userData->id}}</h3>
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

                    <div class="user-action-part pb-0">
                        <a href="{{ route('frontend_users') }}">
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
                        <a href="{{ route('user_details', $userData->id) }}">
                            <button class="btn btn-outline-warning">
                                View User
                            </button>
                        </a>
                    </div>
                </div>

                <div class="col-md-12">
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('update_user', $userData->id)}}" method="POST" id="user_form">
                            {{ csrf_field() }}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="offer-parts">
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <h3 class="heading">User Details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Email</span>
                                                    <input type="text" class="form-control" value="<?= $userData->email ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">How did yo here about blinks4UK?</span>
                                                    <select name="how_hear" class="select2 form-control">

                                                        <option value="">Select...</option>
                                                        <option value="Friend/Family" <?= ($userData->how_hear == 'Friend/Family') ? "selected" : "" ?>>Friend/Family</option>
                                                        <option value="Google" <?= ($userData->how_hear == 'Google') ? "selected" : "" ?>>Google</option>
                                                        <option value="Yahoo" <?= ($userData->how_hear == 'Yahoo') ? "selected" : "" ?>>Yahoo</option>
                                                        <option value="MSN" <?= ($userData->how_hear == 'MSN') ? "selected" : "" ?>>MSN</option>
                                                        <option value="Other search engine" <?= ($userData->how_hear == 'Other search engine') ? "selected" : "" ?>>Other search engine</option>
                                                        <option value="Email" <?= ($userData->how_hear == 'Email') ? "selected" : "" ?>>Email</option>
                                                        <option value="Yell" <?= ($userData->how_hear == 'Yell') ? "selected" : "" ?>>Yell</option>
                                                        <option value="Newspaper" <?= ($userData->how_hear == 'Newspaper') ? "selected" : "" ?>>Newspaper</option>
                                                        <option value="Other" <?= ($userData->how_hear == 'Other') ? "selected" : "" ?>>Other</option>

                                                    </select>

                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input type="checkbox" name="is_subscribed" class="form-check-input is_subscribed" id="SubscribeTonewsleter" <?= ($userData->is_subscribed == 1) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="SubscribeTonewsleter">Subscribe to our
                                                        newsleter</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <h3 class="heading">Login details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Current password</span>
                                                    <input type="text" class="form-control" disabled value="{{ $userData->password_encode}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Change password</span>
                                                    <input type="password" name="password" class="form-control password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Confirm password</span>
                                                    <input type="password" name="con_password" class="form-control con_password">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">
                                        <h3 class="heading">Billng address</h3>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title ">Title</span>
                                                    <select type="text" class="select2 form-control b_title" name="b_title">

                                                        <option value="Mr" <?= ($userData->b_title == 'Mr') ? "selected" : "" ?>>Mr</option>
                                                        <option value="Mrs" <?= ($userData->b_title == 'Mrs') ? "selected" : "" ?>>Mrs</option>
                                                        <option value="Miss" <?= ($userData->b_title == 'Miss') ? "selected" : "" ?>>Miss</option>
                                                        <option value="Ms" <?= ($userData->b_title == 'Ms') ? "selected" : "" ?>>Ms</option>>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">First name</span>
                                                    <input type="text" class="form-control b_firstname" name="b_firstname" value="<?= $userData->b_firstname ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Last name</span>
                                                    <input type="text" class="form-control b_lastname" name="b_lastname" value="<?= $userData->b_lastname ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Company name</span>
                                                    <input type="text" class="form-control b_company" name="b_company" value="<?= $userData->b_company ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address</span>
                                                    <input type="text" class="form-control b_address1" name="b_address1" value="<?= $userData->b_address1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address2</span>
                                                    <input type="text" class="form-control b_address2" name="b_address2" value="<?= $userData->b_address2 ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">City</span>
                                                    <input type="text" class="form-control b_city" name="b_city" value="<?= $userData->b_city ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">County</span>
                                                    <input type="text" class="form-control b_county" name="b_county" value="<?= $userData->b_county ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Postal code</span>
                                                    <input type="text" class="form-control b_postcode" name="b_postcode" value="<?= $userData->b_postcode ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Mobile No.</span>
                                                    <input type="number" class="form-control b_telephone" name="b_telephone" value="<?= $userData->b_telephone ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Country</span>
                                                    <input type="text" class="form-control b_country" name="b_country" value="<?= $userData->b_country ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="individual-box card card-outline card-info">
                                    <div class="card-body">

                                        <div class="row">
                                            <h2 class="heading col-md-7">
                                                Shipping address
                                            </h2>
                                            <div class="col-md-5">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="sameasbilling">
                                                    <label class="form-check-label" for="Sameasbilling"> Same as billing
                                                        address?</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Title</span>
                                                    <select type="text" class="select2 form-control s_title" name="s_title">
                                                        <option value="Mr" <?= ($userData->s_title == 'Mr') ? "selected" : "" ?>>Mr</option>
                                                        <option value="Mrs" <?= ($userData->s_title == 'Mrs') ? "selected" : "" ?>>Mrs</option>
                                                        <option value="Miss" <?= ($userData->s_title == 'Miss') ? "selected" : "" ?>>Miss</option>
                                                        <option value="Ms" <?= ($userData->s_title == 'Ms') ? "selected" : "" ?>>Ms</option>>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">First name</span>
                                                    <input type="text" class="form-control s_firstname" name="s_firstname" value="<?= $userData->s_firstname ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Last name</span>
                                                    <input type="text" class="form-control s_lastname" name="s_lastname" value="<?= $userData->s_lastname ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Company name</span>
                                                    <input type="text" class="form-control s_company" name="s_company" value="<?= $userData->s_company ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address</span>
                                                    <input type="text" class="form-control s_address1" name="s_address1" value="<?= $userData->s_address1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address2</span>
                                                    <input type="text" class="form-control s_address2" name="s_address2" value="<?= $userData->s_address2 ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">City</span>
                                                    <input type="text" class="form-control s_city" name="s_city" value="<?= $userData->s_city ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">County</span>
                                                    <input type="text" class="form-control s_county" name="s_county" value="<?= $userData->s_county ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Postal code</span>
                                                    <input type="text" class="form-control s_postcode" name="s_postcode" value="<?= $userData->s_postcode ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Mobile No.</span>
                                                    <input type="number" class="form-control s_telephone" name="s_telephone" value="<?= $userData->s_telephone ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Country</span>
                                                    <input type="text" class="form-control s_country" name="s_country" value="<?= $userData->s_country ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action justify-content-end">
                                    <a href="{{route('user_details', $userData->id)}}"><button type="button" class="btn btn-default mr-2">Cancel</button></a>
                                    <button type="button" class="btn btn-info user_update_btn">Update</button>
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


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        // var base_url = "<?php // echo URL::to('/') . "/admin"; 
                            ?>";

        $('#sameasbilling').click(function() {
            if ($("#sameasbilling").prop('checked') == true) {
                $('.s_title').val($('.b_title').val());
                $('.s_firstname').val($('.b_firstname').val());
                $('.s_lastname').val($('.b_lastname').val());
                $('.s_company').val($('.b_company').val());
                $('.s_address1').val($('.b_address1').val());
                $('.s_address2').val($('.b_address2').val());
                $('.s_city').val($('.b_city').val());
                $('.s_county').val($('.b_county').val());
                $('.s_postcode').val($('.b_postcode').val());
                $('.s_country').val($('.b_country').val());
                $('.s_telephone').val($('.b_telephone').val());

            }
        });

        $('.user_update_btn').click(function() {
            var pass = $('.password').val();
            var conPass = $('.con_password').val();
            if ((pass !== '') && (pass != conPass)) {
                alert("Password and confirm password not mach!");
            }else{
                $('#user_form').submit();
            }
        });
    });
</script>
@stop