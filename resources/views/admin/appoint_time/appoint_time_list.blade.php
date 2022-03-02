@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Appointment Time</h3>
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
                        <div class="row col-md-12">
                            <!-- @if (App\Model\UserPermission::checkPermission('blog_categories', 'add') > 0) -->
                            <a href="{{ route('appointment_time_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Add Appointment Time
                                </button>
                            </a>
                            <!-- @endif -->
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Show front</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($appointTime))

                                @foreach($appointTime as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>

                                    <td>{{ $rowData->name }}</td>
                                    <td>
                                        <div class="action-button-wrap">
                                            <label class="switch">
                                                <input type="checkbox" class=" promote_to_front_switch" id="switch__{{$rowData->id }}" {{ ($rowData->show_front == 'Y') ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="action-button-wrap">
                                            <!-- @if (App\Model\UserPermission::checkPermission('blog_categories', 'edit') > 0) -->
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('appointment_time_edit', $rowData->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                            <!-- @endif  -->
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



@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";
        $(".promote_to_front_switch").click(function() {
            var thisId = $(this).attr('id');
            var fdId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/appoint_time_show_front/' + fdId,
                data: {},
                dataType: "json",

                success: function(returnData) {
                    if (returnData == 1) {
                        $.alert({
                            title: 'Success',
                            content: 'Update successfully',
                        });
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Something was wrong',
                        });
                    }

                }
            });
        });

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop