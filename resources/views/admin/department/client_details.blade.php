@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Client for "{{$department->name}}"</h3>
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
    <style>
        .content_section {
            background-color: #efffbd;
            border: 1px solid gray;
            padding: 20px;
            margin-bottom: 24px;
            border-radius: 8px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('client_details_save')}}" method="POST" id="client_details_save" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id}}">
                            <input type="hidden" name="department_id" value="{{@$department->id}}">
                            <div class="individual-box card card-outline card-warning">
                                <div class="card-body">
                                    <div class="row col-md-12">
                                        <div class="col-md-6  ">
                                            <div class=" content_section">

                                                <h3 class="heading mb-4">Client Contact Detail's</h3>
                                                <div class="form-group">
                                                    <span class="label-title">Title*</span>

                                                    <select name="c_title" class="form-control" id="c_title">
                                                        <option value="Mr" {{(@$dataRow->bs_title == 'Mr') ? 'selected' : ''}}>Mr.</option>
                                                        <option value="Mrs" {{(@$dataRow->bs_title == 'Mrs') ? 'selected' : ''}}>Mrs.</option>
                                                        <option value="Miss" {{(@$dataRow->bs_title == 'Miss') ? 'selected' : ''}}>Miss.</option>
                                                        <option value="Ms" {{(@$dataRow->bs_title == 'Ms') ? 'selected' : ''}}>Ms.</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="label-title">Firstname*</span>
                                                    <input type="text" name="c_firstname" id="c_firstname" class="form-control" placeholder="Enter firstname" value="{{@$dataRow->c_firstname}}" />

                                                    @if($errors->has('c_firstname'))
                                                    <div class="error">{{ $errors->first('c_firstname') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Lastname*</span>
                                                    <input type="text" name="c_lastname" id="c_lastname" class="form-control" placeholder="Enter lastname" value="{{@$dataRow->c_lastname}}" />

                                                    @if($errors->has('c_lastname'))
                                                    <div class="error">{{ $errors->first('c_lastname') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Company*</span>
                                                    <input type="text" name="c_company" id="c_company" class="form-control" placeholder="Enter company" value="{{@$dataRow->c_company}}" />

                                                    @if($errors->has('c_company'))
                                                    <div class="error">{{ $errors->first('c_company') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Address1*</span>
                                                    <input type="text" name="c_address1" id="c_address1" class="form-control" placeholder="Enter address1" value="{{@$dataRow->c_address1}}" />

                                                    @if($errors->has('c_address1'))
                                                    <div class="error">{{ $errors->first('c_address1') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Address2 </span>
                                                    <input type="text" name="c_address2" id="c_address2" class="form-control" placeholder="Enter address2" value="{{@$dataRow->c_address2}}" />

                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">City </span>
                                                    <input type="text" name="c_city" id="c_city" class="form-control" placeholder="Enter city" value="{{@$dataRow->c_city}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">County </span>
                                                    <input type="text" name="c_county" id="c_county" class="form-control" placeholder="Enter county" value="{{@$dataRow->c_county}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Postcode </span>
                                                    <input type="text" name="c_postcode" id="c_postcode" class="form-control" placeholder="Enter postcode" value="{{@$dataRow->c_postcode}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Country </span>
                                                    <input type="text" name="c_country" id="c_country" class="form-control" placeholder="Enter country" value="{{@$dataRow->c_country}}" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="" id="same_data_check">
                                                    Click here if the business address is Same as client address.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6  ">
                                            <div class=" content_section">
                                                <h3 class="heading mb-4">Business Contact Detail's</h3>

                                                <div class="form-group">
                                                    <span class="label-title">Title*</span>

                                                    <select name="bs_title" id="bs_title" class="form-control">
                                                        <option value="Mr" {{(@$dataRow->bs_title == 'Mr') ? 'selected' : ''}}>Mr.</option>
                                                        <option value="Mrs" {{(@$dataRow->bs_title == 'Mrs') ? 'selected' : ''}}>Mrs.</option>
                                                        <option value="Miss" {{(@$dataRow->bs_title == 'Miss') ? 'selected' : ''}}>Miss.</option>
                                                        <option value="Ms" {{(@$dataRow->bs_title == 'Ms') ? 'selected' : ''}}>Ms.</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <span class="label-title">Firstname*</span>
                                                    <input type="text" name="bs_firstname" id="bs_firstname" class="form-control" placeholder="Enter firstname" value="{{@$dataRow->bs_firstname}}" />

                                                    @if($errors->has('bs_firstname'))
                                                    <div class="error">{{ $errors->first('bs_firstname') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Lastname*</span>
                                                    <input type="text" name="bs_lastname" id="bs_lastname" class="form-control" placeholder="Enter lastname" value="{{@$dataRow->bs_lastname}}" />

                                                    @if($errors->has('bs_lastname'))
                                                    <div class="error">{{ $errors->first('bs_lastname') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Company*</span>
                                                    <input type="text" name="bs_company" id="bs_company" class="form-control" placeholder="Enter company" value="{{@$dataRow->bs_company}}" />

                                                    @if($errors->has('bs_company'))
                                                    <div class="error">{{ $errors->first('bs_company') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Address1*</span>
                                                    <input type="text" name="bs_address1" id="bs_address1" class="form-control" placeholder="Enter address1" value="{{@$dataRow->bs_address1}}" />

                                                    @if($errors->has('bs_address1'))
                                                    <div class="error">{{ $errors->first('bs_address1') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Address2 </span>
                                                    <input type="text" name="bs_address2" id="bs_address2" class="form-control" placeholder="Enter address2" value="{{@$dataRow->bs_address2}}" />

                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">City </span>
                                                    <input type="text" name="bs_city" id="bs_city" class="form-control" placeholder="Enter city" value="{{@$dataRow->bs_city}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">County </span>
                                                    <input type="text" name="bs_county" id="bs_county" class="form-control" placeholder="Enter county" value="{{@$dataRow->bs_county}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Postcode </span>
                                                    <input type="text" name="bs_postcode" id="bs_postcode" class="form-control" placeholder="Enter postcode" value="{{@$dataRow->bs_postcode}}" />
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Country </span>
                                                    <input type="text" name="bs_country" id="bs_country" class="form-control" placeholder="Enter country" value="{{@$dataRow->bs_country}}" />
                                                </div>
                                                <div class="form-group"> <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6  ">
                                            <div class=" content_section">
                                                <h3 class="heading mb-4">Client Telephone & Email</h3>

                                                <div class="form-group">
                                                    <span class="label-title">Contact no* </span>
                                                    <input type="text" name="c_contact_no" class="form-control" placeholder="Enter contact no" value="{{@$dataRow->c_contact_no}}" />

                                                    @if($errors->has('c_contact_no'))
                                                    <div class="error">{{ $errors->first('c_contact_no') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Email* </span>
                                                    <input type="text" name="c_email" class="form-control" placeholder="Enter email" value="{{@$dataRow->c_email}}" />

                                                    @if($errors->has('c_email'))
                                                    <div class="error">{{ $errors->first('c_email') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6  ">
                                            <div class=" content_section">
                                                <h3 class="heading mb-4">Business Telephone & Email</h3>
                                                <div class="form-group">
                                                    <span class="label-title">Contact no* </span>
                                                    <input type="text" name="bs_contact_no" class="form-control" placeholder="Enter contact no" value="{{@$dataRow->bs_contact_no}}" />

                                                    @if($errors->has('bs_contact_no'))
                                                    <div class="error">{{ $errors->first('bs_contact_no') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span class="label-title">Email* </span>
                                                    <input type="text" name="bs_email" class="form-control" placeholder="Enter email" value="{{@$dataRow->bs_email}}" />

                                                    @if($errors->has('bs_email'))
                                                    <div class="error">{{ $errors->first('bs_email') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="button-action justify-content-end">
                                        <a href="{{route('department_list' )}}">
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        $("#same_data_check").click(function() {

            $('select[name="bs_title"]').val($('select[name="c_title"]').val());
            $('input[name="bs_firstname"]').val($('input[name="c_firstname"]').val());
            $('input[name="bs_lastname"]').val($('input[name="c_lastname"]').val());
            $('input[name="bs_company"]').val($('input[name="c_company"]').val());
            $('input[name="bs_address1"]').val($('input[name="c_address1"]').val());
            $('input[name="bs_address2"]').val($('input[name="c_address2"]').val());
            $('input[name="bs_city"]').val($('input[name="c_city"]').val());
            $('input[name="bs_county"]').val($('input[name="c_county"]').val());
            $('input[name="bs_postcode"]').val($('input[name="c_postcode"]').val());
            $('input[name="bs_country"]').val($('input[name="c_country"]').val());
        });


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop