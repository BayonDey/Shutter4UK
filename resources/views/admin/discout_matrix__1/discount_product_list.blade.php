@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Extra Discount Product</h3>
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
                        <div class="card-body table-responsive p-2">

                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Img </th>
                                        <th>Product type</th>
                                        <th>Swatch name</th>
                                        <th>Discount</th>
                                        <th>Category name</th>
                                        <th>Supplier </th>
                                        <th>Date range </th>
                                        @if(App\Model\UserPermission::checkPermission('discount_product_list', 'delete') > 0)
                                        <th>
                                            <div class="action-button-wrap">
                                                <input type="checkbox" id="selectAllCheck">
                                                <button id="selectAllCheckGo" class="btn btn-outline-danger" disabled=''>
                                                    <i class="fa fa-trash-alt"></i>
                                                    <!-- <a data-toggle="tooltip" data-placement="top" title="Delete product discount" href=" " class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete ?')" type="button"><i class="fa fa-trash-alt"></i></a> -->
                                                </button>
                                            </div>
                                        </th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($productList) > 0)
                                    @foreach($productList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <!-- <td>{{ $i + 1 }}</td> -->
                                        <td class='productImg'>
                                            <img src="{{ App\Utility::filePathShow($rowData->image_name, 'v2_products') }}" width="40px">
                                        </td>
                                        <td>{{ $rowData->product_type_name }}</td>
                                        <td>
                                            <a href="{{ route('product_details', $rowData->id) }}" target="_blank">
                                                {{ $rowData->name }}
                                            </a>
                                        </td>
                                        <td>{{ $rowData->x }}%</td>
                                        <td>{{ $rowData->category_name }}</td>
                                        <td>{{ $rowData->supplier_name }}</td>
                                        <td>{{ date('d/m/y', strtotime($rowData->start_date))." - ". date('d/m/y', strtotime($rowData->end_date)) }}</td>

                                        @if(App\Model\UserPermission::checkPermission('discount_product_list', 'delete') > 0)
                                        <td>
                                            <input type="checkbox" class="checkbox" name="checkbox[{{$rowData->id}}]" value="{{$rowData->id}}">
                                            <!-- <div class="action-button-wrap">
                                                <a data-toggle="tooltip" data-placement="top" title="Delete product discount" href="{{ route('delete_discount_product', $rowData->id ) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-trash-alt"></i></a>
                                            </div> -->
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <br>

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

</div>

@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";


        $('#selectAllCheck').click(function() {
            if ($(this).prop('checked') == true) {
                $(".checkbox").prop('checked', true);
                $("#selectAllCheckGo").attr('disabled', false);
            } else {
                $(".checkbox").prop('checked', false);
                $("#selectAllCheckGo").attr('disabled', true);
            }
        });
        $('.checkbox').click(function() {
            if ($(this).prop('checked') == true) {
                $("#selectAllCheckGo").attr('disabled', false);
            } else {
                $("#selectAllCheck").prop('checked', false);
                // $("#selectAllCheckGo").attr('disabled', true);
            }
        });



        $("#selectAllCheckGo").click(function(e) {
            // var checkbox_order = $('.checkbox').val();
            var val = [];
            $(':checkbox:checked').each(function(i) {
                val[i] = $(this).val();
            });
            console.log(val);
            if (val.length == 0) {
                $.alert({
                    title: 'Alert!',
                    content: "Please select the checkbox",
                });
            } else {
                $.confirm({
                    title: 'Delete discount',
                    content: 'Are you sure you want to delete discount?',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-red',
                            action: function() {
                                $.ajax({
                                    type: 'POST',
                                    url: base_url + '/delete_discount_product',
                                    data: {
                                        _token: "<?= csrf_token(); ?>",
                                        proIds: val,
                                    },
                                    success: function(data) {
                                        window.location = base_url + "/discount-product/list";
                                    }
                                });
                            }
                        },
                        close: function() {}
                    }
                });


            }
        });




        //=== START:: show image in modal =====//
        $('body').on('click', '.productImg', function() {
            var imgSrc = $(this).find('img').attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop