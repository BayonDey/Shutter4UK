@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$dataRow->id > 0) ? 'Edit' : 'Add'}} Slider Image</h3>
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
                        <form action="{{route('slider_store')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Slider Details</h3>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <span class="label-title">Select Department</span>
                                                <select name="department_id" class="form-control select2" required>
                                                    <option value="">Please Select...</option>
                                                    @foreach($depList as $row)
                                                    <option value="{{$row->id}}" {{($row->id == @$dataRow->department_id) ? 'selected' : ''}}>{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group col-md-12">
                                                <label class="label-title">Slider image
                                                    <!-- <span class="text-danger">(Width:300px)</span> -->
                                                </label>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="file-upload-sec">
                                                            <input type="file" name="image" id="img_name" accept="image/*" hidden="">
                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img class="img-fluid" id="img_name_pre" src="{{App\Utility::filePathShow(@$dataRow->image, 'dep_slider_images')}}">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="button-action justify-content-end">
                                        <a href="{{ route('slider_list')}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info">Save</button>
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



@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {

        imagePreview(img_name, img_name_pre);

        function imagePreview(imgId, imgPreviewId) {
            imgId.onchange = evt => {
                const [file] = imgId.files
                if (file) {
                    imgPreviewId.src = URL.createObjectURL(file)
                }
            }
        }
    });
</script>
@stop