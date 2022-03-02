@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Admin User List</h3>
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
                        @if(App\Model\UserPermission::checkPermission('admin_users', 'add') > 0)
                        <div class="row">
                            <a href="{{ route('create_admin_user') }}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Create new admin user</button>
                            </a>
                        </div>
                        @endif

                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Group</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users) == 0)

                                    @else
                                    @foreach($users as $user)
                                    <tr id="TR__{{$user->id}}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->access_group }}</td>
                                        <td>{{ ($user->type == 1) ? "Super Admin" : (($user->type == 2) ? "Admin" : "Buyer") }}</td>
                                        <td>
                                            <div class="action-button-wrap">

                                                <a href="{{route('view_admin_user', $user->id)}}" class="btn btn-outline-warning"><i class="fa fa-user-circle"></i></a>

                                                @if(App\Model\UserPermission::checkPermission('admin_users', 'edit') > 0)
                                                @if(Auth::guard('admin')->user()->type == 1)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit admin user" href="{{route('edit_admin_user', $user->id)}}" class="btn btn-outline-info"><i class="fa fa-user-edit"></i></a>
                                                @elseif($user->type != 1)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit admin user" href="{{route('edit_admin_user', $user->id)}}" class="btn btn-outline-info"><i class="fa fa-user-edit"></i></a>
                                                @endif
                                                @endif

                                                @if(Auth::guard('admin')->user()->type == 1 && (Auth::guard('admin')->user()->id != $user->id))
                                                <!-- <a data-toggle="tooltip" data-placement="top" title="User permission" href="{{route('user_permission', $user->id)}}" class="btn btn-outline-default"><i class="fa fa-user-tag"></i></a> -->
                                                @endif

                                                @if($user->type != 1 && (Auth::guard('admin')->user()->id != $user->id))
                                                @if(App\Model\UserPermission::checkPermission('admin_users', 'delete') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete user" href="{{route('delete_admin_user', $user->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user ?')"><i class="fa fa-trash-alt"></i></a>
                                                @endif
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

        var activeTR = '<?= $activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop