@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Manage Band </h3>
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



                        <div class="card-header new-align-wrap ">
                            <div class="row res-wrap">
                                <div class="col-md-3">
                                    <h3 class="card-title mt-2">Select Supplier</h3>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control select2 supplier_id_select">
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->supplier_id }}" {{($supplierId==$supplier->
                                            supplier_id) ? 'selected' : ''}}>{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                        <option value="0" {{($supplierId==0) ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                            </div>
                            @if($supplierId > 0)
                            @if(App\Model\UserPermission::checkPermission('view_bands', 'add') > 0)

                            <a href="{{ route('band_create', $supplierId) }}" class="btn btn-success mr-2">
                                <i class="fa fa-plus-circle"></i> Create New
                                Band
                            </a>
                            @endif
                            @endif
                            <a href="{{ route('supplier_list', ['tr' =>$supplierId]) }}" class="btn btn-primary">
                                <i class="fas fa-angle-double-left"></i> Back To Supplier List
                            </a>

                        </div>

                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Band Name</th>
                                        <th>Product Type</th>
                                        <th></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($bands) > 0)
                                    @foreach($bands as $i => $band)
                                    <tr id="TR__{{$band->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $band->name }}</td>
                                        <td>{{ @$band->productTypeName->pname }}</td>
                                        <td>
                                            <form action="{{route('copyBand')}}" class='bandCopyForm' method="post">
                                                {{ csrf_field()}}
                                                <input type="hidden" name="band_id" value="{{ $band->id }}">
                                                <div class="row mb-1">
                                                    <div class="col-10">
                                                        <input type="text" class="newBandName form-control"
                                                            name="new_band_name" id="newBandName__{{ $band->id }}"
                                                            style="display: none;" required>
                                                    </div>
                                                    <div class="col-2 pl-0">
                                                        <button type="button" class="bandCopyCan btn btn-danger btn-sm"
                                                            style="display: none; min-width: inherit">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <button type="submit" class="newBandNameSubmit  btn btn-info w-100"
                                                    style="display: none;">Copy: {{ $band->name }}</button>

                                                <button type="button" class="bandCopy btn btn-warning btn-sm">
                                                    Copy »
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="action-button-wrap">
                                                @if(App\Model\UserPermission::checkPermission('view_bands', 'edit') > 0)
                                                <a data-toggle="tooltip" data-placement="top" title="Edit Band"
                                                    href="{{ route('band_edit', $band->id ) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                @endif

                                                @if(App\Model\UserPermission::checkPermission('view_bands', 'delete') >
                                                0)
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Band"
                                                    href="{{ route('band_delete', $band->id ) }}"
                                                    class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this band ?')"><i
                                                        class="fa fa-trash-alt"></i></a>
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
                        <div class="row">
                            <a href="{{ route('supplier_list', ['tr' =>$supplierId]) }}">
                                <button class="btn btn-primary">
                                    << Back To Supplier List </button>
                            </a> &nbsp;&nbsp;
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
    $(document).ready(function () {
            var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

            $('.supplier_id_select').change(function () {
                var supplier_id = $(this).val();
                window.location = base_url + "/band/" + supplier_id;
            });


            $('.newBandName, .newBandNameSubmit, .bandCopyCan').hide();
            $(".bandCopy").click(function () {
                $('.newBandName').val('');
                $('.newBandName, .newBandNameSubmit, .bandCopyCan').hide();
                $('.bandCopy').show();
                $(this).hide();
                $(this).closest('.bandCopyForm').find('.newBandName, .newBandNameSubmit, .bandCopyCan').show();
            });
            $(".bandCopyCan").click(function () {
                $(this).closest('.bandCopyForm').find('.newBandName, .newBandNameSubmit, .bandCopyCan').hide();
                $(this).closest('.bandCopyForm').find('.bandCopy').show();
            });


            var activeTR = '<?= @$activeTR ?>';
            $("#TR__" + activeTR).addClass('activeTR');
        });

        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });
</script>
@stop