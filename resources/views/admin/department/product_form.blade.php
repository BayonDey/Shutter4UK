@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$department->id > 0) ? 'Edit Product' : 'Add Product'}}</h3>
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
                        <form action="{{route('product_store')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$dataRow->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Product Details</h3>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Product Name*</span>
                                                    <input type="text" name="product_title" class="form-control" placeholder="Enter name" value="{{@$dataRow->product_title}}" />

                                                    @if($errors->has('product_title'))
                                                    <div class="error">{{ $errors->first('product_title') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <span class="label-title">Choose Category</span>
                                                    <select name="product_cat_id" class="form-control select2 " id="">
                                                        <option value="">Please Select...</option>
                                                        @foreach($depCatList as $row)
                                                        <option value="{{$row->id}}" {{(@$dataRow->product_cat_id == $row->id) ? 'selected' : ''}}>{{$row->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('product_cat_id'))
                                                    <div class="error">{{ $errors->first('product_cat_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <span class="label-title">Select Department</span>
                                                    <select name="department_ids[]" class="form-control" size="5" multiple>
                                                        <!-- <option value="">Please Select...</option> -->
                                                        @foreach($depList as $row)
                                                        <option value="{{$row->id}}" {{(in_array($row->id, $selectedDepIds)) ? 'selected' : '' }}>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Product Short Description</span>
                                                    <textarea name="product_st_desc" class="form-control" rows="4">{{@$dataRow->product_st_desc}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Description</span>
                                                    <textarea name="product_desc" class="form-control ckeditor" rows="10">{{@$dataRow->product_desc}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div class="form-group col-md-4">
                                                    <label class="label-title">Product main image
                                                        <!-- <span class="text-danger">(Width:300px)</span> -->
                                                    </label>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="file-upload-sec">
                                                                <input type="file" name="product_main_img" id="img_name" accept="image/*" hidden="">
                                                                <i class="fas fa-cloud-upload-alt"></i>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img class="img-fluid" id="img_name_pre" src="{{App\Utility::filePathShow(@$dataRow->product_main_img, 'department_product')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(count($imgMap))
                                                @foreach($imgMap as $i => $img)
                                                <div class="col-md-4">
                                                    <div class="form-group  ">
                                                        <label class="label-title">Product image <?= $i + 2 ?>
                                                            <!-- <span class="text-danger">(Width:300px)</span> -->
                                                        </label>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="selectedMapImg[<?= $img->id ?>]" class="selectedImg" id="img_name1<?= $img->id ?>" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-fluid" id="img_name1<?= $img->id ?>_pre" src="{{App\Utility::filePathShow($img->image_name, 'department_product')}}">
                                                            </div>
                                                            <a href="{{route('dep_product_img_del', $img->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">x</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="form-group  ">
                                                        <label class="label-title">Product image
                                                            <!-- <span class="text-danger">(Width:300px)</span> -->
                                                        </label>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="pImg[]" class="mapImg" id="img_name1" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- <img class="img-fluid" id="img_name1_pre" src="{{App\Utility::filePathShow('', 'department_product')}}"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="product_img_copy " style="display: none;">
                                                    <div class="form-group  ">
                                                        <label class="label-title">Product image
                                                            <!-- <span class="text-danger">(Width:300px)</span> -->
                                                        </label>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="pImg[]" id="img_name1" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- <img class="img-fluid" id="img_name1_pre" src="{{App\Utility::filePathShow('', 'department_product')}}"> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_img_content col-md-12 row">

                                                </div>
                                                <div class="col-md-4"> 
                                                    <button type="button" class="btn btn-warning add_more_img_btn">Add More Image</button><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button-action justify-content-end">

                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                                    </div>

                                    <hr>

                                    <h3 class="heading mb-4">Manage Meta Tag</h3>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Meta Title</span>
                                                <input type="text" name="meta_title" class="form-control" value="{{@$dataRow->meta_title}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Meta Description</span>
                                                <textarea name="meta_description" class="form-control" cols="30" rows="5">{{@$dataRow->meta_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="button-action justify-content-end">
                                        <a href="{{ route('product_list')}}">
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

        $(".add_more_img_btn").click(function() {
            $(".product_img_content").append("<div class='col-md-4'>" + $(".product_img_copy").html() + "</div>");
        });

        $(".img_name").change(function() {
            imagePreview(eval('img_name'), eval('img_name_pre'));
        });
        $(".selectedImg, .mapImg").change(function() {
            var thisId = $(this).attr('id');
            console.log(thisId);
            imagePreview(eval(thisId), eval(thisId + '_pre'));
        });

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