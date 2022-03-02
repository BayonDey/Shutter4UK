@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Quotes</h3>
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
                        <form action="{{route('generate_csv_submitted')}}" method="POST" id="contact_form">
                            @csrf()
                            <input type="hidden" name="csv_type" value="quotes">
                            <div class="optionFilter">
                                <div class="row">

                                    <div class="col-md-10">

                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name="generate_csv" id="generate_csv_input">
                                        <button class="generate_csv btn btn-warning" style="margin: auto;display: block;margin-top: 2px;" disabled>
                                            <i class="fa fa-file-download"></i>
                                            Download CSV</button>
                                    </div>
                                </div>

                            </div>

                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date </th>
                                        <th>Ref No.</th>
                                        <th>Department Name</th>
                                        <th>Name of Customer</th>
                                        <th>Company</th>
                                        <th><input type="checkbox" name="" id="selectAllCheck">Select All </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($quotes))

                                    @foreach($quotes as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>

                                        <td title="{{ date('d-m-Y H:i', strtotime($rowData->created_date)) }}">
                                            {{ date('d-m-Y', strtotime($rowData->created_date)) }}
                                        </td>
                                        <td><a href="{{route('quote_details',$rowData->id)}}">{{ $rowData->ref_id }}</a></td>
                                        <td>{{ ($rowData->department_name == '') ? 'Office Shutters UK' : $rowData->department_name }}</td>
                                        <td>{{ $rowData->gq_title." ".$rowData->gq_firstname." ".$rowData->gq_surname  }}</td>
                                        <td>{{ $rowData->gq_company }}</td>

                                        <td>
                                            <input type="checkbox" name="selectIds[]" class="checkbox" value="{{$rowData->id }}" id="contactIds_{{$rowData->id }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
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
                $(".checkbox").prop('checked', true);
                $(".generate_csv").attr('disabled', false);
            } else {
                $(".checkbox").prop('checked', false);
                $(".generate_csv").attr('disabled', true);
            }
        });
        $('.checkbox').click(function() {
            if ($(this).prop('checked') == true) {
                $(".generate_csv").attr('disabled', false);
            } else {
                $("#selectAllCheck").prop('checked', false);
            }
        });

        $(".generate_csv").click(function(e) {
            e.preventDefault();
            var checkbox_order = $('.checkbox_order').val();
            var val = [];
            $(':checkbox:checked').each(function(i) {
                val[i] = $(this).val();
            });
            console.log(val);
            if (val.length == 0) {
                $.alert({
                    title: 'Alert!',
                    content: "Please select checkbox",
                });
            } else {
                $("#generate_csv_input").val("generate_csv");
                $("#contact_form").submit();
                $("#generate_csv_input").val("");
            }
        });

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop