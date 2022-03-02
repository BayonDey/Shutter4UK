@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Product Filters</h3>
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
                        <div class="card card-outline spec-details  p-2">

                            <div class="card-body  ">
                                <h3 class="heading mb-4">Filters Details</h3>
                                <form action="{{route('product_filter_save')}}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row col-md-12">
                                        <input type="hidden" name="id" value="{{@$dataRow->id}}">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <span class="label-title">Filter Type*</span>

                                                <select name="type_id" class='form-control select2 ' id="">
                                                    <option value="1" {{ (@$dataRow->type_id == 1) ? 'selected' : ''
                                                        }}>Colours </option>
                                                    <option value="2" {{ (@$dataRow->type_id == 2) ? 'selected' : ''
                                                        }}>Features </option>
                                                    <option value="3" {{ (@$dataRow->type_id == 3) ? 'selected' : ''
                                                        }}>Buy </option>
                                                </select>
                                                @if($errors->has('type_id'))
                                                <div class="error">{{ $errors->first('type_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <span class="label-title">Filter Name*</span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{@$dataRow->name}}" />

                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group col-md-12 row">
                                                <div class="form-group col-md-6">
                                                    <span class="label-title">Upload Image </span>

                                                    <label class="file-upload-sec">
                                                        <input type="file" name="image" id="image" accept="image/*"
                                                            hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="uploaded-image" style="height: 98px;">
                                                        <img class="upload-img"
                                                            src="{{ App\Utility::filePathShow(@$dataRow->image, 'v3_product_filters') }}"
                                                            id="image_pre" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-1">

                                            <!-- <div class="button-action justify-content-end"> -->
                                            <button type="submit" class="btn btn-info  ">{{ (@$dataRow->id > 0) ?
                                                'Update' : 'Save' }}</button>
                                            <br>
                                            <br>
                                            <a href="{{route('product_filters' , ['TR' => @$dataRow->id])}}">
                                                <button type="button" class="btn btn-default  ">Cancel</button>
                                            </a>
                                            <!-- </div> -->
                                        </div>

                                    </div>

                                </form>


                            </div>
                        </div>


                        <div class="card card-outline   spec-details">

                            <div class="card-body">
                                <h3 class="heading mb-4">Product Filters</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="color-group"><span class="label-title">Colours</span>
                                                @if(count($pFilterColor) > 0)
                                                @foreach($pFilterColor as $color)
                                                <div class="form-check" id='TR__{{$color->id}}'>
                                                    <img src="{{ App\Utility::filePathShow(@$color->image, 'v3_product_filters') }}"
                                                        class="image-plate" />
                                                    <label class="form-check-label"
                                                        for="exampleCheck_{{$color->id}}">{{$color->name}}</label>
                                                    <div class="action-icon">
                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'edit') > 0)
                                                        <a
                                                            href="{{ route('product_filters' , ['id' => @$color->id]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endif

                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'delete') > 0)
                                                        <a href="{{ route('product_filters_delete' , ['id' => @$color->id]) }}"
                                                            onclick="return confirm('Are you sure you want to delete this filter ?')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        @endif
                                                    </div>


                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="color-group"><span class="label-title">Features</span>
                                                @if(count($pFilterFeatures) > 0)

                                                @foreach($pFilterFeatures as $row)
                                                <div class="form-check" id='TR__{{$row->id}}'>
                                                    <img src="{{ App\Utility::filePathShow(@$row->image, 'v3_product_filters') }}"
                                                        class="image-plate" />
                                                    <label class="form-check-label"
                                                        for="exampleCheck_{{$row->id}}">{{$row->name}}</label>
                                                    <div class="action-icon">
                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'edit') > 0)
                                                        <a href="{{ route('product_filters' , ['id' => @$row->id]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endif

                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'delete') > 0)
                                                        <a href="{{ route('product_filters_delete' , ['id' => @$row->id]) }}"
                                                            onclick="return confirm('Are you sure you want to delete this filter ?')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        @endif
                                                    </div>

                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="color-group"><span class="label-title">Buy</span>
                                                @if(count($pFilterBuy) > 0)

                                                @foreach($pFilterBuy as $row)
                                                <div class="form-check" id='TR__{{$row->id}}'>
                                                    <img src="{{ App\Utility::filePathShow(@$row->image, 'v3_product_filters') }}"
                                                        class="image-plate" />
                                                    <label class="form-check-label"
                                                        for="exampleCheck_{{$row->id}}">{{$row->name}}</label>
                                                    <div class="action-icon">
                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'edit') > 0)
                                                        <a href="{{ route('product_filters' , ['id' => @$row->id]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endif

                                                        @if (App\Model\UserPermission::checkPermission('create_filters',
                                                        'delete') > 0)
                                                        <a href="{{ route('product_filters_delete' , ['id' => @$row->id]) }}"
                                                            onclick="return confirm('Are you sure you want to delete this filter ?')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        @endif
                                                    </div>

                                                </div>
                                                @endforeach
                                                @else
                                                <p>No product filters have been created yet</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
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
    $(document).ready(function() {
        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');

        imagePreview(image, image_pre);

        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop