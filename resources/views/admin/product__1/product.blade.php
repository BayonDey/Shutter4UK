@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Manage Products</h3>
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


                    <div class="card card-outline card-primary p-3">
                        <div class="row">
                            <div class="col-md-8">
                                Product Types
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('generateCsvForProductType') }}" data-toggle="tooltip" data-placement="top" title="Download product types csv">
                                    <button class="btn btn-warning"><i class="fa fa-file-csv "></i></button>
                                </a>

                                @if (App\Model\UserPermission::checkPermission('products', 'add') > 0)
                                <a href="{{ route('product_type_create')}}">
                                    <button class="btn btn-success"> Create new top level »</button>
                                </a>
                                @endif
                            </div>
                        </div>


                        <div class="card-body table-responsive p-2 produt-inner-wrap">

                            <table id="example1" class="table table-head-fixed text-nowrap">

                                <tbody>
                                    @if(!empty($pTypes))
                                    @foreach($pTypes as $i => $p_type)

                                    <tr class="pTypeTR " id="pType__{{$p_type->id}}">
                                        <td class="pTypeNameTD" id="pTypeName__{{$p_type->id}}">


                                            <div class="d-flex justify-content-between align-items-center">
                                                <u class="pTypeNameU" id="pTypeNameU__{{$p_type->id}}">{{ ucwords($p_type->pname) }}</u>
                                                <input type="hidden" id="hidden_setPriceType_{{$p_type->id}}" value="{{ $p_type->pname }}">
                                                <div>


                                                    <div class="action-button-wrap">
                                                        <!-- <h3 class="act-button-title">Action</h3> -->

                                                        <a href="{{ route('generateCsvForProductCategory', $p_type->id) }}" type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Download categories csv under this type"><i class="fa fa-file-csv "></i>
                                                        </a>
                                                        <a href="{{ route('get_full_url', ['id'=>  $p_type->id, 'flag'=>'type']) }}" target="_blank" type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="View in Site">
                                                            <i class="far fa-eye"></i>
                                                        </a>


                                                        @if (App\Model\UserPermission::checkPermission('products', 'edit') > 0)
                                                        <a href="{{ route('product_type_edit', $p_type->id) }}" type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @endif

                                                        <a href="#" type="button" class="btn btn-outline-success setPrice_btn" id="setPriceType__{{$p_type->id}}" data-toggle="tooltip" data-placement="top" title="Set Prices">
                                                            <i class="fas fa-euro-sign"></i>
                                                        </a>

                                                        <a href="#" type="button" class="btn btn-outline-light setLeadTime_btn" id="setLeadTimeType__{{$p_type->id}}" data-toggle="tooltip" data-placement="top" title="Set Lead Time">
                                                            <i class="far fa-clock"></i>
                                                        </a>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-warning dropdown-hover" title="Samples Availability" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span><i class="fas fa-calendar-check"></i>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">

                                                                <a class="dropdown-item" href="{{ route('sample_available_or_not', ['id' => $p_type->id, 'flag'=>'y']) }}" onclick="return confirm('You can use Yes, Samples Available to allow all products in all categories and sub-categories under \'{{ $p_type->pname }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                                                    <i class="fa fa-thumbs-up"></i> Yes, samples
                                                                    available
                                                                </a>

                                                                <a class="dropdown-item" href="{{ route('sample_available_or_not', ['id' => $p_type->id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, Samples Not Available to allow all products in all categories and sub-categories under \'{{ $p_type->pname }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                                                    <i class="fa fa-thumbs-down"></i> No,
                                                                    samples not available
                                                                </a>
                                                            </div>
                                                        </div>

                                                        @if (App\Model\UserPermission::checkPermission('products', 'add') > 0)
                                                        <a href="{{route('product_cat_create', $p_type->id)}}" type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Add New Category">
                                                            <i class="fas fa-folder-plus"></i>
                                                        </a>
                                                        @endif

                                                        <a href="#" type="button" class="btn btn-outline-info assignContent_btn" id="assignContentType__{{$p_type->id}}" data-toggle="tooltip" data-placement="top" title="Assign Content">
                                                            <i class="fas fa-clipboard-list"></i>
                                                        </a>

                                                        @if (App\Model\UserPermission::checkPermission('products', 'delete') > 0)
                                                        <a href="{{ route('delete_pro_type', ['id' => $p_type->id]) }}" type="button" onclick="return confirm('{{ $p_type->pname }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        @endif

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span><i class="fas fa-sort-amount-up-alt"></i>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">

                                                                @if ($i > 0)
                                                                <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'top'])}}">
                                                                    Move to top
                                                                </a>
                                                                <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'up'])}}">
                                                                    Move up
                                                                </a>
                                                                @endif

                                                                @if ($i != (count($pTypes) - 1))

                                                                <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'down'])}}">
                                                                    Move down
                                                                </a>
                                                                <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'bottom'])}}">
                                                                    Move to bottom
                                                                </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                            <div class="append_cat" id="appendCat__{{$p_type->id}}"></div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="setPriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Prices</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body spec-details mb-0">
                <div class="form-group modal-hd-part">
                    <label class="setheading setPrice_heading">--</label>
                    <p class="setPrice_desc sub-label">--</p>
                </div>
                <form id="setPrice_form" action="{{route('setPriceForTypeCategoryProduct_ajax')}}" method="post">
                    @csrf
                    <input type="hidden" name="setPrice_flag" id="setPrice_flag">
                    <input type="hidden" name="setPrice_id" id="setPrice_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trade_percentage" class="label-title">Trade Discount:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="trade_percentage" id="trade_percentage">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <p class="error trade_percentage_err"></p>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="profit_margin" class="label-title">Retail Markup:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="profit_margin" id="profit_margin">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <p class="error profit_margin_err"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sales_percentage" class="label-title">Sale Discount:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="sales_percentage" id="sales_percentage">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <p class="error sales_percentage_err"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sale_start" class="label-title">Sale Start Date:</label>
                                <input type="date" class="form-control" name="sale_start" id="sale_start">
                                <p class="error sale_start_err"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sale_end" class="label-title">Sale End Date:</label>
                                <input type="date" class="form-control" name="sale_end" id="sale_end">
                                <p class="error sale_end_err"></p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary setPrice_submitBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="setLeadTimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Lead Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body spec-details mb-0">
                <div class="form-group modal-hd-part">
                    <label class="setheading setLeadTime_heading">--</label>
                    <p class="sub-label setLeadTime_desc">--</p>
                </div>
                <form id="setLeadTime_form" action="{{route('setLeadTimeForTypeCategoryProduct_ajax')}}" method="post">
                    @csrf
                    <input type="hidden" name="setLeadTime_flag" id="setLeadTime_flag">
                    <input type="hidden" name="setLeadTime_id" id="setLeadTime_id">
                    <div class="form-group">
                        <label for="lead_time_days" class="label-title">Lead Time in Days:</label>
                        <input type="text" class="form-control" name="lead_time_days" id="lead_time_days">
                    </div>
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary setLeadTime_submitBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .disabled_select {
        background: burlywood;
    }

    .assignContent_desc .error,
    .message_content .error {
        border: 1px solid #fd6666 !important;
        padding: 5px 10px !important;
        border-radius: 5px !important;
        background: #ffe8e8;
    }

    .message_content .success {
        color: green;
        border: 1px solid green !important;
        background: #ebffeb;
        border-radius: 5px !important;
        padding: 5px 8px !important;
        font-size: 13px;
    }
</style>
<div class="modal fade" id="assignContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title assignContentModalLabel" id="exampleModalLabel">Assign Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label assignContent_heading">--</label>
                    <div class="message_content"></div>
                </div>
                <input type="hidden" name="assignContent_flag" id="assignContent_flag">
                <input type="hidden" name="assignContent_id" id="assignContent_id">
                <div class="form-group">
                    <label for="tab_name" class="col-form-label">Tab Name:</label>
                    <input type="text" class="form-control" name="tab_name" id="tab_name">
                    @if($errors->has('tab_name'))
                    <div class="error">{{ $errors->first('tab_name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="page_id" class="col-form-label">Content:</label>
                    <select class="form-control select2" name="page_id" id="page_id">
                        <option value="0">Select...</option>

                        @foreach($pPages as $page)
                        @if($page->order_no == 1)
                        <option value="0" class="disabled_select" disabled="disabled">{{$page->title}}</option>
                        @else
                        <option value="{{$page->id}}">{{$page->title}}</option>
                        @endif
                        @endforeach
                    </select>
                    @if($errors->has('page_id'))
                    <div class="error">{{ $errors->first('page_id') }}</div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary assignContent_submitBtn">Assign</button>
                </div>

                <div class="assignContent_desc ">--</div>

                <div class="assignContent_below_part">
                    <button type="button" class="btn btn-primary assignContent_saveBtn">Save</button>
                    <p class="assignContent_save_note">Note: Changes are applied to all products once 'Save' is
                        pressed</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title assignContentModalLabel" id="exampleModalLabel">View Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="" class="showImgInModal" alt="" width="100%">
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

        var gt_type = '<?= $gt_type ?>';
        var gt_category = '<?= $gt_category ?>';

        //=== START:: Show product category list under product type =====//
        $('.pTypeNameU').click(function() {
            var pTypeId = $(this).attr('id').split('__')[1];
            catListUnderType(pTypeId);
        });

        if (gt_type > 0) {
            catListUnderType(gt_type);
        }

        function catListUnderType(pTypeId) {
            var pTypeChildId = '#pTypeChild__' + pTypeId;
            if ($(pTypeChildId).length) {
                if ($(pTypeChildId).css('display') == 'none') {
                    $(pTypeChildId).show();
                } else {
                    $(pTypeChildId).hide();
                }
            } else {
                $("#appendCat__" + pTypeId).html("<i class='fa fa-spinner fa-spin'></i>");

                $.ajax({
                    type: 'GET',
                    url: base_url + '/get_pro_cat_by_type_ajax/' + pTypeId,
                    success: function(data) {
                        $("#appendCat__" + pTypeId).html(data);

                        if ((gt_type > 0) && (gt_category > 0)) {
                            productListUnderCategory(gt_type, gt_category);
                        }

                    }
                });
            }
        }

        //=== END:: Show product category list under product type =====//

        //=== START:: Show product sub category && product list under product category =====//
        $('body').on('click', '.pCatNameU', function() {
            var pTypeId = $(this).attr('id').split('__')[1];
            var pCatId = $(this).attr('id').split('__')[2];
            productListUnderCategory(pTypeId, pCatId);
        });

        function productListUnderCategory(pTypeId, pCatId) {
            var pCatChildId = '#pCatChild__' + pCatId;

            if ($(pCatChildId).length) {
                if ($(pCatChildId).css('display') == 'none') {
                    $(pCatChildId).show();
                    $("#pCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-right');
                    $("#pCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-down');

                } else {
                    $(pCatChildId).hide();
                    $("#pCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-down');
                    $("#pCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-right');
                }
            } else {
                $("#pCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-right');
                $("#pCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-down');
                $("#appendSubCatAndPro__" + pTypeId + "__" + pCatId).html("<i class='fa fa-spinner fa-spin'></i>");

                $.ajax({
                    type: 'GET',
                    url: base_url + '/get_pro_and_sub_cat_by_cat_ajax/' + pTypeId + "/" + pCatId,
                    success: function(data) {
                        $("#appendSubCatAndPro__" + pTypeId + "__" + pCatId).html(data);
                    }
                });
            }
        }

        //=== END:: Show product sub category && product list under product category =====//


        //=== START:: Show product list under product sub category =====//

        $('body').on('click', '.pSubCatNameU', function() {
            var pTypeId = $(this).attr('id').split('__')[1];
            var pCatId = $(this).attr('id').split('__')[2];
            var pSubCatProId = '#pSubCat__' + pCatId;
            // alert(pSubCatProId);
            if ($(pSubCatProId).length) {
                if ($(pSubCatProId).css('display') == 'none') {
                    $(pSubCatProId).show();
                    $("#pSubCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-right');
                    $("#pSubCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-down');

                } else {
                    $(pSubCatProId).hide();
                    $("#pSubCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-down');
                    $("#pSubCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-right');
                }
            } else {
                $("#pSubCatIcon__" + pTypeId + "__" + pCatId).removeClass('fa-caret-right');
                $("#pSubCatIcon__" + pTypeId + "__" + pCatId).addClass('fa-caret-down');

                $.ajax({
                    type: 'GET',
                    url: base_url + '/get_pro_for_sub_cat_ajax/' + pTypeId + "/" + pCatId,
                    success: function(data) {
                        $('#appendProFrSubCat__' + pTypeId + "__" + pCatId).html(data);
                    }
                });
            }
        });
        //=== END:: Show product list under product sub category =====//

        //=== START:: Show set price modal =====//

        $('body').on('click', '.setPrice_btn', function() {
            var flag = $(this).attr('id').split('__')[0];
            var id = $(this).attr('id').split('__')[1];
            var name = $("#hidden_" + flag + "_" + id).val();

            $("#setPrice_flag").val(flag);
            $("#setPrice_id").val(id);
            $(".setPrice_heading").html(name);

            $("#trade_percentage, #profit_margin, #sales_percentage, #sale_start, #sale_end").val('')

            if (flag == 'setPriceType') {
                $(".setPrice_desc").html("Updating this form will set the prices for <strong>all</strong> products in all categories and sub-categories under <strong>" + name + "</strong>");
            } else if (flag == 'setPriceCat') {
                $(".setPrice_desc").html("Updating this form will set the prices for <strong>all</strong> products in all categories and sub-categories under <strong>" + name + "</strong>");
            } else if (flag == 'setPricePro') {
                $(".setPrice_desc").html("Updating this form will set the price for the product <strong>" + name + "</strong>");

                $("#trade_percentage").val($("#hidden_trade_percentage_" + id).val())
                $("#profit_margin").val($("#hidden_profit_margin_" + id).val())
                $("#sales_percentage").val($("#hidden_sales_percentage_" + id).val())
                $("#sale_start").val($("#hidden_sale_start_" + id).val())
                $("#sale_end").val($("#hidden_sale_end_" + id).val())
            }
            $("#setPriceModal").modal('show');
        });

        $(".setPrice_submitBtn").click(function(event) {
            event.preventDefault();
            var sale_start = $('#sale_start').val();
            var sale_end = $('#sale_end').val();
            var err = 0;
            var err_msg = "";
            if (sale_start > sale_end) {
                err = 1;
                err_msg = "End date must be greater than start date";
            }
            if (err == 0) {
                $("#setPrice_form").submit();
            } else {
                alert(err_msg);
            }
        });

        //=== END:: Show set price modal =====//

        //=== START:: Show Set Lead Time modal =====//
        $('body').on('click', '.setLeadTime_btn', function() {
            var flag = $(this).attr('id').split('__')[0];
            var id = $(this).attr('id').split('__')[1];
            // alert(flag);
            $("#setLeadTime_flag").val(flag);
            $("#setLeadTime_id").val(id);

            $("#lead_time_days").val('')

            if (flag == 'setLeadTimeType') {
                var name = $("#hidden_setPriceType_" + id).val();
                var desc = "Updating this form will set the lead times for <strong>all</strong> products in all categories and sub-categories under <strong>" + name + "</strong>"
            } else if (flag == 'setLeadTimeCat') {
                var name = $("#hidden_setPriceCat_" + id).val();
                var desc = "Updating this form will set the lead times for <strong>all</strong> products in all categories and sub-categories under <strong>" + name + "</strong>"
            } else if (flag == 'setLeadTimePro') {
                var name = $("#hidden_setPricePro_" + id).val();
                var desc = "Updating this form will set the lead time for the product <strong>" + name + "</strong>"

                $("#lead_time_days").val($("#hidden_lead_time_days_" + id).val());
            }
            $(".setLeadTime_desc").html(desc);
            $(".setLeadTime_heading").html(name);

            $("#setLeadTimeModal").modal('show');
        });


        $(".setLeadTime_submitBtn").click(function(event) {
            event.preventDefault();
            $("#setLeadTime_form").submit();
        });
        //=== END:: Show Set Lead Time modal =====//


        //=== START:: Show assign content modal =====//
        var actionFlag = 'add';
        var actionId = 0;
        $('body').on('click', '.assignContent_btn', function() {
            var flag = $(this).attr('id').split('__')[0];
            var id = $(this).attr('id').split('__')[1];
            // alert(flag);
            $("#assignContent_flag").val(flag);
            $("#assignContent_id").val(id);
            $("#tab_name").val('');
            $("#page_id").val(0);
            $('.message_content').html('');
            $(".assignContentModalLabel").html('Assign Content');
            $(".assignContent_submitBtn").html('Assign');
            var name = '';
            $(".assignContent_below_part").show();

            if (flag == 'assignContentType') {
                name = $("#hidden_setPriceType_" + id).val();
            } else if (flag == 'assignContentCat') {
                name = $("#hidden_setPriceCat_" + id).val();
            } else if (flag == 'assignContentPro') {
                $(".assignContent_below_part").hide();

                name = $("#hidden_setPricePro_" + id).val();
            }
            getAssignContentList(id, flag, 'first');
            $(".assignContent_heading").html(name);

            $("#assignContentModal").modal('show');
        });

        $(".assignContent_submitBtn").click(function(event) {
            event.preventDefault();
            var tab_name = $("#tab_name").val();
            var page_id = $("#page_id").val();
            var flag = $("#assignContent_flag").val();
            var id = $("#assignContent_id").val();
            $.ajax({
                type: 'POST',
                url: base_url + '/assignContentSession_ajax',
                data: {
                    _token: '<?= csrf_token() ?>',
                    id: id,
                    flag: flag,
                    name: tab_name,
                    page_id: page_id,
                    actionFlag: actionFlag,
                    actionId: actionId,
                },
                success: function(data) {
                    data = jQuery.parseJSON(data);
                    if (data.err) {
                        $('.message_content').html('<p class="error">' + data.msg + '</p>');
                    } else {
                        $("#tab_name").val('');
                        $("#page_id").val(0);
                        $('.message_content').html('<p class="success">' + data.msg + '</p>');

                        $(".assignContentModalLabel").html('Assign Content');
                        $(".assignContent_submitBtn").html('Assign');
                        actionFlag = 'add';
                        actionId = 0;

                        getAssignContentList(id, flag, 'reload');
                    }
                }
            });

            setTimeout(function() {
                $('.message_content').html('')
            }, 3000);

        });

        $('body').on('change', '.selectAssignedTab', function() {
            var thisId = $(this).attr('id');
            actionId = thisId.split('_')[1]; // tab id
            var thisVal = $(this).val();
            var flag = $("#assignContent_flag").val();
            var flagId = $("#assignContent_id").val();
            $.ajax({
                type: 'POST',
                url: base_url + '/actionAssignContent_ajax',
                data: {
                    _token: '<?= csrf_token() ?>',
                    tabId: actionId,
                    flag: flag,
                    flagId: flagId,
                    selectVal: thisVal,
                },
                success: function(data) {
                    data = jQuery.parseJSON(data);
                    if (data.err) {
                        $('.message_content').html('<p class="error">' + data.msg + '</p>');
                    } else {
                        if (thisVal == 'delete') {
                            $("#tab_name").val('');
                            $("#page_id").val(0);
                            $('.message_content').html('<p class="success">' + data.msg + '</p>');
                            $(".assignContent_desc").html(data.descFooter);
                        } else if (thisVal == 'edit') {
                            actionFlag = 'edit';
                            $("#tab_name").val(data.tabData.name);
                            $("#page_id").val(data.tabData.page_id);
                            $(".assignContentModalLabel").html('Edit Content');
                            $(".assignContent_submitBtn").html('Update');
                        } else {
                            $(".assignContent_desc").html(data.descFooter);
                        }
                    }
                }
            });

            setTimeout(function() {
                $('.message_content').html('')
            }, 3000);

        });

        $(".assignContent_saveBtn").click(function() {
            var flag = $("#assignContent_flag").val();
            var flagId = $("#assignContent_id").val();
            $.ajax({
                type: 'GET',
                url: base_url + '/assignContentSave_ajax/' + flagId + "/" + flag,
                success: function(data) {
                    data = jQuery.parseJSON(data);
                    $(".message_content").html(data.msg);

                    setTimeout(function() {
                        $('.message_content').html('')
                    }, 3000);
                }
            });
        });


        function getAssignContentList(id, flag, hitNo) {
            $.ajax({
                type: 'GET',
                url: base_url + '/getAssignContentList_ajax/' + id + "/" + flag + "/" + hitNo,
                success: function(data) {
                    $(".assignContent_desc").html(data);
                }
            });
        }

        //=== END:: Show assign content modal =====//

        //=== START:: show image in modal =====//
        $('body').on('click', '.productImg', function() {
            var imgSrc = $(this).find('img').attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//


        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });

    });
</script>


@stop