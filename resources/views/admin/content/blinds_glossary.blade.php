@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Blind Glossary</h3>
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

                        <form action="{{ route('blindsGlossary_save') }}" method="POST" id=" " enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$glossaryMain->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">URL</span>
                                        <?php echo URL::to('/') . "/"; ?>
                                        <input type="text" name="content_url" class="form-control" value="{{@$glossaryMain->content_url}}">
                                        @if($errors->has('content_url'))
                                        <div class="error">{{ $errors->first('content_url') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Title</span>
                                        <input type="text" name="content_title" class="form-control" value="{{@$glossaryMain->content_title}}">
                                        @if($errors->has('content_title'))
                                        <div class="error">{{ $errors->first('content_title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Description</span>
                                        <textarea name="content_desc" cols="30" rows="20" class="form-control ckeditor">{{@$glossaryMain->content_desc}}</textarea>
                                        @if($errors->has('content_desc'))
                                        <div class="error">{{ $errors->first('content_desc') }}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="button-action">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                            </div>



                        </form>

                        <div class="card-body table-responsive p-2">
                            @if (App\Model\UserPermission::checkPermission('blind_glossary', 'add') > 0)
                            <a href="{{route('blinds_glossary_child_create')}}" class="btn btn-success">Create new glossary »</a>
                            @endif

                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($glossaryList) > 0)
                                    @foreach($glossaryList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $rowData->title }}</td>

                                        <td>
                                            <div class="action-button-wrap">
                                                @if (App\Model\UserPermission::checkPermission('blind_glossary', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('blinds_glossary_child_edit', $rowData->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if (App\Model\UserPermission::checkPermission('blind_glossary', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{route('blinds_glossary_child_delete', $rowData->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-trash-alt"></i></a>
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