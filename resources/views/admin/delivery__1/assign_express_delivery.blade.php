@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Assign Express Delivery</h3>
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

                <div class="card card-outline card-success">
                    <div class="card-body">
                        <div class="col-md-12">
                            <a href="{{route('express_delivery_list')}}" class="btn btn-info">Back to list »</a>
                        </div>
                        <!-- <h2 class="subheader">Create New Assign Express Delivery</h2> -->

                        <div class="card card-body result-part">

                            <form action="{{route('assign_express_delivery_save')}}" method="post">
                                {{ csrf_field() }}
                                <div class="card-title mb-3 w-100">Create New Assign Express Delivery</div>

                                <div class="row">
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

                                        <div class="form-group">
                                            <span class="label-title">Assign Express Delivery Charge from</span>
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
                                            <span class="label-title">Category</span>
                                            <select class="form-control" id="parent_id" name="parent_id[]" size="10" multiple>
                                            @foreach($catList as $catRow)
                                                <option value="{{$catRow->id}}">{{$catRow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="button-action justify-content-start">
                                    <!-- <button type="button" class="btn btn-default   cancel_form">Cancel</button> -->
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