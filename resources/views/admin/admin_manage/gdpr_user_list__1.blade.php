@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>GDPR User List</h3>
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

                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Acc. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Pending/Process</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($users))

                                @foreach($users as $i => $rowData)
                                <?php
                                $userName = $rowData->b_firstname . " " . $rowData->b_lastname;
                                ?>
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $rowData->id }}</td>

                                    <td>{{ $userName }}</td>
                                    <td>{{ $rowData->email }}</td>

                                    <td>
                                        @if($rowData->gdpr_sent_email_status == 'PENDING')
                                        <a href="{{ route('gdpr_user_status_update', ['id'=>$rowData->id, 'status'=>'PROCESS', 'page' => $page]) }}" onclick="return confirm('Are you sure you want GDPR Email to Process for {{ $userName }}?')">PENDING</a>
                                        @elseif($rowData->gdpr_sent_email_status == 'PROCESS')
                                        <a href="{{ route('gdpr_user_status_update', ['id'=>$rowData->id, 'status'=>'PENDING', 'page' => $page]) }}" onclick="return confirm('Are you sure you want to Stop Process GDPR Email for {{ $userName }}?')">STOP PROCESS</a>
                                        @else
                                        {{ $rowData->gdpr_sent_email_status }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                        <div class="col-md-12" style="text-align: right;">
                            <div style="float: right;">
                                {{ $users->links() }}
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
        var base_url = "<?php echo URL::to('/') . "/admin"; ?>";

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop