@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Manage Delivery Option</h3>
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
                            @if (App\Model\UserPermission::checkPermission('delivery_option_list', 'add') > 0)
                            <div class="col-md-12">
                                <a href="{{route('delivery_option_create')}}" class="btn btn-success">Create new option »</a>
                            </div>
                            @endif

                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Delivery Type</th>
                                        <!-- <th>display_name</th> -->
                                        <th>Price (£)</th>
                                        <th>Free over amount (£)</th> 
                                        @if (App\Model\UserPermission::checkPermission('delivery_option_list', 'edit') > 0)
                                        <th>Edit</th>
                                        @endif
                                        @if (App\Model\UserPermission::checkPermission('delivery_option_list', 'delete') > 0)
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
                                        <td>{{ $rowData->name }}</td>
                                        <!-- <td>{{ $rowData->display_name }}</td> -->
                                        <td>{{ $rowData->price }}</td>
                                        <td>{{ $rowData->free_over_amount }}</td> 
                                        @if (App\Model\UserPermission::checkPermission('delivery_option_list', 'edit') > 0)
                                        <td>
                                            <a href="{{route('delivery_option_edit', $rowData->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                        @endif
                                        
                                        @if (App\Model\UserPermission::checkPermission('delivery_option_list', 'delete') > 0)
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
                    title: 'Delete Delivery Option',
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
                                    url: base_url + '/delivery_option_delete',
                                    data: {
                                        _token: "<?= csrf_token(); ?>",
                                        ids: val,
                                    },
                                    success: function(data) {
                                        window.location = base_url + "/delivery-option/list";
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