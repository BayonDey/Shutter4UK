@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product List</h3>
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
                        <div class="col-md-12 row">
                            <div class="col-md-5">
                                <b><u>Product Type</u></b>:<br>
                                <select class="select_p_type select2" name="">
                                    <!-- <option value="0"> Select Type</option> -->

                                    @foreach($product_types as $type)
                                    <option value="{{$type->id}}" <?= ($product_type_id == $type->id) ? "selected" : "" ?>>{{$type->pname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" col-md-5">
                                <b><u>Product Categories</u></b>:<br>
                                <select class="select_p_cat select2" name="">
                                    <option value="0"> Select Category...</option>

                                    @foreach($product_cats as $cat)
                                    <option value="{{$cat->id}}" <?= ($parent_id == $cat->id) ? "selected" : "" ?>>
                                        @if($cat->promote_to_front == 't')
                                        @else
                                        X
                                        @endif
                                        {{$cat->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-md-2">
                                <!-- <a href=" ">
                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Product</button>
                                </a> -->
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Trade</th>
                                        <th>Retail</th>
                                        <th>Sale</th>
                                        <th>Sale Start & Expire</th>
                                        <th>Lead</th>
                                        <!-- <th>Sample</th> -->
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($products) == 0)

                                    @else
                                    @foreach($products as $i => $product)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <?php
                                            $pimage_ph = ($product->image_name != '') ? asset('uploads/v2_products/' . $product->image_name) : '';
                                            ?>
                                            <img src="{{$pimage_ph}}" width="80px">
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                            </br>
                                            <u>{{ " (".$product->supplied_name.")" }}</u>
                                        </td>
                                        <td>{{ $product->trade_percentage }}%</td>
                                        <td>{{ $product->profit_margin }}%</td>
                                        <td>{{ $product->sales_percentage }}%</td>
                                        <td>{{ date('d/m/y', strtotime($product->sale_start)) }} - {{ date('d/m/y', strtotime($product->sale_end)) }}</td>
                                        <td>{{ $product->lead_time_days }}</td>
                                        <!-- <td>{{ ($product->allow_samples == 'y') ? "Yes" : "No" }}</td> -->
                                        <td>

                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-info"></button> -->
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>Action
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('product_details', $product->id) }}">View</a>
                                                    <a class="dropdown-item" href="{{ route('get_full_url', ['id' => $product->id, 'flag'=>'product']  ) }}">View in Site</a>
                                                    <!-- <a class="dropdown-item" href="#">Browse</a> -->
                                                    <a class="dropdown-item" href="{{ route('product_edit', $product->id) }}">Edit</a>
                                                    <!-- <a class="dropdown-item" href="#">x Set Prices</a>
                                                    <a class="dropdown-item" href="#">x Set Lead Time</a> -->

                                                    <span class="dropdown-item" title="{{ $product->name }} :: &#013;You can use this to allow the product &#013;{{ $product->name }} to be offered as samples">
                                                        Samples Availability
                                                        <!-- <br> -->&nbsp;
                                                        <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id,'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="{{ route('pro_sample_available_or_not', ['id' => $product->id,'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all product \'{{ $product->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                                            <i class="fa fa-thumbs-down"></i>
                                                        </a>
                                                    </span>

                                                    <!-- <a class="dropdown-item" href="#">Add New Category</a> -->
                                                    <a class="dropdown-item" href="#">x Assign Content</a>
                                                    <a href="{{ route('delete_product', ['id' => $product->id]) }}" class="dropdown-item" onclick="return confirm('{{ $product->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-hover " data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-sort-amount-up-alt"></i>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    @if ($i > 0)
                                                    <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'top'])}}">
                                                        Move to top
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'up'])}}">
                                                        Move up
                                                    </a>
                                                    @endif

                                                    @if ($i != (count($products) - 1))

                                                    <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id,'parent_id' => $product->parent_id, 'flag'=>'down'])}}">
                                                        Move down
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('product_up_down', ['id' => $product->id, 'product_type_id' => $product->product_type_id, 'parent_id' => $product->parent_id,'flag'=>'bottom'])}}">
                                                        Move to bottom
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
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


@endsection

@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        $('.select_p_type').change(function() {
            var select_p_type = $(".select_p_type").val();
            window.location = base_url + "/products/" + select_p_type + "/0";
        });

        $('.select_p_cat').change(function() {
            var select_p_type = $(".select_p_type").val();
            var select_p_cat = $(".select_p_cat").val();
            window.location = base_url + "/products/" + select_p_type + "/" + select_p_cat;
        });




    });
</script>
@stop