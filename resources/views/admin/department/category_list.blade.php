@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-9">
                            <h3>Manage Departments Category</h3>
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
                            <a href="{{ route('category_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Add Category
                                </button>
                            </a>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>URL</th>
                                    <th>Promote front</th>
                                    <th>Main Home</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($dataList))

                                @foreach($dataList as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <img src="{{ App\Utility::filePathShow($rowData->category_logo, 'department_category') }}" class="blogPostImg" width="40px">
                                    </td>

                                    <td>
                                        <img src="{{ App\Utility::filePathShow($rowData->category_image, 'department_category') }}" class="blogPostImg" width="60px">
                                    </td>
                                    <td>
                                        <a href="{{ route('dept_home',['dep_link'=>'main-store', 'cat'=>$rowData->category_url]) }}" target="_blank">{{ $rowData->category_name }}</a>
                                    </td>
                                    <td>{{ $rowData->category_url }}</td>
                                    <td>
                                        <div class="action-button-wrap">
                                            <label class="switch">
                                                <input type="checkbox" class=" promote_to_front_switch" id="switch__{{$rowData->id }}" {{ ($rowData->promote_front == 'Y') ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="show_in_main_home" id="check__{{$rowData->id }}" {{ ($rowData->show_in_main_home == 'Y') ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <div class="action-button-wrap">
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('category_edit', $rowData->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
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
        $(".promote_to_front_switch").click(function() {
            var thisId = $(this).attr('id');
            var fdId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/promote_front_category/' + fdId,
                data: {},
                dataType: "json",

                success: function(returnData) {
                    if (returnData == 1) {
                        $.alert({
                            title: 'Success',
                            content: 'Update successfully',
                        });
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Something was wrong',
                        });
                    }

                }
            });
        });


        $(".show_in_main_home").click(function() {
            var thisId = $(this).attr('id');
            var fdId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/show_in_main_home/' + fdId,
                data: {},
                dataType: "json",

                success: function(returnData) {
                    if (returnData == 1) {
                        $.alert({
                            title: 'Success',
                            content: 'Update successfully',
                        });
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Something was wrong',
                        });
                    }

                }
            });
        });


        //=== START:: show image in modal =====//
        $('body').on('click', '.blogPostImg', function() {
            var imgSrc = $(this).attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop