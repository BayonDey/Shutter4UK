@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Frontend User List</h3>
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

                    <div class="card card-outline card-primary">

                        <div class="card-body table-responsive p-2" style="height: 300px; width: 100%">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users) == 0)

                                    @else
                                    @foreach($users as $i => $user)
                                    <tr>
                                        <!-- <td>{{ $i + 1 }}</td> -->
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $user->b_firstname." ".$user->b_lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->b_telephone }}</td>

                                        <td>
                                            @if($user->user_status == 't')
                                            <a href="#" class="btn-success btn-sm"><i class="fa fa-check-circle"></i></a>
                                            @else
                                            <a href="#" class="btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('user_details', $user->id) }}" class=" btn-warning btn-sm"><i class="fa fa-eye"></i></a>

                                            @if(App\Model\UserPermission::checkPermission('frontend_users', 'edit') > 0)
                                            <a href="{{ route('user_edit', $user->id) }}" class=" btn-info btn-sm"><i class="fa fa-user-edit"></i></a>
                                            @endif

                                            <a href="#" class=" btn-primary btn-sm">Orders</a>

                                            @if(App\Model\UserPermission::checkPermission('frontend_users', 'delete') > 0)
                                            @if($user->user_status == 't')
                                            <a href="{{route('user_change_status', $user->id)}}" class=" btn-danger btn-sm" onclick="return confirm('Are you sure you want to Disable this user?')">Disable</a>
                                            @else
                                            <a href="{{route('user_change_status', $user->id)}}" class="btn-success btn-sm" onclick="return confirm('Are you sure you want to Enable this user?')">Enable</a>
                                            @endif
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