@extends('admin.layouts.app')
@section('content')

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

                        <form>
                            <h2 class="heading">Banner Display Settings</h2>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Promote to Front
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Show Home Slider on all product pages
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                <label class="form-check-label" for="defaultCheck3">
                                    Combine "Text Slider" + "Only Slider" On Home Page
                                </label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">Start Date</span>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="label-title">End Date</span>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Choose Type</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="radio" class="mr-2" name="Type">Only Sider
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="radio" class="mr-2" name="Type">Our own designs & text
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="radio" class="mr-2" name="Type">Text Banner
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="radio" class="mr-2" name="Type">Buy More Save More
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control font-weight-normal">
                                                    <input type="radio" class="mr-2" name="Type">No Banner to be
                                                    displayed
                                                </label>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-title">Upload Full Slider Image </label>
                                        <label class="label-title"> Default HTML Button Colour:</label>
                                        <input type="color" class="form-control" value="#000000">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success mb-2" type="button">Add another</button>
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
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span
                                                                        class="label-title custom-line-height">Background
                                                                        Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Promote
                                                                        to front</span>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span
                                                                        class="label-title custom-line-height">Background
                                                                        Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Promote
                                                                        to front</span>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Small Text">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">HTML
                                                                        Text Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Text</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Html
                                                                        Button Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Url..." />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span
                                                                        class="label-title custom-line-height">Background
                                                                        Colour</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <span class="label-title custom-line-height">Promote
                                                                        to front</span>
                                                                    <select class="form-control">
                                                                        <option>Yes</option>
                                                                        <option>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                        <span class="label-title">Font Family</span>
                                        <select class="form-control">
                                            <option>Arial</option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                            <option>Lorem, ipsum. </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Font Size</span>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Font Styles</span>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="FontStyles"
                                                    id="Standard2" value="option1">
                                                <label class="form-check-label" for="Standard2">Standard</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="FontStyles"
                                                    id="Italic" value="option2">
                                                <label class="form-check-label" for="Italic">Italic</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span class="label-title">Font Weight</span>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="FontWeight"
                                                    id="Standard" value="option1">
                                                <label class="form-check-label" for="Standard">Standard</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="FontWeight" id="Bold"
                                                    value="option2">
                                                <label class="form-check-label" for="Bold">Bold</label>
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