@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Promotion List</h3>
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
                        @if(App\Model\UserPermission::checkPermission('edit_promotions', 'add') > 0)
                        <div class="row">
                            <a href="{{ route('promotions_create') }}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create new promotion</button>
                            </a>
                        </div>
                        @endif

                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Discount</th>
                                        <th>Code</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($promotionList) > 0)
                                    @foreach($promotionList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $rowData->name }}</td>
                                        <td>{{ $rowData->type }}</td>
                                        <td>{{ (($rowData->type == 'Free Delivery') ? '--' : ( (($rowData->type == 'Exact Price Off') ? '£ ' : ''). $rowData->x. (($rowData->type == 'Percentage Off') ? ' %' : ''))) }}</td>
                                        <td>{{ $rowData->code }}</td>
                                        <td>{{ App\Utility::showDate($rowData->start_date) }}</td>
                                        <td>{{ App\Utility::showDate($rowData->end_date) }}</td>
 
                                        <td>
                                            <div class="action-button-wrap">
                                                @if(App\Model\UserPermission::checkPermission('edit_promotions', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('promotions_edit', $rowData->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if(App\Model\UserPermission::checkPermission('edit_promotions', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('promotions_delete', $rowData->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this promotion ?')"><i class="fa fa-trash-alt"></i></a>
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

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop