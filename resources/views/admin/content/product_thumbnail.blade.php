@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Product Thumbnail</h3>
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
                        <div class="card-body table-responsive p-2">
                            <a href="{{route('manage_home_page')}}">
                                <button class="btn btn-primary">
                                    << Go Back </button>
                            </a>
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Thumb </th>
                                        <th>Title </th>
                                        <th>URL Link </th>
                                        <th>Big Img </th>
                                        <th>Scroll Img </th>
                                        <th>No Display </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($productTypeList) > 0)
                                    @foreach($productTypeList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td class='productImg'>
                                            <img src="{{ App\Utility::filePathShow($rowData->thumb_image, 'v2_product_homepage') }}" width="40px">
                                        </td>
                                        <td>{{ $rowData->pname }}</td>
                                        <td>{{ $rowData->url }}</td>
                                        <td><input type="radio" class="mng_homepagethumb" id="thumb__{{$rowData->id}}" value="BI" name="mng_homepagethumb[{{$rowData->id}}]" {{ ($rowData->mng_homepagethumb == 'BI') ? 'checked' : '' }}></td>
                                        <td><input type="radio" class="mng_homepagethumb" id="thumb__{{$rowData->id}}" value="SI" name="mng_homepagethumb[{{$rowData->id}}]" {{ ($rowData->mng_homepagethumb == 'SI') ? 'checked' : '' }}></td>
                                        <td><input type="radio" class="mng_homepagethumb" id="thumb__{{$rowData->id}}" value="ND" name="mng_homepagethumb[{{$rowData->id}}]" {{ ($rowData->mng_homepagethumb == 'ND') ? 'checked' : '' }}></td>

                                        <td>
                                            <div class="action-button-wrap">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('productThumbnail_edit', $rowData->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>


                                                <div class="btn-group">
                                                    <button type="button" class="btn dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-sort-amount-up-alt"></i>
                                                    </button>


                                                    <div class="dropdown-menu" role="menu">
                                                        @if ($i > 0)
                                                        <a class="dropdown-item" href="{{route('homepage_image_ordering', ['id' => $rowData->id, 'flag'=>'top'])}}">
                                                            Move to top
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('homepage_image_ordering', ['id' => $rowData->id, 'flag'=>'up'])}}">
                                                            Move up
                                                        </a>
                                                        @endif

                                                        @if ($i != (count($productTypeList) - 1))

                                                        <a class="dropdown-item" href="{{route('homepage_image_ordering', ['id' => $rowData->id, 'flag'=>'down'])}}">
                                                            Move down
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('homepage_image_ordering', ['id' => $rowData->id, 'flag'=>'bottom'])}}">
                                                            Move to bottom
                                                        </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <br>

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

        $(".mng_homepagethumb").click(function() {
            var val = $(this).val();
            var id = $(this).attr('id').split('__')[1];
            console.log(id);

            $.ajax({
                type: 'GET',
                url: base_url + '/update_homepage_image/' + id + "/" + val,
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
        $('body').on('click', '.productImg', function() {
            var imgSrc = $(this).find('img').attr('src');
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