@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-7"><h3>User Permission</h3></div>
                        <div class="col-sm-5">
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

    <section class="content manageUser">
        <!-- Info boxes -->

        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title "><strong>Type:</strong> Admin </h3>
                    </div>


                    <div class="manage-box-wrap">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Dashboard</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Dashboard View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Manufacturer</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manufacturer View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manufacturer Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manufacturer Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manufacturer Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Categories View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Categories Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Categories Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Categories Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Products View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Products Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Products Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Products Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage News</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">News View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">News Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">News Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">News Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Customers</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Customers View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Customers Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Customers Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Customers Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Tax Location</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Tax Location View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Tax Location Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Tax Location Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Tax Location Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Coupons</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Coupons View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Coupons Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Coupons Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Coupons Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Notifications</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Notifications View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Notifications Send</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Orders View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Orders Confirm</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Shipping Methods</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Shipping Methods view</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Shipping Methods Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Payment Methods</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Payment Methods View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Payment Methods Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Reports</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Reports View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Website Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Website Setting View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Website Setting Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Application Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Application Setting View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Application Setting Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage General Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">General Setting View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">General Setting Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Admins</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Admins View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Admins Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Admins Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Admins Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Language</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Language View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Language Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Language Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Language Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Profile View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Profile Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Admin Types</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Admin Type View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Admin Type Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Admin Type Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Admin Type Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Admin Roles</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Media</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Media View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Media Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Media Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Media Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Reviews</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Reviews View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Reviews Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Manage Delivery Boy</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Delivery Boy View</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Delivery Boy Create</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Delivery Boy Update</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p class="label-title">Manage Delivery Delete</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <div class="label-wrap">
                                            <label class="custom-chk-wrap">Yes
                                                <input type="radio" checked="checked" name="Categoriesradio">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom-chk-wrap">No
                                                <input type="radio" name="radio">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="button-action">
                        <button type="button" class="btn btn-info">Submit</button>
                        <button type="button" class="btn btn-default">Back</button>
                    </div>
                </div>

            </div>

            <!-- Main row -->

            <!-- /.row -->
    </section>
</div>
@endsection
