@extends('admin.layouts.app')
@section('content')
<?php

use App\Model\MapSubGroupOption;
use App\Model\Option;

$li_groupDataFl = 0;
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> {{(@$rowData->id > 0) ? 'Edit' : 'Create'}} Delivery Option</h3>
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
                        <div class="individual-box card card-outline card-warning">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <a href="{{route('delivery_option_list')}}" class="btn btn-info">Back to list »</a>
                                </div><br>
                                <form action="{{route('delivery_option_store')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id" value="{{@$rowData->id}}">
                                    <div class="row col-md-12">
                                         

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Delivery Details</span>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ @$rowData->name }}">
                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Delivery Type</span>
                                                <input type="text" name="display_name" id="display_name" class="form-control" value="{{ @$rowData->display_name }} ">
                                                @if($errors->has('display_name'))
                                                <div class="error">{{ $errors->first('display_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Price</span>
                                                <input type="text" name="price" id="price" class="form-control" value="{{ @$rowData->price }} ">
                                                @if($errors->has('price'))
                                                <div class="error">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title"> Free Over £ Amount</span>
                                                <input type="text" name="free_over_amount" id="free_over_amount" class="form-control" value="{{ @$rowData->free_over_amount }} ">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="button-action justify-content-start">
                                        <a href="{{route('delivery_option_list' , ['tr' => @$rowData->id ])}}">
                                            <button type="button" class="btn btn-default  ">Cancel</button>
                                        </a>

                                        <button type="submit" class="btn btn-info ml-auto ">{{(@$rowData->id > 0) ? 'Update' : 'Save'}}</button>
                                    </div>

                                </form>

                            </div>

                        </div>
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
        $("#product_type_id").change(function() {
            var product_type_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: base_url + '/get_pro_cat_by_type_id_ajax/' + product_type_id,
                data: {},
                // dataType: "json",

                success: function(returnData) {
                    console.log(returnData);
                    $("#parent_id").html(returnData);
                }
            });
        });
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop