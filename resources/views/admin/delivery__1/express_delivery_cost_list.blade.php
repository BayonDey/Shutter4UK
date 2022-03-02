@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Manage Express Delivery Cost</h3>
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
                            @if (App\Model\UserPermission::checkPermission('assign_express_delivery', 'add') > 0)
                            <div class="col-md-12">
                                <a href="{{route('express_delivery_cost_create')}}" class="btn btn-success">Create new Express Delivery »</a>
                            </div>
                            @endif

                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Supplier</th>
                                        <th>Delivery cost (£)</th>
                                        <th>Cost vat (£)</th>
                                        <th>Delivery discount (£)</th>
                                        <th>Total discount (£)</th>
                                        <th>Status</th>
                                        @if (App\Model\UserPermission::checkPermission('assign_express_delivery', 'edit') > 0)
                                        <th>Edit</th>
                                        @endif
                                        @if (App\Model\UserPermission::checkPermission('assign_express_delivery', 'delete') > 0)
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
                                    @if(count($dataList) > 0)
                                    @foreach($dataList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">

                                        <td>{{ $i+1 }}</td> 
                                        <td>{{ $rowData->supplier_name }}</td>
                                        <td>{{ $rowData->delivery_cost }}</td>
                                        <td>{{ $rowData->total_cost_vat }}</td>
                                        <td>{{ $rowData->delivery_cost_discount }}</td>
                                        <td>{{ $rowData->total_cost_discount }}</td>
                                        <td>{{ ($rowData->enable_or_disable == 1) ? 'Enable' : 'Disable' }}</td>
                                        @if (App\Model\UserPermission::checkPermission('assign_express_delivery', 'edit') > 0)
                                        <td>
                                            <a href="{{route('express_delivery_cost_edit', $rowData->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                        @endif
                                        @if (App\Model\UserPermission::checkPermission('assign_express_delivery', 'delete') > 0)
                                        <td>
                                            <input type="checkbox" class="checkbox" name="checkbox[{{$rowData->id}}]" value="{{$rowData->id}}">
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
                    title: 'Delete Express Delivery Cost',
                    content: 'Are you sure you want to delete?',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-red',
                            action: function() {
                                $.ajax({
                                    type: 'POST',
                                    url: base_url + '/express_delivery_cost_delete',
                                    data: {
                                        _token: "<?= csrf_token(); ?>",
                                        ids: val,
                                    },
                                    success: function(data) {
                                        window.location = base_url + "/express-delivery-cost/list";
                                    }
                                });
                            }
                        },
                        close: function() {}
                    }
                });


            }
        });



        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop