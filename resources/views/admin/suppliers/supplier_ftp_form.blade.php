@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> Manage supplier FTP</h3>
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
                    {{--main details--}}
                    <div class="spec-details">
                        <form action="{{route('storeSupplierFTP')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$ftpData->id}}">
                            <input type="hidden" name="Supplier_Id" value="{{@$supplierId}}">
                            <div class="individual-box card card-outline card-warning">
                                <div class="card-body">
                                    <h3 class="heading mb-4">FTP Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <span class="label-title">Host Address*</span>
                                                <input type="text" name="HostAddress" class="form-control" value="{{@$ftpData->HostAddress}}" />

                                                @if($errors->has('HostAddress'))
                                                <div class="error">{{ $errors->first('HostAddress') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">UserName*</span>
                                                <input type="text" class="form-control" value="<?= @$ftpData->UserName ?>" name="UserName" autocomplete="off"/>

                                                @if($errors->has('UserName'))
                                                <div class="error">{{ $errors->first('UserName') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Password*</span>
                                                <input type="password" class="form-control  " name="Password" />

                                                @if($errors->has('Password'))
                                                <div class="error">{{ $errors->first('Password') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Confirm Password*</span>
                                                <input type="password" class="form-control  " name="Password_confirm" />

                                                @if($errors->has('Password_confirm'))
                                                <div class="error">{{ $errors->first('Password_confirm') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="button-action justify-content-end">
                                        <a href="https://www.net2ftp.com/index.php" target="_blank">
                                            <button type="button" class="btn btn-warning mr-2"><u>Login to FTP Client</u></button>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{route('supplier_list', ['tr'=> @$ftpData->Supplier_Id])}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
                                    </div>
                                </div>



                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection