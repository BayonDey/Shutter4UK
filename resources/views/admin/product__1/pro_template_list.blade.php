@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product templates</h3>
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
                        <div class="row">
                            <!-- <div class="col-md-9"> </div>
                            <div class="col-md-3"> -->
                            @if (App\Model\UserPermission::checkPermission('product_templates', 'add') > 0)
                            <a href="{{ route('product_template_create') }}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Product Template</button>
                            </a>
                            @endif
                            <!-- </div> -->
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Template Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($product_templates))
                                    @foreach($product_templates as $i => $template)
                                    <tr class="TR" id="TR__{{$template->id}}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $template->name }}</td>

                                        <td>
                                            @if (App\Model\UserPermission::checkPermission('product_templates', 'edit') > 0)
                                            <a href="{{route('product_template_edit', $template->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            @endif

                                            @if (App\Model\UserPermission::checkPermission('product_templates', 'delete') > 0)
                                            <a href="{{route('delete_template', $template->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete \'{{ $template->name }}\' template?')"><i class="fa fa-trash-alt"></i></a>
                                            @endif
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

        var activeTR = '<?= $activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });
</script>
@stop