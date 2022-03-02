@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Manage Feedback</h3>
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
                    <div class="card card-outline card-primary p-3">
                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer name </th>
                                        <th width="50%">Comment</th>
                                        <th>Date</th>
                                        <th>Promote</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($feedbackList) > 0)
                                    @foreach($feedbackList as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $rowData->name }}</td>
                                        <td width="50%" title="{!! strip_tags($rowData->comment) !!}">
                                            {!! substr(strip_tags($rowData->comment), 0, 40) !!}</td>
                                        <td>{{ App\Utility::showDate($rowData->date) }}</td>

                                        <td>
                                            <div class="action-button-wrap">
                                                <label class="switch">
                                                    <input type="checkbox" class=" promote_to_front_switch"
                                                        id="switch__{{$rowData->id }}" {{ ($rowData->promote_to_front ==
                                                    1) ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <br>

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

        $(".promote_to_front_switch").click(function() {
            var thisId = $(this).attr('id');
            var fdId = thisId.split('__')[1];
            $.ajax({
                type: 'GET',
                url: base_url + '/feedback_promote_to_front/' + fdId,
                data: {},
                dataType: "json",

                success: function(returnData) {
                    if (returnData == 1) {
                        $.alert({
                            title: 'Success',
                            content: 'Update successfully',
                        });
                    } else {
                        $.alert({
                            title: 'Warning!',
                            content: 'Something was wrong',
                        });
                    }

                }
            });
        });

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop