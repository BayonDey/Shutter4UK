@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product Type</h3>
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
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <a href="{{ route('product_type_create')}}">
                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Product Type</button>
                                </a>
                            </div>
                        </div>


                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Product Type</th>
                                        <th>Promote to front</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($product_types) == 0)

                                    @else
                                    @foreach($product_types as $i => $p_type)

                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <!-- <td>{{ $p_type->order_no }}</td> -->
                                        <td>{{ $p_type->pname }}</td>
                                        <td>{{ ($p_type->promote_to_front == 't') ? "Yes" : "No" }}</td>
                                        <td>

                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-info"></button> -->
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ env('APP_URL') . $p_type->url }}" target="_blank">
                                                        View in Site
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('product_cat_list', $p_type->id) }}" target="_blank">Browse
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('product_type_edit', $p_type->id) }}">Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">xSet Prices</a>
                                                    <a class="dropdown-item" href="#">xSet Lead Time</a>
                                                    <span class="dropdown-item" title="{{ $p_type->pname }}:: &#013;You can use this to allow all products in all categories and sub-categories &#013;under {{ $p_type->pname }} to be offered as samples">
                                                        Samples Availability
                                                        <!-- <br> -->&nbsp;
                                                        <a href="{{ route('sample_available_or_not', ['id' => $p_type->id, 'flag'=>'y']) }}" onclick="return confirm('You can use Yes, Samples Available to allow all products in all categories and sub-categories under \'{{ $p_type->pname }}\' to be offered as samples.\nAre you sure?')" title="Yes, samples available">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="{{ route('sample_available_or_not', ['id' => $p_type->id, 'flag'=>'n']) }}" onclick="return confirm('You can use No, Samples Not Available to allow all products in all categories and sub-categories under \'{{ $p_type->pname }}\' to be offered as samples.\nAre you sure?')" title="No, samples not available">
                                                            <i class="fa fa-thumbs-down"></i>
                                                        </a>

                                                    </span>
                                                    <a class="dropdown-item" href="{{route('product_cat_create', $p_type->id)}}">Add New Category</a>
                                                    <a class="dropdown-item" href="#">xAssign Content</a>
                                                    <a href="{{ route('delete_pro_type', ['id' => $p_type->id]) }}" class="dropdown-item" onclick="return confirm('{{ $p_type->pname }}:: Are you sure you want to delete this item? Any sub categories or products will also be deleted.')">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <!-- <button type="button" class="btn btn-info"></button> -->
                                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-hover dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">Reorder
                                                    <span class="sr-only">Toggle Dropdown</span>
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

                                                    @if ($i != (count($product_types) - 1))

                                                    <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'down'])}}">
                                                        Move down
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('product_type_up_down', ['id' => $p_type->id, 'flag'=>'bottom'])}}">
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