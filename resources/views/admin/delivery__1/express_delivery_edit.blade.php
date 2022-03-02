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
                        <div class="col-sm-6">
                            <h3> Edit Express Delivery</h3>
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
                                    <a href="{{route('express_delivery_list')}}" class="btn btn-info">Back to list »</a>
                                </div><br>
                                <form action="{{route('express_delivery_store')}}" method="POST" id="band_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <!-- <h3 class="heading mb-4"></h3> -->
                                    <div class="row col-md-6">
                                        <input type="hidden" name="id" value="{{@$deliveryData->id}}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Product Type</span>
                                                <select class="form-control select2" id="product_type_id" name="product_type_id">
                                                    @foreach($pTypes as $typeRow)
                                                    <option value="{{$typeRow->id}}" {{($deliveryData->product_type_id == $typeRow->id) ? 'selected' : '' }}>{{$typeRow->pname}} </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_type_id'))
                                                <div class="error">{{ $errors->first('product_type_id') }}</div>
                                                @endif
                                            </div>
                                        </div><br>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Category</span>
                                                <select class="form-control select2" name="parent_id" id="parent_id">
                                                    @foreach($catList as $catRow)
                                                    <option value="{{$catRow->id}}" {{($deliveryData->parent_id == $catRow->id) ? 'selected' : '' }}>
                                                        {{$catRow->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('parent_id'))
                                                <div class="error">{{ $errors->first('parent_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Assign Express Delivery Charge from</span>
                                                <select class="form-control select2" name="supplier_id" id="supplier_id">
                                                    @foreach($supplierList as $supplierRow)
                                                    <option value="{{$supplierRow->supplier_id}}" {{($deliveryData->supplier_id == $supplierRow->supplier_id) ? 'selected' : '' }}>
                                                        {{$supplierRow->supplier_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('supplier_id'))
                                                <div class="error">{{ $errors->first('supplier_id') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="button-action justify-content-end">

                                            <a href="{{route('express_delivery_list' , ['tr' => @$deliveryData->id ])}}">
                                                <button type="button" class="btn btn-default  ">Cancel</button>
                                            </a>
                                            <button type="submit" class="btn btn-info  ">Update</button>
                                        </div>

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