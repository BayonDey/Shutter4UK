@extends('admin.layouts.app')
@section('content')
<?php

use App\Model\MapSubGroupOption;
use App\Model\Option;

$li_groupDataFl = 0;
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3> Manage Homepage Slide</h3>
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

            {{--main details--}}
            <div class="spec-details">
                <div class="individual-box card card-outline card-warning">
                    <div class="card-body">
                        <a href="{{route('manage_home_page')}}" class="btn btn-info mb-3">
                            <i class="fas fa-angle-double-left"></i> Go Back </a>

                        <form action="{{route('productThumbnail_save')}}" method="POST" id="band_form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Title</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Choose Option</span>
                                        <div class="form-control">
                                            <label class="font-weight-normal">
                                                <input type="checkbox">
                                                Text
                                                Banner</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class=" mb-3 w-100">Manage mid banner text</div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Text</span>
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Description</span>
                                        <textarea rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Background Colour</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Default HTML Button Colour:</span>
                                        <input type="text" class="form-control" value="#000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Choose Type</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="checkbox" class="mr-2">Homepage mid image
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="checkbox" class="mr-2">Homepage mid image &
                                                    Text
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-success mb-2" type="button">Add more</button>
                                    <div class="table-responsive aditional-data">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Big Text</th>
                                                    <th scope="col">Small Text Content</th>
                                                    <th scope="col">Url</th>
                                                    <th scope="col">Image <span
                                                            class="text-danger font-weight-normal">(570x367)</span>
                                                    </th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Big Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Text</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Background Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-1">
                                                            <img src="https://image.shutterstock.com/image-photo/surreal-image-african-elephant-wearing-260nw-1365289022.jpg"
                                                                class=" url-image" />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Image Position</span>
                                                            <select class="form-control">
                                                                <option>Left</option>
                                                                <option>Right</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label class="file-upload-sec mb-3">
                                                            <input type="file" hidden>
                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                        </label>
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Big Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Text</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Background Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-1">
                                                            <img src="https://image.shutterstock.com/image-photo/surreal-image-african-elephant-wearing-260nw-1365289022.jpg"
                                                                class=" url-image" />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Image Position</span>
                                                            <select class="form-control">
                                                                <option>Left</option>
                                                                <option>Right</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label class="file-upload-sec mb-3">
                                                            <input type="file" hidden>
                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                        </label>
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Big Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Text</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Html Button Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Background Colour</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-1">
                                                            <img src="https://image.shutterstock.com/image-photo/surreal-image-african-elephant-wearing-260nw-1365289022.jpg"
                                                                class=" url-image" />
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <span class="label-title">Image Position</span>
                                                            <select class="form-control">
                                                                <option>Left</option>
                                                                <option>Right</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label class="file-upload-sec mb-3">
                                                            <input type="file" hidden>
                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                        </label>
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Choose</span>
                                        <select class="form-control">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class=" mb-3 w-100">Manage mid banner text</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Header Caption</span>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Footer Scroll Images</span>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Mid Caption</span>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Accordion Caption</span>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="button-action">
                                        <button type="button" class="btn btn-default mr-auto">Go back</button>
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
</div>

</div>


@endsection


@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop