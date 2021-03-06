@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3> {{(@$department->id > 0) ? 'Edit Department' : 'Add Department'}}</h3>
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
                        <form action="{{route('department_store')}}" method="POST" id="supplier_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$department->id}}">
                            <div class="individual-box card card-outline card-info">
                                <div class="card-body">
                                    <h3 class="heading mb-4">Department Details</h3>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">Department Name*</span>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter department name" value="{{@$department->name}}" />

                                                    @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title">URL*</span>
                                                    <input type="text" class="form-control" placeholder="Enter department url" value="<?= @$department->url ?>" name="url" />

                                                    @if($errors->has('url'))
                                                    <div class="error">{{ $errors->first('url') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <span class="label-title">Choose Template</span>
                                                        <select name="assign_temp" class="form-control  " id="">
                                                            <option value="">Please Select...</option>
                                                            <option value="MPT" {{(@$department->assign_temp == 'MPT') ? 'selected' : ''}}>Manual Product template</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="label-title">Logo Caption Colour Code</span>
                                                            <input type="color" class="form-control" name="colour_code" value="{{@$department->colour_code}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="label-title">Logo Caption</span>
                                                            <div class="mt-2 mb-2 form-control">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="logo_caption" id="logo_caption" {{(@$department->logo_caption == 'T') ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="logo_caption">Show Logo Caption </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group col-md-12">
                                                        <label class="label-title">Department Logo
                                                            <!-- <span class="text-danger">(Width:300px)</span> -->
                                                        </label>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="logo_image" id="img_name" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-fluid" id="img_name_pre" src="{{App\Utility::filePathShow(@$department->logo_image, 'departments')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">PostCode Name</span>
                                                        <select name="postcode_name" class="form-control select2" id="postcode_name">
                                                            <option value="">Please Select...</option>
                                                            @foreach($postcodes as $postcode)
                                                            <option value="{{$postcode->postcode}}" {{(@$department->postcode_name == $postcode->postcode) ? 'selected' : ''}}>{{$postcode->postcode}}</option>
                                                            @endforeach

                                                            @if($errors->has('postcode_name'))
                                                            <div class="error">{{ $errors->first('postcode_name') }}</div>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="label-title"> Category</span>
                                                    <select name="cat_map[]" id="" class="form-control" multiple size="10">
                                                        @if(count($depCatList) > 0)
                                                        @foreach($depCatList as $cat)
                                                        <option value="{{$cat->id}}" {{ in_array($cat->id, $selectedCatIds) ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption</span>
                                                    <input type="text" name="header_caption" class="form-control" value="{{@$department->header_caption}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption color</span>
                                                    <input type="color" name="header_caption_color" class="form-control" value="{{@$department->header_caption_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Contact no</span>
                                                    <input type="text" name="contact_no" class="form-control" value="{{@$department->contact_no}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Contact no color</span>
                                                    <input type="color" name="contact_no_color" class="form-control" value="{{@$department->contact_no_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption 2</span>
                                                    <input type="text" name="header_caption_2" class="form-control" value="{{@$department->header_caption_2}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption 2 color</span>
                                                    <input type="color" name="header_caption_2_color" class="form-control" value="{{@$department->header_caption_2_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption 3</span>
                                                    <input type="text" name="header_caption_3" class="form-control" value="{{@$department->header_caption_3}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Header caption 3 color</span>
                                                    <input type="color" name="header_caption_3_color" class="form-control" value="{{@$department->header_caption_3_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title"> Header 3 Description</span>
                                                    <textarea name="header_3_desc" class="form-control" rows="4">{{@$department->header_3_desc}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Contact email</span>
                                                    <input type="text" name="contact_email" class="form-control" value="{{@$department->contact_email}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Contact email color</span>
                                                    <input type="color" name="contact_email_color" class="form-control" value="{{@$department->contact_email_color}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Opening time</span>
                                                    <input type="text" name="opening_time" class="form-control" value="{{@$department->opening_time}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Opening time color</span>
                                                    <input type="color" name="opening_time_color" class="form-control" value="{{@$department->opening_time_color}}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <span class="label-title"> Marquee Text</span>
                                                    <input type="text" name="marquee_text" class="form-control" value="{{@$department->marquee_text}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Marquee Speed</span>
                                                    <input type="number" name="marquee_text_speed" class="form-control" value="{{@$department->marquee_text_speed}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="label-title"> Marquee Color</span>
                                                    <input type="color" name="marquee_text_color" class="form-control" value="{{@$department->marquee_text_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Header Background</span>
                                                    <input type="color" name="header_bg_color" class="form-control" value="{{@$department->header_bg_color}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Menu Background</span>
                                                    <input type="color" name="menu_bg_color" class="form-control" value="{{@$department->menu_bg_color}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span class="label-title"> Footer Background</span>
                                                    <input type="color" name="footer_bg_color" class="form-control" value="{{@$department->footer_bg_color}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <span class="label-title">Description </span>
                                                    <textarea name="description" id="description" class="form-control ckeditor" cols="30" rows="5">{{@$department->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h3 class="heading mb-4">Manage Why Shop</h3>
                                    <?php
                                    if (count($dept_why_shop_img_ext) == 0) {
                                    ?>

                                        <div class="row">
                                            <h4 class="heading mb-4">First Image</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Caption</span>
                                                        <input type="text" name="dept_why_shop_img[0][caption]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Link</span>
                                                        <input type="text" name="dept_why_shop_img[0][link]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-title">Image </label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="dept_whyShopImg[0]" id="img_name0" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-fluid" id="img_name0_pre" src="{{App\Utility::filePathShow(@$department->logo_image, 'departments')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Alt Tag</span>
                                                        <input type="text" name="dept_why_shop_img[0][alt_tag]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span class="label-title">Description</span>
                                                        <textarea name="dept_why_shop_img[0][description]" id="" class="form-control" cols="30" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4 class="heading mb-4">Second Image</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Caption</span>
                                                        <input type="text" name="dept_why_shop_img[1][caption]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Link</span>
                                                        <input type="text" name="dept_why_shop_img[1][link]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-title">Image </label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="dept_whyShopImg[1]" id="img_name1" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-fluid" id="img_name1_pre" src="{{App\Utility::filePathShow(@$department->logo_image, 'departments')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Alt Tag</span>
                                                        <input type="text" name="dept_why_shop_img[1][alt_tag]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span class="label-title">Description</span>
                                                        <textarea name="dept_why_shop_img[1][description]" id="" class="form-control" cols="30" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4 class="heading mb-4">Third Image</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Caption</span>
                                                        <input type="text" name="dept_why_shop_img[2][caption]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Link</span>
                                                        <input type="text" name="dept_why_shop_img[2][link]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-title">Image </label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="file-upload-sec">
                                                                    <input type="file" name="dept_whyShopImg[2]" id="img_name2" accept="image/*" hidden="">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="img-fluid" id="img_name2_pre" src="{{App\Utility::filePathShow(@$department->logo_image, 'departments')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <span class="label-title">Alt Tag</span>
                                                        <input type="text" name="dept_why_shop_img[2][alt_tag]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span class="label-title">Description</span>
                                                        <textarea name="dept_why_shop_img[2][description]" id="" class="form-control" cols="30" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        foreach ($dept_why_shop_img_ext as $i => $row) {
                                        ?>

                                            <div class="row">
                                                <h4 class="heading mb-4">Manage Image {{$i+1}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="label-title">Caption</span>
                                                            <input type="text" name="dept_why_shop_img[{{$row->id}}][caption]" class="form-control" value="{{@$row->caption}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="label-title">Link</span>
                                                            <input type="text" name="dept_why_shop_img[{{$row->id}}][link]" class="form-control" value="{{@$row->link}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label-title">Image </label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="file-upload-sec">
                                                                        <input type="file" name="dept_whyShopImg[{{$row->id}}]" id="img_name{{$i}}" accept="image/*" hidden="">
                                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <img class="img-fluid" id="img_name{{$i}}_pre" src="{{App\Utility::filePathShow(@$row->image, 'departments_why_shop_img')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="label-title">Alt Tag</span>
                                                            <input type="text" name="dept_why_shop_img[{{$row->id}}][alt_tag]" class="form-control" value="{{@$row->alt_tag}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <span class="label-title">Description</span>
                                                            <textarea name="dept_why_shop_img[{{$row->id}}][description]" id="" class="form-control" cols="30" rows="2">{{@$row->description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <hr>

                                    <h3 class="heading mb-4">Manage Why Shop Text</h3>

                                    <div class="row">
                                        <?php
                                        if (count($dept_why_shop_text_ext) == 0) {
                                        ?>
                                            <div class="col-md-6 row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Text-1</span>
                                                        <input type="text" name="dept_why_shop_text[0][shop_text]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Tic Color</span>
                                                        <input type="color" name="dept_why_shop_text[0][icon_color]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Text-2</span>
                                                        <input type="text" name="dept_why_shop_text[1][shop_text]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Tic Color</span>
                                                        <input type="color" name="dept_why_shop_text[1][icon_color]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Text-3</span>
                                                        <input type="text" name="dept_why_shop_text[2][shop_text]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Tic Color</span>
                                                        <input type="color" name="dept_why_shop_text[2][icon_color]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Text-4</span>
                                                        <input type="text" name="dept_why_shop_text[3][shop_text]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Tic Color</span>
                                                        <input type="color" name="dept_why_shop_text[3][icon_color]" class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        } else {
                                            foreach ($dept_why_shop_text_ext as $i => $row) {
                                            ?>
                                                <div class="col-md-6 row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <span class="label-title">Text-{{$i+1}}</span>
                                                            <input type="text" name="dept_why_shop_text[{{$row->id}}][shop_text]" class="form-control" value="{{$row->shop_text}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <span class="label-title">Tic Color</span>
                                                            <input type="color" name="dept_why_shop_text[{{$row->id}}][icon_color]" class="form-control" value="{{$row->icon_color}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <hr>
                                    <h3 class="heading mb-4">Manage Meta Tag</h3>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Meta Title</span>
                                                <input type="text" name="meta_title" class="form-control" value="{{@$department->meta_title}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span class="label-title">Meta Description</span>
                                                <textarea name="meta_description" id="" class="form-control" cols="30" rows="5">{{@$department->meta_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="button-action justify-content-end">
                                        <a href="{{route('department_list' )}}">
                                            <button type="button" class="btn btn-default mr-2">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-info  ">Save</button>
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
        imagePreview(img_name0, img_name0_pre);
        imagePreview(img_name1, img_name1_pre);
        imagePreview(img_name2, img_name2_pre);

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