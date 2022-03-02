@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Assign Guide to Product </h3>
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
                                <div class="box card instructionhints">
                                    <p class="hints-text">You can assign Guides to blinds on a number of different criteria</p>

                                    <ul class="nav ">
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
                                <div class="box card card-body">
                                    <h3 class="filter-criteria">Individual Product query</h3>
                                    <!-- <h3>Step 1: Filter Criteria</h3> -->
                                    <form action="{{route('guide_matrix_save')}}" method="post">
                                        <div class="row">
                                            {{ csrf_field() }}

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-title">Choose Guide :</label>
                                                    <select name="guide_id" class='select2 form-control'>
                                                        <option value="">Please select...</option>
                                                        @foreach($guideList as $guideRow)
                                                        <option value="{{$guideRow->id}}">{{$guideRow->name}}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-title">Supplier</label>
                                                    <select name="supplier_id" id="supplier_id"
                                                        class='form-control select2'>
                                                        <option value="0">All Suppliers</option>
                                                        @foreach($supplierList as $supplierRow)
                                                        <option value="{{$supplierRow->supplier_id}}">
                                                            {{$supplierRow->supplier_name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                            </div>
                                            <div class="col-md-6">
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
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-title">Band</label>
                                                    <select size="5" class='form-control' id="band_id" name="band_ids[]"
                                                        multiple="multiple">
                                                        <option value="0">All Bands</option>
                                                        @foreach($bandList as $bandRow)
                                                        <option value="{{$bandRow->id}}">{{$bandRow->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-title">Individual Products</label>
                                                    <select size="5" class='form-control' id="product_id"
                                                        name="product_ids[]" multiple="multiple">
                                                        <option value="0">All Products</option>
                                                        @foreach($productList as $proRow)
                                                        <option value="{{$proRow->id}}">{{$proRow->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="btn-action d-flex">
                                                    {{-- <button type="submit"
                                                        class='btn btn-default mr-auto'>Cancel</button> --}}
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
                    // console.log(json);
                    // data = JSON.parse(data);
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