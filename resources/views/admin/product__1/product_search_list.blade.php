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
                    <div class="card card-outline card-warning p-3">
                        <table class="table table-head-fixed text-nowrap">
                            <tr>
                                <td>
                                    <form action="{{ route('getProductList_serach') }}" method="get">
                                        <!-- {{ csrf_field() }} -->
                                        <label for="">Search by product name: </label>
                                        <input type="text" name="product_name" class="form-control" value="{{$product_name}}" autocomplete="off" placeholder="Enter product name">
                                        <button type="submit" class="btn btn-info btn-sm">Go</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('getProductList_serach') }}" method="get">
                                        <!-- {{ csrf_field() }} -->
                                        <label for="">Search by product id: </label>
                                        <input type="number" name="product_id" class="form-control" value="{{$product_id}}" autocomplete="off" placeholder="Enter product id">
                                        <button type="submit" class="btn btn-info btn-sm">Go</button>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <form action="{{ route('getProductList_serach') }}" method="get">
                                        <label for="">Search by Product Type: </label>
                                        <select class="select_p_type select2" name="p_type_id" class="form-control">
                                            <option value="0"> Select Type</option>
                                            @foreach($product_types as $type)
                                            <option value="{{$type->id}}" {{ ($p_type_id == $type->id) ? 'selected' : '' }}>{{$type->pname}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-info btn-sm">Go</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('getProductList_serach') }}" method="get">
                                        <label for="">Search product by Supplier: </label>
                                        <select class="select_supplier select2" name="supplier_id" class="form-control">
                                            <option value="0"> Select Supplier</option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->supplier_id}}" {{ ($supplier_id == $supplier->supplier_id) ? 'selected' : '' }}>{{$supplier->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-info btn-sm">Go</button>
                                    </form>
                                </td>
                            </tr>

                        </table>
                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Product Type</th>
                                        <th>Supplied Name</th>
                                        <th>Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($products) == 0)

                                    @else
                                    @foreach($products as $i => $product)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <img src="{{App\Utility::filePathShow($product->image_name, 'v2_products') }}" class="proImg" width="40px">
                                        </td>
                                        <td> {{ $product->name }} </td>
                                        <td>{{ $product->p_type_name }} </td>
                                        <td>{{ $product->supplied_name }} </td>
                                        <td>{{ $product->supplier_name }} </td>
                                        <td>
                                            <div class="action-button-wrap">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('product_edit', $product->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('delete_product', ['id' => $product->id]) }}" class="btn btn-outline-danger" onclick="return confirm('{{ $product->name }}:: Are you sure you want to delete this item?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>

                            <div class="col-md-12" style="text-align: right;">
                                <div style="float: right;">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
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


        //=== START:: show image in modal =====//
        $('body').on('click', '.proImg', function() {
            var imgSrc = $(this).attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//



    });
</script>
@stop