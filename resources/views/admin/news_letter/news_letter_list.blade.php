@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>News Letter</h3>
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

                            @if (App\Model\UserPermission::checkPermission('news_letter_template', 'add') > 0)
                            <a href="{{ route('news_letter_create') }}" class="btn btn-success mr-2">
                                <i class="fa fa-plus-circle"></i> Create New Template
                            </a>
                            @endif
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($newsLetter))

                                @foreach($newsLetter as $i => $rowData)
                                <tr id="TR__{{$rowData->template_id }}">
                                    <td>{{ $i + 1 }}</td>

                                    <td>{{ $rowData->title }}</td>

                                    <td>
                                        <div class="action-button-wrap">
                                            @if (App\Model\UserPermission::checkPermission('news_letter_template', 'edit') > 0)
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('news_letter_edit', $rowData->template_id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                            @endif

                                            @if (App\Model\UserPermission::checkPermission('news_letter_template', 'delete') > 0)
                                            <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('news_letter_delete', $rowData->template_id ) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-alt"></i></a>
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


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop