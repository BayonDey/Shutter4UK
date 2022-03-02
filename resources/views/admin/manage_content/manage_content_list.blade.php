@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Content</h3>
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

                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Content type</th>
                                    <th>Content key</th>
                                    <th>Content title</th>
                                    <th>Content sub title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($manageContent))

                                @foreach($manageContent as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <!-- <td>{{ $i + 1 }}</td> -->

                                    <td>{{ $rowData->content_type }}</td>
                                    <td>{{ $rowData->content_key }}</td>
                                    <td>
                                        @if(($rowData->content_url == '#')|| ($rowData->content_url == ''))
                                        {{ $rowData->content_title }}
                                        @else
                                        <a href="{{ $rowData->content_url }}" target="_blank">
                                            {{ $rowData->content_title }}
                                        </a>
                                        @endif
                                    </td>
                                    
                                    <td title="{{$rowData->content_sub_title}}">{{ (strlen($rowData->content_sub_title) > 20) ? (substr($rowData->content_sub_title,0,20)."...") : $rowData->content_sub_title }}</td>

                                    <td>
                                        @if($rowData->content_img == '')
                                        --
                                        @else
                                        <img src="{{ App\Utility::filePathShow($rowData->content_img, 'manage_content') }}" class="blogPostImg" alt="" title="{{ $rowData->content_img_alt }}" data-toggle="tooltip" data-placement="top" width="50px">
                                        @endif
                                    </td>

                                    <td>
                                        <div class="action-button-wrap">
                                            @if (App\Model\UserPermission::checkPermission('manage_content_text', 'edit') > 0)
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('manage_content_settings_edit', $rowData->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
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