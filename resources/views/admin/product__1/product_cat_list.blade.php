@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Product Categories</h3>
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

                    <div class="card card-outline card-primary p-3">

                        <div class="card-body table-responsive p-0">
                            <div class="col-md-12 row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <b><u>Product Type</u></b>:
                                        <select class="select_p_type select2" name="">
                                            <option value="0"> Select Type...</option>

                                            @foreach($product_types as $type)
                                            <option value="{{$type->id}}" <?= ($product_type_id == $type->id) ? "selected" : "" ?>>{{$type->pname}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('product_cat_create', $product_type_id) }}">
                                        <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Category in this Type</button>
                                    </a>
                                </div>
                            </div>


                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <!-- <th>Orders</th> -->
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($product_cat) == 0)

                                    @else
                                    @foreach($product_cat as $i => $pCat)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            @if($pCat->promote_to_front == 't')
                                            <i class="fa fa-caret-right text-success" title="Promote to front"></i>
                                            @else
                                            <i class="fa fa-times text-danger"></i>
                                            @endif
                                            &nbsp; {{ $pCat->name }}
                                        </td>
                                        <!-- <td>{{ $pCat->order_no }}</td> -->

                                        <td>

                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-info"></button> -->
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>Action
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="#">xView in Site</a>
                                                    <a class="dropdown-item" href="{{route('product_list',['product_type_id' => $pCat->product_type_id, 'parent_id' => $pCat->id])}}" target="_blank">Browse</a>
                                                    <a class="dropdown-item" href="{{ route('product_cat_edit', $pCat->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="#">xSet Prices</a>
                                                    <a class="dropdown-item" href="#">xSet Lead Time</a>

                                                    <span class="dropdown-item" title="{{ $pCat->name }} :: &#013;You can use this to allow all products in all categories and sub-categories &#013;under {{ $pCat->name }} to be offered as samples">
                                                        Samples Availability
                                                        <!-- <br> -->&nbsp;
                                                        <a href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'y']) }}" onclick="return confirm('You can use Yes, samples available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="{{ route('cat_sample_available_or_not', ['id' => $pCat->id,'product_type_id' => $pCat->product_type_id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, samples not available to allow all products in all categories and sub-categories under \'{{ $pCat->name }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                                            <i class="fa fa-thumbs-down"></i>
                                                        </a>
                                                    </span>


                                                    <!-- <a class="dropdown-item" href="#">Add New Category</a> -->
                                                    <a class="dropdown-item" href="#">xAssign Content</a>

                                                    <a href="{{ route('delete_pro_cat', ['id' => $pCat->id]) }}" class="dropdown-item"
                                                        onclick="return confirm('{{ $pCat->name }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>Reorder
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    @if ($i > 0)
                                                    <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'top'])}}">
                                                        Move to top
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'up'])}}">
                                                        Move up
                                                    </a>
                                                    @endif

                                                    @if ($i != (count($product_cat) - 1))

                                                    <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'down'])}}">
                                                        Move down
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('product_cat_up_down', ['id' => $pCat->id, 'product_type_id' => $pCat->product_type_id, 'flag'=>'bottom'])}}">
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
            var select_p_type = $(this).val();
            // alert(select_p_type);
            window.location = select_p_type;
        });

    });
</script>
@stop