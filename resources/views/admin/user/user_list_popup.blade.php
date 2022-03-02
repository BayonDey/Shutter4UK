@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6"><h3>Popup User List</h3></div>
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
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->id }}</td>
                                                <td><span class="tag tag-success">Approved</span></td>
                                                <td>
                                                    <a href="#" class=" btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class=" btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
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
