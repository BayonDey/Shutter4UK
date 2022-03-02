@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Discount List</h3>
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
                        @if(App\Model\UserPermission::checkPermission('extra_discounts', 'add') > 0)
                        <div class="row col-md-12">
                            <div class="col-md-8">
                                <a href="{{ route('extra_discounts_create') }}">
                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create new discount</button>
                                </a>
                            </div>
                        </div>
                        @endif

                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <!-- <th>Categories</th> -->
                                        <th>Swatches</th>
                                        <th>Suppliers</th>
                                        <th>Range (£)</th>
                                        <th>Disc.</th>
                                        <th>Date Range</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($discountList) > 0)
                                    @foreach($discountList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td><a href="{{ route('product', ['type' => $rowData->product_type_id, 'category' => $rowData->parent_id]) }}" target="_blank">
                                                {{ $rowData->type_name }}</a></td>
                                        <!-- <td>{{ $rowData->cat_name }}</td> -->
                                        <td><a href="{{ route('product_details', $rowData->swatch_id) }}" target="_blank">{{ $rowData->name }}</a></td>
                                        <td>{{ $rowData->supplier_name }}</td>
                                        <td>{{ $rowData->start." - ". $rowData->end }}</td>

                                        <td>{{ ($rowData->choosediscount == 'PO') ? "$rowData->x %" : (($rowData->choosediscount == 'FV') ? "£ $rowData->fixeddiscount" : "FREE") }}</td>


                                        <td>{{ App\Utility::showDate($rowData->start_date) ." - ". App\Utility::showDate($rowData->end_date) }}</td>

                                        <td>
                                            <div class="action-button-wrap">
                                                @if(App\Model\UserPermission::checkPermission('extra_discounts', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('extra_discounts_edit', $rowData->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if(App\Model\UserPermission::checkPermission('extra_discounts', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('extra_discounts_delete', $rowData->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this discount ?')"><i class="fa fa-trash-alt"></i></a>
                                                @endif

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

        $("#discount_type_dropdown").change(function() {
            var discount_type = $(this).val();
            window.location = base_url + "/discounts/list?type=" + discount_type;
        });


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop