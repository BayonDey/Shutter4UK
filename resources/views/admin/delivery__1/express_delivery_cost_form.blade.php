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
                            <h3> {{(@$deliveryData->id > 0) ? 'Edit' : 'Create'}} Express Delivery Cost</h3>
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
                                    <a href="{{route('express_delivery_cost_list')}}" class="btn btn-info">Back to list »</a>
                                </div><br>
                                <form action="{{route('express_delivery_cost_store')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id" value="{{@$deliveryData->id}}">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Supplier</span>
                                                <select class="form-control select2" name="supplier_id" id="supplier_id">
                                                    @foreach($supplierList as $supplierRow)
                                                    <option value="{{$supplierRow->supplier_id}}" {{(@$deliveryData->supplier_id == $supplierRow->supplier_id) ? 'selected' : '' }}>
                                                        {{$supplierRow->supplier_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('supplier_id'))
                                                <div class="error">{{ $errors->first('supplier_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Delivery Cost</span>
                                                <input type="text" name="delivery_cost" id="delivery_cost" class="form-control" value="{{ @$deliveryData->delivery_cost }}">
                                                @if($errors->has('delivery_cost'))
                                                <div class="error">{{ $errors->first('delivery_cost') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Delivery Cost Discount %
                                                    (for additional blinds)</span>
                                                <input type="text" name="delivery_cost_discount" id="delivery_cost_discount" class="form-control" value="{{ @$deliveryData->delivery_cost_discount }} ">
                                                @if($errors->has('delivery_cost_discount'))
                                                <div class="error">{{ $errors->first('delivery_cost_discount') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Express Delivery Text</span>
                                                <input type="text" name="express_delivery_text" id="express_delivery_text" class="form-control" value="{{ @$deliveryData->express_delivery_text }} ">
                                                @if($errors->has('express_delivery_text'))
                                                <div class="error">{{ $errors->first('express_delivery_text') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title"> Express Delivery Option - wood with tapes</span>
                                                <div class="radio-part form-control">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="enable_or_disable" id="searchrslt1" value="1" {{(@$deliveryData->enable_or_disable == 1) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="searchrslt1">Enable </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="enable_or_disable" id="searchrslt2" value="0" {{(@$deliveryData->enable_or_disable == 0) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="searchrslt2"> Disable </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="button-action justify-content-start">
                                        <a href="{{route('express_delivery_cost_list' , ['tr' => @$deliveryData->id ])}}">
                                            <button type="button" class="btn btn-default  ">Cancel</button>
                                        </a>

                                        <button type="submit" class="btn btn-info ml-auto ">{{(@$deliveryData->id > 0) ? 'Update' : 'Save'}}</button>
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