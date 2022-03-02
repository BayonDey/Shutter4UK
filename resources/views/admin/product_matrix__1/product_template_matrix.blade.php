@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Template Adjustment</h3>
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
                        <h2 class="subheader">Template Adjustment</h2>

                        <!-- <a class="d-block mb-2" data-toggle="collapse" href="#Openclose" role="button"
                            aria-expanded="false" aria-controls="Openclose">
                            Open & close page description
                        </a> -->

                        <!-- <div class="collapse" id="Openclose">
                            <div class="card card-body">
                                <form class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Header Name</span>

                                            <input type="text" class="form-control" name="name" value=""
                                                autocomplete="off">
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
                                    <p class="hints-text">You can assign templates to blinds on a number of different
                                        criteria</p>

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
                                </div>
                            </div>



                            <form action="{{route('product_template_matrix_save')}}" method="post">
                                {{ csrf_field() }}
                                <div class="card-title mb-3 w-100">Step 1: Filter Criteria</div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Choose Template : </span>
                                            <select class="form-control select2" name="template_id" id="template_id">
                                                <option value="">Select Template...</option>
                                                @foreach($pTemplate as $template)
                                                <option value="{{$template->id}}">
                                                    {{$template->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6"></div>

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
                                <div class="button-action justify-content-start">
                                    <!-- <a href="#" class="btn btn-default cancel_form">Cancel </a> -->
                                    <button type="button" class="btn btn-default   cancel_form">Cancel</button>
                                    <button type="submit" class="btn btn-info ml-auto">Save</button>
                                </div>
                            </form>


                        </div>



                        <!-- <p class="otherNb mt-3">This price will be assigned to <strong>All Blinds</strong></p> -->

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