@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Assign Product Filters </h3>
                        </div>
                        <div class="col-sm-4">
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

                        <div class="individual-box card card-outline card-info">
                            <div class="card-body">

                                <div class="box card card-body">
                                    <!-- <h3 class="filter-criteria">Individual Product query</h3> -->

                                    <form action="{{route('product_filter_matrix_save')}}" method="post">
                                        <div class="row">
                                            {{ csrf_field() }}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-title">Supplier</label>
                                                    <select name="supplier_id" id="supplier_id"
                                                        class='form-control select2'>
                                                        <option value="0">All Suppliers</option>
                                                        @foreach($supplierList as $supplierRow)
                                                        <option value="{{$supplierRow->supplier_id}}">
                                                            {{$supplierRow->supplier_name}}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label class="label-title">Product Types</label>
                                                    <select id="product_type_id" class='form-control select2'
                                                        name="product_type_id">
                                                        <option value="0">All Product Types</option>
                                                        @foreach($pTypes as $typeRow)
                                                        <option value="{{$typeRow->id}}">{{$typeRow->pname}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label class="label-title">Band</label>
                                                    <select size="12" class='form-control' id="band_id"
                                                        name="band_ids[]" multiple="multiple">
                                                        <option value="0">All Bands</option>
                                                        @foreach($bandList as $bandRow)
                                                        <option value="{{$bandRow->id}}">{{$bandRow->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-title"> Products</label>
                                                    <select size="20" class='form-control' id="product_id"
                                                        name="product_ids[]" multiple="multiple">
                                                        <option value="0">All Products</option>
                                                        @foreach($productList as $proRow)
                                                        <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="card card-outline   spec-details">
                                                    <div class="card-body newroduct-filters">
                                                        <h3 class="heading mb-4">Product Filters</h3>
                                                        <div class="row">

                                                            <div class="form-group col-md-12">
                                                                <div class="color-group">
                                                                    <span class="label-title">Colours
                                                                    </span>
                                                                    <div class="color-palte">
                                                                        <h3 class="submenu"> Keep assigned Colours?</h3>

                                                                        <div>

                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[1]"
                                                                                    class='radioSelect' value="yes"
                                                                                    id="1_yes" id="yes">
                                                                                <label class="form-check-label"
                                                                                    for="yes">Yes</label>
                                                                            </div>
                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[1]"
                                                                                    class='radioSelect' value="no"
                                                                                    id="No" id="1_no">
                                                                                <label class="form-check-label"
                                                                                    for="No">No</label>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-check nobg-pd-border">

                                                                        <input type="radio" name="radioSelect[1]"
                                                                            class='radioSelect' value="remove"
                                                                            id="1_remove">
                                                                        <label class="form-check-label"
                                                                            for="1_remove">Remove List</label>
                                                                    </div>



                                                                    <div class="item_list" id="itemList__1"
                                                                        style="display: none;">

                                                                        <div class='warningMsg' id="warningMsg__1__yes">
                                                                            Warning: Applying the following Colours to
                                                                            your selection will not override any
                                                                            previously existing Colours
                                                                        </div>
                                                                        <div class='warningMsg' id="warningMsg__1__no">
                                                                            Warning: Applying the following Colours to
                                                                            your selection will override any previously
                                                                            existing Colours
                                                                        </div>

                                                                        @if(count($pFilterColor) > 0)
                                                                        @foreach($pFilterColor as $color)
                                                                        <label class="form-check"
                                                                            id='TR__{{$color->id}}'
                                                                            for="exampleCheck_{{$color->id}}">
                                                                            <img src="{{ App\Utility::filePathShow(@$color->image, 'v3_product_filters') }}"
                                                                                class="image-plate" />

                                                                            <label
                                                                                class="form-check-label">{{$color->name}}</label>
                                                                            <input type="checkbox"
                                                                                class='filterCheckbox ml-auto'
                                                                                name="filter[1][]"
                                                                                id="exampleCheck_{{$color->id}}"
                                                                                value="{{$color->id}}">
                                                                        </label>
                                                                        @endforeach
                                                                        @else
                                                                        <p>No product filters have been created yet</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">

                                                                <div class="color-group">
                                                                    <span class="label-title">Features
                                                                    </span>
                                                                    <div class="color-palte">
                                                                        <h3 class="submenu">Keep assigned Features?</h3>

                                                                        <div>
                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[2]"
                                                                                    class='radioSelect' value="yes"
                                                                                    id="2_yes">

                                                                                <label class="form-check-label"
                                                                                    for="2_yes">Yes</label>
                                                                            </div>
                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[2]"
                                                                                    class='radioSelect' value="no"
                                                                                    id="2_no">
                                                                                <label class="form-check-label"
                                                                                    for="2_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="form-check nobg-pd-border">
                                                                            <input type="radio" name="radioSelect[2]"
                                                                                class='radioSelect' value="remove"
                                                                                id="2_remove">
                                                                            <label class="form-check-label"
                                                                                for="2_remove">Remove List</label>
                                                                        </div>
                                                                    </div>



                                                                    <div class="item_list" id="itemList__2"
                                                                        style="display: none;">


                                                                        <div class='warningMsg' id="warningMsg__2__yes">
                                                                            Warning: Applying the following Features to
                                                                            your selection will not override any
                                                                            previously existing Features
                                                                        </div>
                                                                        <div class='warningMsg' id="warningMsg__2__no">
                                                                            Warning: Applying the following Colours to
                                                                            your selection will override any previously
                                                                            existing Features
                                                                        </div>
                                                                        @if(count($pFilterFeatures) > 0)

                                                                        @foreach($pFilterFeatures as $row)
                                                                        <label class="form-check" id='TR__{{$row->id}}'
                                                                            for="exampleCheck_{{$row->id}}">
                                                                            <img src="{{ App\Utility::filePathShow(@$row->image, 'v3_product_filters') }}"
                                                                                class="image-plate" />



                                                                            <label
                                                                                class="form-check-label">{{$row->name}}</label>
                                                                            <input type="checkbox"
                                                                                class='filterCheckbox ml-auto'
                                                                                name="filter[2][]"
                                                                                id="exampleCheck_{{$row->id}}"
                                                                                value="{{$row->id}}">
                                                                        </label>
                                                                        @endforeach
                                                                        @else
                                                                        <p class="no-product">No product filters have
                                                                            been created yet</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="form-group col-md-12">
                                                                <div class="color-group">
                                                                    <span class="label-title">Buy</span>
                                                                    <div class="color-palte">
                                                                        <h3 class="submenu"> Keep assigned Buy?</h3>
                                                                        <div class="color-palte">
                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[3]"
                                                                                    class='radioSelect' value="yes"
                                                                                    id="3_yes">
                                                                                <label class="form-check-label"
                                                                                    for="3_yes">Yes</label>
                                                                            </div>
                                                                            <div class="form-check nobg-pd-border">
                                                                                <input type="radio"
                                                                                    name="radioSelect[3]"
                                                                                    class='radioSelect' value="no"
                                                                                    id="3_no">
                                                                                <label class="form-check-label"
                                                                                    for="3_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="form-check nobg-pd-border">
                                                                            <input type="radio" name="radioSelect[3]"
                                                                                class='radioSelect' value="remove"
                                                                                id="3_remove">
                                                                            <label class="form-check-label"
                                                                                for="3_remove">Remove List</label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="item_list" id="itemList__3"
                                                                        style="display: none;">

                                                                        <div class='warningMsg' id="warningMsg__3__yes">
                                                                            Warning: Applying the following Features to
                                                                            your selection will not override any
                                                                            previously existing Buy
                                                                        </div>
                                                                        <div class='warningMsg' id="warningMsg__3__no">
                                                                            Warning: Applying the following Colours to
                                                                            your selection will override any previously
                                                                            existing Buy
                                                                        </div>

                                                                        @if(count($pFilterBuy) > 0)
                                                                        @foreach($pFilterBuy as $row)
                                                                        <label class="form-check" id='TR__{{$row->id}}'
                                                                            for="exampleCheck_{{$row->id}}">
                                                                            <img src="{{ App\Utility::filePathShow(@$row->image, 'v3_product_filters') }}"
                                                                                class="image-plate" />

                                                                            <input type="checkbox"
                                                                                class='filterCheckbox'
                                                                                name="filter[3][]"
                                                                                id="exampleCheck_{{$row->id}}"
                                                                                value="{{$row->id}}">

                                                                            <label
                                                                                class="form-check-label">{{$row->name}}</label>
                                                                        </label>
                                                                        @endforeach
                                                                        @else
                                                                        <p class="no-product">No product filters have
                                                                            been created yet</p>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="btn-action d-flex">
                                                    <button type="button"
                                                        class='btn btn-default mr-auto cancel_form'>Cancel</button>
                                                    <input type="submit" class='btn btn-info' value="Save">
                                                </div>
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
</div>
</div>

</div>


@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        $(".radioSelect").click(function() {
            var thisId = $(this).attr('id');
            var type = thisId.split('_')[0];
            var ratioFlag = thisId.split('_')[1];
            if ((ratioFlag == 'yes') || (ratioFlag == 'no')) {

                $(".warningMsg").hide();
                $("#warningMsg__" + type + "__" + ratioFlag).show();

                $("#itemList__" + type).show("slide", {
                    direction: "up"
                }, 1000);
            } else {
                $("#itemList__" + type).hide("slide", {
                    direction: "up"
                }, 1000);
            }
        });


        $(".cancel_form").click(function() {
            $("#supplier_id").val(0);
            $("#product_type_id").val(0);
            $("#band_id").val(0);
            $("#product_id").val(0);
            $(".radioSelect, .filterCheckbox").prop('checked', false);

            $(".item_list").hide();
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