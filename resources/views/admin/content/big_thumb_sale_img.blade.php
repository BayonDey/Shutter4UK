@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Homepage</h3>
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

                <div class="card card-outline card-info p-3">

                    <h3 class="heading mb-3">Blinds4UK Homepage - Big Thumb Sale Image</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-title">Title</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-title">Top Text</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Choose Option</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="colorCode" value="option1"
                                            name="naming" checked>
                                        <label class="form-check-label" for="colorCode">HTML Color Code</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="UploadImage" value="option2"
                                            name="naming">
                                        <label class="form-check-label" for="UploadImage">Upload Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Color Code <span class="text-danger">Default #C9203D</span>
                                </label>
                                <input class="form-control" type="color" value="#C9203D" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Top Image Option</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Enable" value="option1"
                                            name="naming" checked>
                                        <label class="form-check-label" for="Enable">Enable</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Disable" value="option2"
                                            name="naming">
                                        <label class="form-check-label" for="Disable">Disable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title"> Sale Alt Text
                                </label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Bottom Color <span class="text-danger">Default ( #10a2b1
                                        )</span>
                                </label>
                                <input class="form-control" type="color" value="#10a2b1" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Bottom Text Default <span class="text-danger">( +EXTRA
                                        {percentvalue} off )</span>
                                </label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-title">Percent Value</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-title">Bottom Image Option</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Enable2" value="option1"
                                            name="naming" checked="">
                                        <label class="form-check-label" for="Enable2">Enable</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Disable2" value="option2"
                                            name="naming">
                                        <label class="form-check-label" for="Disable2">Disable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="button-action">
                                <button type="button" class="btn btn-default mr-auto">Go back</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection