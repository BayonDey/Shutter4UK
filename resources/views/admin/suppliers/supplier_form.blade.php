@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$supplier->supplier_id > 0) ? 'Edit supplier' : 'Add supplier'}}</h3>
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
                        <form action="{{route('storeSupplier')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="supplier_id" value="{{@$supplier->supplier_id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Supplier Details</h3>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Name*</span>
                                                    <input type="text" name="supplier_name" class="form-control" placeholder="Enter supplier name" value="{{@$supplier->supplier_name}}" />

                                                    @if($errors->has('supplier_name'))
                                                    <div class="error">{{ $errors->first('supplier_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Email*</span>
                                                    <input type="text" class="form-control" placeholder="Enter supplier email" value="<?= @$supplier->supplier_email ?>" name="supplier_email" />

                                                    @if($errors->has('supplier_email'))
                                                    <div class="error">{{ $errors->first('supplier_email') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address 1*</span>
                                                    <input type="text" class="form-control  " placeholder="Enter address one" name="address_one" value="{{@$supplier->address_one}}" />

                                                    @if($errors->has('address_one'))
                                                    <div class="error">{{ $errors->first('address_one') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Address 2</span>
                                                    <input type="text" class="form-control  " placeholder="Enter address two" name="address_two" value="{{@$supplier->address_two}}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Town</span>
                                                    <input type="text" class="form-control" placeholder="Enter town" value="<?= @$supplier->town ?>" name="town" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">County</span>
                                                    <input type="text" class="form-control" placeholder="Enter county" value="<?= @$supplier->county ?>" name="county" />

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Postcode*</span>
                                                    <input type="text" class="form-control" placeholder="Enter postcode" value="<?= @$supplier->postcode ?>" name="postcode" />

                                                    @if($errors->has('postcode'))
                                                    <div class="error">{{ $errors->first('postcode') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Country</span>
                                                    <input type="text" class="form-control" placeholder="Enter country" value="<?= @$supplier->country ?>" name="country" />

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Phone*</span>
                                                    <input type="text" class="form-control" placeholder="Enter phone" value="<?= @$supplier->phone ?>" name="phone" />

                                                    @if($errors->has('phone'))
                                                    <div class="error">{{ $errors->first('phone') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Account Number*</span>
                                                    <input type="text" class="form-control" placeholder="Enter account number" value="<?= @$supplier->account_number ?>" name="account_number" />

                                                    @if($errors->has('account_number'))
                                                    <div class="error">{{ $errors->first('account_number') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Lead Days (EDI)</span>
                                                    <input type="text" class="form-control" placeholder="Enter EDI lead days" value="<?= @$supplier->edi_lead_days ?>" name="edi_lead_days" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Customer Services Email Default</span>
                                                    <input type="text" class="form-control" placeholder="Enter customer services email default" value="<?= @$supplier->customer_services_email_default ?>" name="customer_services_email_default" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h3 class="heading mb-4">Manage Blinds4uk Login Details for Supplier</h3>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Email Address*</span>
                                                <input type="text" name="supplier_login_user" class="form-control" value="{{@$supplier->supplier_login_user}}" />

                                                @if($errors->has('supplier_login_user'))
                                                <div class="error">{{ $errors->first('supplier_login_user') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Password*</span>
                                                <input type="password" name="supplier_login_password" class="form-control" />

                                                @if($errors->has('supplier_login_password'))
                                                <div class="error">{{ $errors->first('supplier_login_password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Confirm Password*</span>
                                                <input type="password" name="password_confirmation" class="form-control" />

                                            </div>
                                        </div>
                                    </div>


                                    <div class="button-action justify-content-end">
                                        <a href="{{route('supplier_list' )}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
                                    </div>
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

    });
</script>
@stop