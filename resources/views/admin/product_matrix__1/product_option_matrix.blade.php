@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product option matrix</h3>
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
                        <h2 class="subheader">Assign New/Override Current Filter</h2>

                        <!-- <a class="d-block mb-2" data-toggle="collapse" href="#Openclose" role="button"
                            aria-expanded="false" aria-controls="Openclose">
                            Open & close page description
                        </a>

                        <div class="collapse" id="Openclose">
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
                        <div class="mt-3">
                            <div class="row">
                                <span class="label-title col-md-2 mt-2 mb-0">Choose Bands: </span>
                                <div class="col-md-4">
                                    <select class="form-control select2 select_band_drop">
                                        <option value="">Select Bands...</option>
                                        @foreach($bandList as $bandRow)
                                        <option value="{{$bandRow->id}}" {{ ($bandId==$bandRow->id) ? 'selected' : ''
                                            }}>{{$bandRow->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <form action="{{route('product_option_matrix_save')}}" method="post">
                                {{ csrf_field() }}

                                <div class="card card-body result-part show_card_body" style="display: none;">
                                    <div class="card-title">Assign New/Override Current Filter</div>
                                    <div class="card-subtitle mb-2 text-muted">You can filter which Band Groups and/or
                                        Options get filtered
                                        out depending on size</div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Width: </span>
                                                <input type="text" class="form-control" name="filter_width"
                                                    id="filter_width">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Drop: </span>
                                                <input type="text" class="form-control" name="filter_height"
                                                    id="filter_height">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Greater or Less than: </span>
                                                        <select class="form-control" autocomplete="off"
                                                            id="filter_lt_gt" name="filter_lt_gt" size="1">
                                                            <option value="gt">Greater Than</option>
                                                            <option value="lt">Less Than</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="label-title">Notes: </span>
                                                    <h5 class="instructions"><strong>1: </strong> you can specify
                                                        width or
                                                        drop or both
                                                        width and drop
                                                    </h5>
                                                    <h5 class="instructions"><strong>2: </strong> currently filter
                                                        will only
                                                        apply to
                                                        fabrics greater then
                                                        the
                                                        measurements</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Group: </span>
                                                        <select class="form-control" id="filter_GroupSelect"
                                                            name="filter_GroupSelect" size="1">
                                                            <option value="0">You must specify a Group</option>
                                                            @if(count($band_groups) > 0)
                                                            @foreach($band_groups as $grMap)
                                                            <option value="{{$grMap->groupName->group_id}}">
                                                                {{$grMap->groupName->group_admin_name}}
                                                            </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="OptionList0">
                                                        <!-- Update by ajax -->
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="label-title">Notes: </span>
                                                    <h5 class="instructions"><strong>1: </strong> Whichever Option you
                                                        select here will not be displayed in the frontend if the size
                                                        criteria is met
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group custom-select-Width">
                                                <span class="label-title">Supplier</span>
                                                <select class="select2 form-control " name="supplier_id"
                                                    id="supplier_id">
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
                                            <div class="form-group custom-select-Width">
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
                                                <select class="form-control" id="product_id" name="product_ids[]"
                                                    size="10" multiple>
                                                    <option value="0">All Products</option>
                                                    @foreach($productList as $proRow)
                                                    <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <p class="otherNb">This price will be assigned to <strong>All Blinds</strong></p> -->
                                    <div class="button-action justify-content-start">
                                        <button type="button" class="btn btn-default   cancel_form">Cancel</button>
                                        <button type="submit" class="btn btn-info ml-auto">Save</button>
                                    </div>
                                </div>
                            </form>
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
                var bandId = "<?= $bandId ?>";

                if (bandId > 0) {
                    $(".show_card_body").show();
                }

                $(".select_band_drop").change(function() {
                    var selectBandId = $(this).val();
                    window.location = base_url + "/product-matrix/option?bandId=" + selectBandId;
                });

                $("#filter_GroupSelect").change(function() {
                    var groupId = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: base_url + '/get_option_list_by_group_id_ajax/' + groupId,
                        success: function(data) {
                            $("#OptionList0").html(data);
                            console.log(data);
                        }
                    });
                });


                $(".cancel_form").click(function() {
                    $("#supplier_id").val(0);
                    $("#product_type_id").val(0);
                    $("#band_id").val(0);
                    $("#product_id").val(0);
                    $("#filter_width, #filter_height, #filter_lt_gt").val('');
                    $("#OptionList0").html('');
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