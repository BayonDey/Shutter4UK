@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-9">
                            <h3>Manage Sliders</h3>
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
                            <a href="{{ route('slider_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Add Slider
                                </button>
                            </a>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Slider Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($dataList))

                                @foreach($dataList as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>

                                    <td>{{ $rowData->getDepartment->name }}</td>
                                    <td><img src="{{App\Utility::filePathShow(@$rowData->image, 'dep_slider_images')}}" class="sliderimage" alt="" width="60px"></td>


                                    <td>
                                        <div class="action-button-wrap">
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('slider_edit', $rowData->id ) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('slider_delete', $rowData->id ) }}" class="btn btn-outline-danger" onclick="alert('Are you sure you want to delete?')"><i class="fa fa-trash-alt"></i></a>
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
</div>



@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";
        //=== START:: show image in modal =====//
        $('body').on('click', '.sliderimage', function() {
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