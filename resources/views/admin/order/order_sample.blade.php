@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Sample Orders: {{ $status }}</h3>
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
                        <form action="{{ route('updateOrderStatus_multiple') }}" id="order_list_form" method="post">
                            @csrf()
                            <?php
                            $NewIcon = ($status == 'New') ? 'fa fa-check-circle' : '';
                            $CompleteIcon = ($status == 'Complete') ? 'fa fa-check-circle' : ' ';
                            $IncompleteIcon = ($status == 'Incomplete') ? 'fa fa-check-circle' : ' ';
                            $FailedIcon = ($status == 'Failed') ? 'fa fa-check-circle' : ' ';
                            $CancelledIcon = ($status == 'Cancelled') ? 'fa fa-check-circle' : '  ';
                            $QuoteIcon = ($status == 'Quote') ? 'fa fa-check-circle' : '  ';
                            $RefundedIcon = ($status == 'Refunded') ? 'fa fa-check-circle' : '  ';
                            $UnpaidIcon = ($status == 'Unpaid') ? 'fa fa-check-circle' : '  ';

                            $NewActiveClass = ($status == 'New') ? 'active' : '';
                            $CompleteActiveClass = ($status == 'Complete') ? 'active' : ' ';
                            $IncompleteActiveClass = ($status == 'Incomplete') ? 'active' : ' ';
                            $FailedActiveClass = ($status == 'Failed') ? 'active' : ' ';
                            $CancelledActiveClass = ($status == 'Cancelled') ? 'active' : '  ';
                            $QuoteActiveClass = ($status == 'Quote') ? 'active' : '  ';
                            $RefundedActiveClass = ($status == 'Refunded') ? 'active' : '  ';
                            $UnpaidActiveClass = ($status == 'Unpaid') ? 'active' : '  ';
                            ?>

                            <p class="sample-title">Sample order types:</p>
                            <div class="sample-active mb-4">
                                <a class="btn btn-default {{$NewActiveClass}}" href="{{route('order_sample', ['st'=>'New'])}}"><i class=" {{$NewIcon}} mr-1"></i>New </a>
                                <a class="btn btn-default  {{$CompleteActiveClass}}" href="{{route('order_sample', ['st'=>'Complete'])}}"><i class="{{$CompleteIcon}} mr-1"></i>Complete </a>
                                <a class="btn btn-default {{$IncompleteActiveClass}}" href="{{route('order_sample', ['st'=>'Incomplete'])}}"><i class=" {{$IncompleteIcon}} mr-1"></i>Incomplete </a>
                                <a class="btn btn-default {{$FailedActiveClass}}" href="{{route('order_sample', ['st'=>'Failed'])}}"><i class=" {{$FailedIcon}} mr-1"></i>Failed </a>
                                <a class="btn btn-default {{$CancelledActiveClass}}" href="{{route('order_sample', ['st'=>'Cancelled'])}}"><i class=" {{$CancelledIcon}} mr-1"></i>Cancelled </a>
                                <a class="btn btn-default {{$QuoteActiveClass}}" href="{{route('order_sample', ['st'=>'Quote'])}}"><i class=" {{$QuoteIcon}} mr-1"></i>Quote </a>
                                <a class="btn btn-default {{$RefundedActiveClass}}" href="{{route('order_sample', ['st'=>'Refunded'])}}"><i class=" {{$RefundedIcon}} mr-1"></i>Refunded </a>
                                <a class="btn btn-default {{$UnpaidActiveClass}}" href="{{route('order_sample', ['st'=>'Unpaid'])}}"><i class=" {{$UnpaidIcon}} mr-1"></i>Unpaid </a>


                            </div>
                            <div class="optionFilter">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-9">
                                                <select class="form-control select2">
                                                    <option>Search by email template</option>
                                                    @if(count($standard_emails) > 0)
                                                    @foreach($standard_emails as $row)
                                                    <option value="{{$row->id}}">{{$row->template_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-info btn-sm mt-1">Go</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="hidden" name="page" value="sample">
                                                <select name="status_top" class="form-control" id="">
                                                    <option value="">Update Status</option>
                                                    @if($status != 'Complete')
                                                    <option value="Complete">Complete</option>
                                                    @endif
                                                    @if($status != 'Incomplete')
                                                    <option value="Incomplete">Incomplete</option>
                                                    @endif
                                                    @if($status != 'New')
                                                    <option value="New">New</option>
                                                    @endif
                                                    @if($status != 'Refunded')
                                                    <option value="Refunded">Refunded</option>
                                                    @endif
                                                    @if($status != 'Unpaid')
                                                    <option value="Unpaid">Unpaid</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-info btn-sm mt-1 w-100" disabled id="ChangeStatusGo">Go</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name="generate_pdf" id="generate_pdf_input">
                                        <button class="generate_pdf btn btn-warning" type="button" style="margin: auto;display: block;margin-top: 2px;" disabled>
                                            <i class="fa fa-file-download"></i> Download PDF</button>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Order</th>
                                            <th>Invoice</th>
                                            <th>Name</th>
                                            <th>Total</th>
                                            <th> <input type="checkbox" id="selectAllCheck"> </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orderList))

                                        @foreach($orderList as $i => $order)
                                        <tr id="TR__{{$order->id}}">
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ date('d/m/Y', strtotime($order->date)) }}</td>
                                            <td>
                                                <a href="{{ route('order_details', $order->id) }}">
                                                    {{ $order->id }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($order->invoice_number != '')
                                                <a href="{{ route('order_details', $order->id) }}">
                                                    {{ $order->invoice_number }}
                                                </a>
                                                @else
                                                n/a
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('user_details', $order->user_id) }}">
                                                    {{ $order->b_title." ".$order->b_firstname ."
                                                    ".$order->b_lastname
                                                    }}
                                                </a>
                                            </td>
                                            <td>£{{ $order->total_price }}</td>
                                            <td><input type="checkbox" class="checkbox_order" name="checkbox_order[{{$order->id}}]" value="{{$order->id}}">
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>Action
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        @if($status != 'Cancelled')
                                                        <a class="dropdown-item" href="{{ route('updateOrderCancel', ['id'=>$order->id, 'page' => 'sample']) }}" onclick="return confirm('Are you sure you want to cancel order #<?= $order->id ?>?')">
                                                            Cancel
                                                        </a>
                                                        @endif

                                                        <a class="dropdown-item" href="{{ route('orderDeleteAndRestore', ['id'=>$order->id, 'page' => 'sample']) }}" onclick="return confirm('Are you sure you want to delete order #<?= $order->id ?>?')">
                                                            Delete
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('order_details', $order->id)}}">
                                                            View
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 row">
                                <!-- <div class="col-md-7">
                                    <span class="generate_pdf btn btn-warning"><i class="fa fa-file-download"></i>
                                        Download PDF</span>
                                </div> -->

                                <!-- <div class="col-md-5">
                                    <span class="">Change Status:
                                        <select name="status_top_2" id="">
                                            <option value="">Please Select...</option>
                                            @if($status != 'Complete')
                                            <option value="Complete">Complete</option>
                                            @endif
                                            @if($status != 'Incomplete')
                                            <option value="Incomplete">Incomplete</option>
                                            @endif
                                            @if($status != 'New')
                                            <option value="New">New</option>
                                            @endif
                                            @if($status != 'Refunded')
                                            <option value="Refunded">Refunded</option>
                                            @endif
                                            @if($status != 'Unpaid')
                                            <option value="Unpaid">Unpaid</option>
                                            @endif

                                        </select>

                                        <button type="submit" class="btn btn-info btn-sm">Go</button>
                                    </span>
                                </div> -->

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

        $('#selectAllCheck').click(function() {
            if ($(this).prop('checked') == true) {
                $(".checkbox_order").prop('checked', true);
                $("#ChangeStatusGo, .generate_pdf").attr('disabled', false);

            } else {
                $(".checkbox_order").prop('checked', false);
                $("#ChangeStatusGo, .generate_pdf").attr('disabled', true);
            }
        });
        $('.checkbox_order').click(function() {
            if ($(this).prop('checked') == true) {
                $("#ChangeStatusGo, .generate_pdf").attr('disabled', false);
            } else {
                $("#selectAllCheck").prop('checked', false);
                // $("#ChangeStatusGo").attr('disabled', true);
            }
        });

        $(".generate_pdf").click(function(e) {
            var checkbox_order = $('.checkbox_order').val();
            var val = [];
            $(':checkbox:checked').each(function(i) {
                val[i] = $(this).val();
            });
            console.log(val);
            if (val.length == 0) {
                $.alert({
                    title: 'Alert!',
                    content: "Please select the order",
                });
            } else {
                $("#generate_pdf_input").val("generate_pdf");
                $("#order_list_form").submit();
                $("#generate_pdf_input").val("");
                // $.ajax({
                //     type: 'POST',
                //     url: base_url + '/generate-order-pdf',
                //     data: {
                //         _token: "<?= csrf_token(); ?>",
                //         orderIds: val,
                //     },
                //     success: function(data) {}
                // });
            }
        });


        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });
</script>
@stop