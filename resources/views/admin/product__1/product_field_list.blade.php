@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3>Product field list</h3>
                        </div>
                        <div class="col-sm-5">
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

                        <div class="row">
                            <!-- <div class="col-md-9"> </div> -->
                            <!-- <div class="col-md-3"> -->
                            @if (App\Model\UserPermission::checkPermission('product_fields', 'add') > 0)
                            <a href="{{ route('create_field') }}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New Field</button>
                            </a>
                            @endif
                            <!-- </div> -->
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Field Name</th>
                                        <th>Image</th>
                                        <!-- <th>Description</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($product_fields) == 0)

                                    @else
                                    @foreach($product_fields as $i => $fields)
                                    <?php
                                    $img = '';
                                    if ($fields->FieldImage != '') {
                                        $imgSrc = (file_exists(public_path() . "/uploads/v2_product_fields/$fields->FieldImage")) ? asset("uploads/v2_product_fields/$fields->FieldImage") : asset('admin/dist/img/noImg.jpg');
                                        $img = "<img src=' $imgSrc' class='field_img' height='45px'>";
                                    }
                                    ?>
                                    <tr id="TR__{{$fields->id}}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $fields->field_name }}</td>
                                        <td>{!! $img !!}</td>
                                        <!-- <td>{{ $fields->FieldDescription }}</td> -->
                                        <td>
                                            @if (App\Model\UserPermission::checkPermission('product_fields', 'edit') > 0)
                                            <a href="{{route('edit_field', $fields->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            @endif

                                            @if (App\Model\UserPermission::checkPermission('product_fields', 'delete') > 0)
                                            <a href="{{route('delete_field', $fields->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete \'{{ $fields->field_name }}\' ?')"><i class="fa fa-trash-alt"></i></a>
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
        //=== START:: show image in modal =====//
        $('body').on('click', '.field_img', function() {
            var imgSrc = $(this).attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//

        var activeTR = '<?= $activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });
</script>
@stop