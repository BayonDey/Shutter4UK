@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Page Slider</h3>
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

                            <!-- @if (App\Model\UserPermission::checkPermission('news_letter_template', 'add') > 0) -->
                            <a href="{{ route('pg_slider_create') }}" class="btn btn-success mr-2">
                                <i class="fa fa-plus-circle"></i> Add New
                            </a>
                            <!-- @endif -->
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Button</th>
                                    <th>Date Range</th>
                                    <th>Department</th>
                                    <!-- <th>Slider Type</th> -->
                                    <th>Status</th>
                                    <th>Main Home</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($dataList))

                                @foreach($dataList as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>

                                    <?php
                                    if ($rowData->slider_type == 'text') {
                                    ?>
                                        <td style="background-color: <?= $rowData->text_bg_color ?>; color: <?= $rowData->text_color ?>;" colspan="3">{{ $rowData->slider_title }}</td>
                                    <?php
                                    } elseif ($rowData->slider_type == 'img') {
                                    ?>
                                        <td colspan="3">
                                            <img src="{{ App\Utility::filePathShow($rowData->slider_img, 'page_slider') }}" class="blogPostImg" alt="" title="{{ $rowData->content_img_alt }}" data-toggle="tooltip" data-placement="top" width="200px">
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>
                                            <img src="{{ App\Utility::filePathShow($rowData->slider_img, 'page_slider') }}" class="blogPostImg" alt="" title="{{ $rowData->content_img_alt }}" data-toggle="tooltip" data-placement="top" width="50px">

                                        </td>
                                        <td>{{ $rowData->slider_title }}</td>
                                        <td><a href="{{ $rowData->slider_url }}" target="_blank">{{ $rowData->slider_btn }}</a></td>

                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <?php
                                        if (($rowData->start_date == NULL && $rowData->end_date >=  date('Y-m-d')) ||
                                            ($rowData->start_date <= date('Y-m-d') && $rowData->end_date == NULL) ||
                                            ($rowData->start_date <=   date('Y-m-d') && $rowData->end_date >= date('Y-m-d'))
                                        ) {
                                            $class = 'text-success';
                                        } else {
                                            $class = 'text-danger';
                                        }
                                        ?>
                                        <span class="{{$class}}">
                                            {{ (($rowData->start_date != null) ? date('d/m/Y', strtotime($rowData->start_date)) : '' )." - ". (($rowData->end_date != null) ? date('d/m/Y', strtotime($rowData->end_date)) : '' ) }}
                                        </span>

                                    </td>
                                    <!-- <td>{{ ($rowData->slider_type == 'img') ? 'Image' : (($rowData->slider_type == 'text') ? 'Text' : 'Image & Text') }}</td> -->
                                   <td>{{ $rowData->getDepartment->name }}</td>
                                    <td>
                                        @if($rowData->status == '1')
                                        <a href="{{ route('pg_slider_change_status', $rowData->id) }}" class="btn btn-success btn-sm">Active</a>
                                        @else
                                        <a href="{{ route('pg_slider_change_status', $rowData->id) }}" class="btn btn-danger btn-sm">Archived</a>

                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" class="show_in_main_home" id="check__{{$rowData->id }}" {{ ($rowData->show_in_main_home == 'Y') ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <div class="action-button-wrap">
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('pg_slider_edit', $rowData->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>


                                            <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('pg_slider_delete', $rowData->id ) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-alt"></i></a>



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

        //=== START:: show image in modal =====//
        $('body').on('click', '.blogPostImg', function() {
            var imgSrc = $(this).attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//



        $(".show_in_main_home").click(function() {
            var thisId = $(this).attr('id');
            var fdId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/slider_show_in_main_home/' + fdId,
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

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop