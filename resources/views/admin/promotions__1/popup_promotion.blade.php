@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Manage Promotion code for pop up</h3>
                        </div>

                    </div>
                </div>
                <div class="col-sm-3">
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

                <div class="card card-outline card-primary">
                    <div class="card-body">

                        <a class="d-block mb-2" data-toggle="collapse" href="#Openclose" role="button"
                            aria-expanded="false" aria-controls="Openclose">
                            Open & close page description
                        </a>

                        <div class="collapse" id="Openclose">
                            <div class="card card-body">
                                <form class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Header Name</span>

                                            <input type="text" class="form-control" name="name" value=""
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <span class="label-title">Description</span>
                                            <textarea type="text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info w-100 mt-4">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <hr>
                        <div class="card card-body result-part">



                            <form>

                                <div class="card-title mb-3 w-100">Step 1: Filter Criteria</div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Title</span>
                                            <input type="text" class="form-control" value="Promotion for Pop up">
                                        </div>
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Promotion Code Popup Template </p>
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">
                                                Pop Up background color
                                                <span class=" text-danger">(Only for Mobile Device)</span>
                                            </span>
                                            <input class="form-control" value="#000000">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">
                                                Pop Up background color
                                            </span>
                                            <input class="form-control" value="#000000">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <span class="label-title">Choose Popup Option</span>

                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio"
                                                        name="exampleRadios">Background Image
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">HTML
                                                    Color
                                                    Code
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Background Image First<span
                                                    class="d-block text-danger">(Width:615px,
                                                    Height:350px)</span></span>

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="file-upload-sec ">
                                                        <input type="file" name="csv" class="input" hidden>
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg"
                                                        alt="#" class="img-fluid">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="radgroup ">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="inp-radio"
                                                                name="exampleRadios">Remove Image
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" class="inp-radio" name="exampleRadios">
                                                            Choose Banner
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Background Image Second<span
                                                    class="d-block text-danger">(Width:615px,
                                                    Height:350px)</span></span>

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="csv" class="input" hidden>
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg"
                                                        alt="#" class="img-fluid">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="radgroup ">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="inp-radio"
                                                                name="exampleRadios">Remove Image
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" class="inp-radio" name="exampleRadios">
                                                            Choose Banner
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Background Image Third<span
                                                    class="d-block text-danger">(Width:615px,
                                                    Height:350px)</span></span>

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="file-upload-sec">
                                                        <input type="file" name="csv" class="input" hidden>
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg"
                                                        alt="#" class="img-fluid">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="radgroup ">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="inp-radio"
                                                                name="exampleRadios">Remove Image
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" class="inp-radio" name="exampleRadios">
                                                            Choose Banner
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Header message</span>
                                            <div class="input-group">
                                                <textarea class="form-control"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Header Text Color</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Message below heading</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Message Background Color</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <span class="label-title text-danger">Line Settings for desktop and tab
                                            devices</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Line Color</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Line Settings</span>
                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Disable
                                                    Box Border
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Disable
                                                    All
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Enable
                                                    All
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="label-title text-danger"> Line Settings for mobile devices
                                            only</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Line Color</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Line Settings</span>
                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Disable
                                                    Box Border
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Disable
                                                    All
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleRadios">Enable
                                                    All
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="card card-body">
                                            <h3 class="heading bg-light p-2 mb-3">Middle Values</h3>


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Middle Background Color</span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Border Text value</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Receive an additional">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Text colour</span>
                                                        <input type="text" class="form-control" value="#ffffff">
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Background Color</span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Offer value</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Receive an additional">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Text colour</span>
                                                        <input type="text" class="form-control" value="#ffffff">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Caption Text</span>
                                                        <input type="text" class="form-control"
                                                            value="the sale price today (deducted at checkout)">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Text colour</span>
                                                        <input type="text" class="form-control" value="#fff">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <span class="label-title">Promotion Code</span>
                                                        <input type="text" class="form-control"
                                                            value="the sale price today (deducted at checkout)">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Text colour</span>
                                                        <input type="text" class="form-control" value="#fff">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Background Color</span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <span class="label-title">Bottom Text</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="HURRY! Offer Ends Midnight.">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <span class="label-title">Text colour</span>
                                                        <input type="text" class="form-control" value="#ffffff">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Bottom Text</span>
                                            <textarea class="form-control"></textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Special Offer Image<span
                                                    class="d-block text-danger">(Width:111px,
                                                    Height:111px)</span></span>

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="file-upload-sec ">
                                                        <input type="file" name="csv" class="input" hidden="">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="http://localhost/blindforuk/public/admin/dist/img/noImg.jpg"
                                                        alt="#" class="img-fluid">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="radgroup ">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="inp-radio"
                                                                name="exampleRadios">Remove Image
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input type="radio" class="inp-radio" name="exampleRadios">
                                                            Choose Banner
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Alt Tag</span>
                                            <input class="form-control" value="Special Offer" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                        <hr />
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Email Address Popup Template</p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Pop Up background color</span>
                                            <input class="form-control" value="#000000" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Header message</span>
                                            <input class="form-control" value="Blue Cross Monday" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Message below heading</span>
                                            <input class="form-control" value="expires 30/4/2016" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Text value</span>
                                            <input class="form-control" value="Extra" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <span class="label-title">Text colour</span>
                                            <input class="form-control" value="#0000" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="label-title">Offer value</span>
                                            <input class="form-control" value="20% OFF" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <span class="label-title">Text colour</span>
                                            <input class="form-control" value="#ff0000" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Bottom Text</span>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Email Content</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Email Subject</span>
                                            <input class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Email Content <span class="text-danger">(New
                                                    Users)</span></span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Email Content <span class="text-danger">( All
                                                    Users)</span></span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Add Promotion Code</span>
                                            <input class="form-control" value="EXTRA20"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Valid Date</span>
                                            <input type="date" class="form-control" value="EXTRA20"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Thank you Page</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Top Heading</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Middle Content</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Valid Date Text</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Bottom Content</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Already Registered Page</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Top Heading</span>
                                            <textarea class="form-control"
                                                value="You are already registered.."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Middle Content</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Bottom Content</span>
                                            <textarea class="form-control"
                                                value="Welcome to Blinds4UK: here's your promotion code for Extra 20%"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="PromotionCode-head mb-3 w-100">
                                        <div class="button-action justify-content-start">
                                            <p>Pop up Settings</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Switch Pop Up</span>
                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR">Yes </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR"> No </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Show Multiple Pop Up</span>
                                            <input type="number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Start Date</span>
                                            <input type="date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">End Date</span>
                                            <input type="date" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Pop Up Open</span>
                                            <select class="form-control">
                                                <option value="10 sec">10 sec</option>
                                                <option value="20 sec">20 sec</option>
                                                <option value="30 sec">30 sec</option>
                                                <option value="40 sec">40 sec</option>
                                                <option value="50 sec">50 sec</option>
                                                <option value="60 sec">60 sec</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span class="label-title">Pop Up Close</span>
                                            <select class="form-control">
                                                <option value="30 sec">30 sec</option>
                                                <option value="60 sec">60 sec</option>
                                                <option value="90 sec">90 sec</option>
                                                <option value="120 sec">120 sec</option>
                                                <option value="150 sec">150 sec</option>
                                                <option value="180 sec">180 sec</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="label-title">Choose Option</span>
                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR">Available to
                                                    new </label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR">Available to
                                                    all</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="label-title">Choose Popup Template</span>
                                            <div class="radgroup form-control">
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR"> Email Address
                                                    Popup</label>
                                                <label class="form-check-label">
                                                    <input type="radio" class="inp-radio" name="exampleR"> Promotion
                                                    Code Popup</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="button-action justify-content-start">
                                            <button type="submit" class="btn btn-info ml-auto">Save</button>
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
@endsection