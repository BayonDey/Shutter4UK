@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Blog Post</h3>
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
            <div class="spec-details">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="heading mb-3"> </h3>
                    <a href="{{route('blog_post_list')}}" class="btn btn-info">« back to List</a>
                </div>
                <div class="card card-outline card-info p-3">
                    <form action="{{route('blogPost_store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{@$blogpost->template_id}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{@$blogpost->title}}">
                                    @if($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">Meta Robots</label>
                                    <select class="form-control" name="meta_robots">
                                        <option value="">-- select --</option>
                                        <option value="IndexFollow" {{ (@$blogpost->meta_robots == 'IndexFollow') ? 'selected' : '' }}>Index, Follow</option>
                                        <option value="NoIndexNoFollow" {{ (@$blogpost->meta_robots == 'NoIndexNoFollow') ? 'selected' : '' }}>NoIndex, NoFollow</option>
                                        <option value="NoIndexFollow" {{ (@$blogpost->meta_robots == 'NoIndexFollow') ? 'selected' : '' }}>NoIndex, Follow</option>
                                    </select>
                                    @if($errors->has('meta_robots'))
                                    <div class="error">{{ $errors->first('meta_robots') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label-title">URL</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">https://www.blinds4uk.co.uk/blog</span>
                                        </div>
                                        <input type="text" class="form-control" id="basic-url" name="url" aria-describedby="basic-addon3" value="{{@$blogpost->url}}">
                                        @if($errors->has('url'))
                                        <div class="error">{{ $errors->first('url') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">Promote to front</label>
                                    <select class="form-control" name="promote_to_front">
                                        <option value="t" {{ (@$blogpost->promote_to_front == 't') ? 'selected' : '' }}> Yes</option>
                                        <option value="f" {{ (@$blogpost->promote_to_front == 'f') ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label class="label-title">Categories</label>
                                    <div class="form-group form-control">
                                        @foreach(@$blogCats as $catrow)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="{{$catrow->cat_name}}" name="catId[{{$catrow->template_id}}]" value="{{$catrow->template_id}}" {{ (in_array($catrow->template_id, @$blogCatIds)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{$catrow->cat_name}}">{{$catrow->cat_name}}</label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label-title">By</label>
                                    <input class="form-control" type="text" name="bytext" value="{{@$blogpost->bytext}}">
                                    @if($errors->has('bytext'))
                                    <div class="error">{{ $errors->first('bytext') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-info mt-4">Save</button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-title">Description <span class="text-danger">
                                            (Main Blog Page Intro Description)</span></label>
                                    <textarea class="form-control ckeditor" name="description">{{ @$blogpost->description }}</textarea>
                                    @if($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-title">Upload Image <span class="text-danger">
                                            (Width:300px)</span></label>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="file-upload-sec">
                                                <input type="file" name="img_name" id="img_name" accept="image/*" hidden="">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <!-- <img class="img-fluid" src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg"> -->
                                            <img class="img-fluid" id="img_name_pre" src="{{App\Utility::filePathShow(@$blogpost->img_name, 'blog_page_templates')}}">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="card card-body">
                                    <div class="append_pg_template">
                                        <div class="form-group">
                                            <label class="label-title">Title</label>
                                            <input class="form-control" type="text" name="template_title[]">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Description <span class="text-danger">
                                                    (Unique Blog Page Description)</span></label>
                                            <textarea class="form-control ckeditor" name="template_description[]"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Upload Image <span class="text-danger">
                                                    (Max-Width:820px)</span></label>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="template_image[]" class="tempImg" id="pimage" accept="image/*" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <img class="img-fluid tempImg_pre" id="pimage_pre" src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Footer Desc <span class="text-danger">
                                                    (appear below image)</span></label>
                                            <textarea class="form-control ckeditor" name="temp_footer_desc[]"></textarea>
                                        </div>


                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success add_pg_template_btn">Add another</button>
                                    </div>


                                    @if(count($blogTemps) > 0)
                                    @foreach($blogTemps as $tempRow)
                                    <div class=" ">
                                        <div class="form-group">
                                            <label class="label-title">Title</label>
                                            <input class="form-control" type="text" name="e_template_title[{{$tempRow->id}}]" value="{{$tempRow->template_title}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Description <span class="text-danger">
                                                    (Unique Blog Page Description)</span></label>
                                            <textarea class="form-control ckeditor" name="e_template_description[{{$tempRow->id}}]">{{$tempRow->template_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Upload Image <span class="text-danger">
                                                    (Max-Width:820px)</span></label>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="e_template_image[{{$tempRow->id}}]" id="tempImg_{{$tempRow->id}}" class="tempImg" accept="image/*" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-2">
                                                    <img class="img-fluid tempImg_pre" id="tempImgPre_{{$tempRow->id}}" src="{{App\Utility::filePathShow(@$tempRow->template_image, 'pg_templates')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-title">Footer Desc <span class="text-danger">
                                                    (appear below image)</span></label>
                                            <textarea class="form-control ckeditor" name="e_temp_footer_desc[{{$tempRow->id}}]">{{$tempRow->temp_footer_desc}}</textarea>
                                        </div>
                                    </div>
                                    @endforeach

                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="button-action">
                                    <a href="{{route('blog_post_list')}}" type="button" class="btn btn-default mr-auto">Back to List</a>
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

@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {

        $(".add_pg_template_btn").click(function(e) {
            e.preventDefault();
            $('.append_pg_template').append($(".append_pg_template").html());
        });

        $(".tempImg").change(function() {
            var tempImg_id = $(this).attr('id');
            var tempImg_pre = $(this).closest('.row').find('.tempImg_pre').attr('id');
            console.log(tempImg_id + "+++" + tempImg_pre);

            imagePreview(eval(tempImg_id), eval(tempImg_pre));
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