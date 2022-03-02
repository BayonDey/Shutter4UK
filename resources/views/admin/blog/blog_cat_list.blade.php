@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Blog Categories</h3>
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
                            @if (App\Model\UserPermission::checkPermission('blog_categories', 'add') > 0)
                            <a href="{{ route('blog_cat_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Create Blog Category
                                </button>
                            </a>
                            @endif
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($blogCats))

                                @foreach($blogCats as $i => $rowData)
                                <tr id="TR__{{$rowData->template_id }}">
                                    <td>{{ $i + 1 }}</td>

                                    <td>
                                        <img src="{{ App\Utility::filePathShow($rowData->img_name, 'blog_category_tbl') }}" class="blogPostImg" alt="" width="40px">
                                    </td>

                                    <td>
                                        <a href="<?php echo env('APP_URL') . "blog/category" . $rowData->url; ?>" target="_blank">
                                            {{ $rowData->cat_name }}
                                        </a>
                                    </td>
                                    <td>{{ $rowData->title }}</td>

                                    <td>
                                        <div class="action-button-wrap">
                                            @if (App\Model\UserPermission::checkPermission('blog_categories', 'edit') > 0)
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('blog_cat_edit', $rowData->template_id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                            @endif
                                            &nbsp;
                                            &nbsp;
                                            @if (App\Model\UserPermission::checkPermission('blog_categories', 'delete') > 0)
                                            <label class="switch">
                                                <input type="checkbox" class=" suitch_on_off" id="switch__{{$rowData->template_id }}" {{ ($rowData->stats_deleted == 0) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
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

        $(".suitch_on_off").click(function() {
            var thisId = $(this).attr('id');
            var template_id = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/blog_cat_delete/' + template_id,
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