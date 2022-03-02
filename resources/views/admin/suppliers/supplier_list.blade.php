@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Supplier List</h3>
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
                        @if(App\Model\UserPermission::checkPermission('view_suppliers', 'add') > 0)
                        <div class="row">
                            <a href="{{ route('create_supplier') }}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create new supplier</button>
                            </a>
                        </div>
                        @endif

                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($suppliers) > 0)
                                    @foreach($suppliers as $i => $supplier)
                                    <tr id="TR__{{$supplier->supplier_id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $supplier->supplier_name }}</td>
                                        <td>{{ $supplier->supplier_email }}</td>
                                        <td>{{ $supplier->phone }}</td>
 

                                        <td>
                                            <div class="action-button-wrap">
                                                @if(App\Model\UserPermission::checkPermission('view_suppliers', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit Supplier " href="{{ route('edit_supplier', $supplier->supplier_id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if(App\Model\UserPermission::checkPermission('view_suppliers', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Supplier " href="{{route('delete_supplier', $supplier->supplier_id )}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this supplier ?')"><i class="fa fa-trash-alt"></i></a>
                                                @endif

                                                <a href="{{route('set_supplier_ftp', $supplier->supplier_id)}}" class=" btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Manage FTP"><i class="fa fa-user-check"></i> FTP</a>
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

        var activeTR = '<?= $activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop