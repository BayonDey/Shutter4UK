@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> Create New Band</h3>
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
                        <form action="{{route('bandCreate_store')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Band Details</h3>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span class="label-title">Band Name*</span>
                                                <input type="text" class="form-control  " name="name" />

                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>


                                            <div class="form-group ">
                                                <span class="label-title">Supplier*</span>
                                                <select class="form-control select2" name="supplier_id" id="supplier_id">
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->supplier_id }}" {{($supplierId==$supplier->supplier_id) ? 'selected' : ''}}>{{ $supplier->supplier_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('supplier_id'))
                                                <div class="error">{{ $errors->first('supplier_id') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <span class="label-title">Product Type</span>
                                                <select class="form-control select2" name="product_type_id" id="product_type_id">
                                                    <option value="0"  >Select...</option>

                                                    @foreach($product_types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->pname }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_type_id'))
                                                <div class="error">{{ $errors->first('product_type_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="button-action justify-content-end">

                                        <a href="{{route('band_list',$supplierId)}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
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