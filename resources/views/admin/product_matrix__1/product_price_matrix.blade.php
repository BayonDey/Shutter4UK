@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Price Adjustment Input</h3>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
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
            <div class="spec-details">

                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="subheader">Price Adjustment Input</h2>
                            <a class="btn btn-primary" href="#">
                                <i class="fas fa-chevron-left"></i> Back to price adjustments list
                            </a>
                        </div>

                        <!-- <a class="d-block mb-2" data-toggle="collapse" href="#Openclose" role="button" aria-expanded="false" aria-controls="Openclose">
                            Open & close page description
                        </a>

                        <div class="collapse" id="Openclose">
                            <div class="card card-body">
                                <form class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Header Name</span>

                                            <input type="text" class="form-control" name="name" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <span class="label-title">Description</span>
                                            <textarea type="text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info w-100 mt-4">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <hr> -->
                        <div class="card card-body result-part">
                            <div class="datahints">
                                <div class="box card instructionhints">
                                    <p class="hints-text"> You can assign trade discount and profit percentages to
                                        blinds on a number of different criteria</p>

                                    <ul class="nav">
                                        <li class="nav-item">
                                            Supplier
                                        </li>
                                        <li class="nav-item">
                                            and or blind Type
                                        </li>
                                        <li class="nav-item">
                                            and/ or Band
                                        </li>
                                        <li class="nav-item">
                                            and/or individual Product
                                        </li>
                                    </ul>
                                    <p class="hints-textforPrice">These trade and profit percentages are applied to the
                                        <a href="{{route('upload_price')}}"> uploaded prices</a>
                                    </p>
                                </div>
                            </div>


                            <form action="{{route('product_matrix_price_save')}}" method="post">
                                {{ csrf_field() }}
                                <div class="card-title mb-3 w-100">Step 1: Filter Criteria</div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Supplier</span>
                                            <select class="form-control" name="supplier_id" id="supplier_id">
                                                <option value="0">All Suppliers</option>
                                                @foreach($supplierList as $supplierRow)
                                                <option value="{{$supplierRow->supplier_id}}">
                                                    {{$supplierRow->supplier_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Blind Type</span>
                                            <select class="form-control select2" id="product_type_id"
                                                name="product_type_id">
                                                <option value="0">All Blind Types</option>
                                                @foreach($pTypes as $typeRow)
                                                <option value="{{$typeRow->id}}">{{$typeRow->pname}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Band</span>
                                            <select class="form-control" id="band_id" name="band_ids[]" size="10"
                                                multiple>
                                                <option value="0">All Bands</option>
                                                @foreach($bandList as $bandRow)
                                                <option value="{{$bandRow->id}}">{{$bandRow->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Individual Blind</span>
                                            <select class="form-control" id="product_id" name="product_ids[]" size="10"
                                                multiple>
                                                <option value="0">All Products</option>
                                                @foreach($productList as $proRow)
                                                <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- <p class="otherNb">This price will be assigned to <strong>All Blinds</strong></p> -->
                                <div class="card-title mb-3  w-100">Step 2: Filter Criteria</div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Trade Discount</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="trade_percentage"
                                                    id="trade_percentage">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-white">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Retail Markup</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="profit_margin"
                                                    id="profit_margin">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-white">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Sale Percentage</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="sales_percentage"
                                                    id="sales_percentage">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-white">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Sale Start Date</span>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="sale_start"
                                                    id="sale_start">
                                                <!-- <div class="input-group-append">
                                                <span class="input-group-text bg-white"><i class="far fa-calendar-alt"></i></span>
                                            </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Sale End Date</span>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="sale_end" id="sale_end">
                                                <!-- <div class="input-group-append">
                                                    <span class="input-group-text bg-white"><i class="far fa-calendar-alt"></i></span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Lead Time</span>
                                            <input type="text" class="form-control" name="lead_time_days"
                                                id="lead_time_days">
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action justify-content-start">
                                    <a href="#" class="btn btn-default cancel_form">Cancel </a>
                                    <button type="submit" class="btn btn-info ml-auto">Save</button>
                                </div>

                            </form>
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

        $(".cancel_form").click(function() {
            $("#supplier_id").val(0);
            $("#product_type_id").val(0);
            $("#band_id").val(0);
            $("#product_id").val(0);
            $("#trade_percentage, #profit_margin, #sales_percentage, #sale_start, #sale_end, #lead_time_days").val('');
            // $(".radioSelect, .filterCheckbox").prop('checked', false);

            // $(".item_list").hide();
        });


        $("#supplier_id, #product_type_id, #band_id").change(function() {
            get_matrix($(this).attr('id'));
        });

        function get_matrix(flag) {
            var supplier_id = $("#supplier_id").val();
            var product_type_id = $("#product_type_id").val();
            var band_id = $("#band_id").val();
            var product_id = $("#product_id").val();

            console.log(supplier_id);
            console.log(product_type_id);
            console.log(band_id);
            console.log(product_id);

            $("#product_id").html("<option value='0'>Please wait...</option>");
            $.ajax({
                type: 'GET',
                url: base_url + '/guide_matrix',
                data: {
                    flag: flag,
                    supplier_id: supplier_id,
                    product_type_id: product_type_id,
                    band_id: band_id,
                    product_id: product_id
                },
                dataType: "json",

                success: function(returnData) {
                    console.log(returnData.bandList_html);
                    if (flag != 'band_id') {
                        $("#band_id").html(returnData.bandList_html);
                    }
                    $("#product_id").html(returnData.productList_html);
                }
            });
        }

    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop