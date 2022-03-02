@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Extra Discount Matrix</h3>
                        </div>
                        <div class="col-sm-4">
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
                        <!-- <h2 class="subheader">Template Adjustment</h2> -->

                        <div class="card card-body result-part">
                            <div class="datahints">
                                <div class="box card instructionhints">
                                    <p class="hints-text">You can assign extra discount and profit percentages to blinds on a number of different criteria</p>

                                    <ul class="nav">
                                        <li class="nav-item">
                                            Supplier
                                        </li>
                                        <li class="nav-item">
                                            and/or blind Type
                                        </li>
                                        <li class="nav-item">
                                            and/or Band
                                        </li>
                                        <li class="nav-item">
                                            and/or individual Product
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <form action="{{route('assign_discount_product_save')}}" method="post">
                                {{ csrf_field() }}
                                <div class="card-title mb-3 w-100">Step 1: Filter Criteria</div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Supplier</span>
                                            <select class="form-control select2" name="supplier_id" id="supplier_id">
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
                                            <select class="form-control select2" id="product_type_id" name="product_type_id">
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
                                            <select class="form-control" id="band_id" name="band_ids[]" size="10" multiple>
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
                                            <select class="form-control" id="product_id" name="product_ids[]" size="10" multiple>
                                                <option value="0">All Products</option>
                                                @foreach($productList as $proRow)
                                                <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-title mb-3 w-100">Step 2: Set Discount Adjustments</div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Percentage Off(%)</span>
                                           <input type="text" class="form-control" name="percentage_off" id="percentage_off" required=''>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Start Date</span>
                                           <input type="date" class="form-control" name="discount_start" id="discount_start" min="<?= date('Y-m-d') ?>" required=''>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">End Date</span>
                                           <input type="date" class="form-control" name="discount_end" id="discount_end" min="<?= date('Y-m-d') ?>" required=''>
                                        </div>
                                    </div> 
                                </div>
                                <div class="button-action justify-content-start"> 
                                    <button type="button" class="btn btn-default   cancel_form">Cancel</button>
                                    <button type="submit" class="btn btn-info ml-auto">Save</button>
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

            $(".cancel_form").click(function() {
                $("#supplier_id").val(0);
                $("#product_type_id").val(0);
                $("#band_id").val(0);
                $("#product_id").val(0);
                $("#percentage_off, #discount_start, #discount_end").val('');
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