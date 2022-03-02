@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Manage Product Price</h3>
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
                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <h2 class="subheader">Manage Product Price</h2>
                            <a class="btn btn-primary" href="#">
                                <i class="fas fa-chevron-left"></i> Back to price adjustments list
                            </a> 
                        </div> -->

                        <div class="card card-body result-part">
                            <div class="datahints">
                                <div class="box card instructionhints">
                                    <p class="hints-text"> You can view supplier price tables based on a number of different criteria</p>

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


                            <form action="{{route('view_product_price_table')}}" class="view_product_price_table" method="post">
                                {{ csrf_field() }}
                                <!-- <div class="card-title mb-3 w-100">Step 1: Filter Criteria</div> -->

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
                                    <a href="#" class="btn btn-default cancel_form">Cancel </a>
                                    <button type="button" class="btn btn-info ml-auto View_Price_Table">View Price Table</button>
                                </div>


                            </form>
                            <br>
                            <br>
                            <div class="row view_result_icon"></div>
                            <div class="row view_result_content">
                                <!-- Data come from ajax -->
                            </div>

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Price you have selected</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body spec-details mb-0">
                <form id="setPrice_form" action="{{route('update_product_price')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="width_min" class="label-title">Width from:</label>
                                <div class="input-group ">
                                    <input type="hidden" class="form-control" name="price_id" id="price_id">
                                    <input type="text" class="form-control" name="width_min" id="width_min">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <p class="error width_min_err"></p>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="width_max" class="label-title">Width to:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="width_max" id="width_max">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <p class="error width_max_err"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="height_min" class="label-title">Drop from:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="height_min" id="height_min">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <p class="error height_min_err"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="height_max" class="label-title">Drop to:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="height_max" id="height_max">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <p class="error height_max_err"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="label-title">Cost price:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="price" id="price">
                                    <div class="input-group-append">
                                        <span class="input-group-text">£</span>
                                    </div>
                                </div>
                                <p class="error price_err"></p>
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


@endsection
@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";


        $('body').on('click', '.edit_price_btn', function() {
            var id = $(this).attr('id').split('__')[1];

            $("#setPrice_id").val(id);

            var widthMin = $("#widthMin__" + id).val();
            var widthMax = $("#widthMax__" + id).val();
            var heightMin = $("#heightMin__" + id).val();
            var heightMax = $("#heightMax__" + id).val();
            var price = $("#price__" + id).val();
            // alert(widthMin);
            $("#price_id").val(id);
            $("#width_min").val(widthMin);
            $("#width_max").val(widthMax);
            $("#height_min").val(heightMin);
            $("#height_max").val(heightMax);
            $("#price").val(price);

            $("#setPriceModal").modal('show');
        });


        $(".setPrice_submitBtn").click(function(event) {
            event.preventDefault();
            var width_min = $('#width_min').val();
            var width_max = $('#width_max').val();
            var height_min = $('#height_min').val();
            var height_max = $('#height_max').val();
            var price = $('#price').val();
            $.post({
                type: 'POST',
                url: base_url + '/update_product_price',
                data: $("#setPrice_form").serialize(),

                success: function(returnData) {
                    console.log(returnData);
                    if (returnData == 1) {
                        $("#setPriceModal").modal('hide');
                        View_Price_Table();
                        $.alert({
                            title: 'Success!',
                            content: "Update successfully",
                        });
                    } else {
                        $.alert({
                            title: 'Alert!',
                            content: returnData,
                        });
                    }
                }
            });
        });


        $(".View_Price_Table").click(function() {
            View_Price_Table();
        });

        function View_Price_Table() {
            $(".view_result_icon").html('<i class="fa fa-spin fa-spinner"></i>');
            $.post({
                type: 'POST',
                url: base_url + '/view_product_price_table',
                data: $(".view_product_price_table").serialize(),

                success: function(returnData) {
                    console.log(returnData);
                    $(".view_result_icon").html('');
                    $(".view_result_content").html(returnData);

                    $("#example1").DataTable({
                        "responsive": false,
                        "lengthChange": false,
                        "autoWidth": false,
                        "paging": false,
                        aoColumnDefs: [{
                            bSortable: false,
                            aTargets: [-1, -2, -3, -4]
                        }]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                }
            });
        }

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