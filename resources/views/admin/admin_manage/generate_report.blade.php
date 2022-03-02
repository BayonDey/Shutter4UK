@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Generate Report</h3>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary p-3">

                        <form action="{{route('dn_generate_report')}}" method="POST" id="generate_report" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$glossary->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Report Type</span>
                                        <select name="report_type" id="report_type" class="form-control select2">
                                            <option value="admin_ip_address">Admin Ip address report</option>
                                            <!-- <option value="product_details">Product Details</option>
                                            <option value="price_matrix">Price Matrix</option>
                                            <option value="group_price_matrix">Price Matrix Group</option>
                                            <option value="product_sales_analysis">Product Sales Analysis</option>
                                            <option value="product_sample">Product Samples List</option>
                                            <option value="order_details">Order Details List</option>
                                            <option value="samples_ordered">Samples Ordered Online</option> -->
                                        </select>
                                    </div>
                                </div>  
                                <!-- <div class="col-md-12 order_status_content" style="display: none;">
                                    <div class="form-group">
                                        <span class="label-title">Order Status</span>
                                        <select name="order_status" id="order_status " class="form-control " >
                                            <option value="all">All Orders</option>
                                            <option value="New">New Orders</option>
                                            <option value="Complete">Complete Orders</option>
                                            <option value="Incomplete">Incomplete Orders</option>
                                            <option value="Failed">Failed Orders</option>
                                            <option value="Cancelled">Cancelled Orders</option>
                                            <option value="Quote">Quote Orders</option>
                                            <option value="Refunded">Refunded Orders</option>
                                            <option value="Unpaid">Unpaid Orders</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6 start_date_content">
                                    <div class="form-group">
                                        <span class="label-title">Start Date</span>
                                        <input type="date" name="start_date" class="form-control start_date" id="">
                                    </div>
                                </div>
                                <div class="col-md-6 end_date_content">
                                    <div class="form-group">
                                        <span class="label-title">End Date</span>
                                        <input type="date" name="end_date" class="form-control end_date" id="">
                                    </div>
                                </div>
                                <div class="download_url"></div>

                                <div class="col-md-12">
                                    <div class="button-action">
                                        <button type="submit" class="btn btn-info ">Generate Report</button>
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        $("#report_type").change(function() {
            var report_type = $(this).val();
            $(".start_date_content, .end_date_content").show();
            $(".band_id_content, .band_ids_content, .order_status_content").hide();

            if (report_type == 'product_details') {
                $(".start_date_content, .end_date_content").hide();
            }
            if (report_type == 'price_matrix') {
                $(".band_id_content").show();
                $(".start_date_content, .end_date_content").hide();
            }
            if (report_type == 'group_price_matrix') {
                $(".band_ids_content").show();
                $(".start_date_content, .end_date_content").hide();
            }
            if (report_type == 'product_sample') {
                $(".start_date_content, .end_date_content").hide();
            }
            if (report_type == 'order_details') {
                $(".order_status_content").show();
            }
        });

    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop