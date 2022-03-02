@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product Guide List</h3>
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

                        @if(App\Model\UserPermission::checkPermission('manage_product_guide', 'add') > 0)
                        <div class="row col-md-12">
                            <a href="{{ route('product_guide_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Add New Guide
                                </button>
                            </a>
                        </div>
                        @endif
                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guide name </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($guideList) > 0)
                                    @foreach($guideList as $i => $guide)
                                    <tr id="TR__{{$guide->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $guide->name }}</td>

                                        <td>
                                            <div class="action-button-wrap">
                                                @if(App\Model\UserPermission::checkPermission('manage_product_guide', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit guide" href="{{ route('product_guide_edit', $guide->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if(App\Model\UserPermission::checkPermission('manage_product_guide', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete guide" href="{{ route('product_guide_delete', $guide->id ) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this guide ?')"><i class="fa fa-trash-alt"></i></a>
                                                @endif
                                            </div>
                                        </td>
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


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop