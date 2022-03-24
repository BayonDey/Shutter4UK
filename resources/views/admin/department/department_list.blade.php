@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Departments</h3>
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
                        <div class="row col-md-12">
                            <a href="{{ route('department_create') }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i> Add department
                                </button>
                            </a>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Department Name</th>
                                    <th>Contact no</th>
                                    <th>Opening time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($departments))

                                @foreach($departments as $i => $rowData)
                                <tr id="TR__{{$rowData->id }}">
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <img class="img-fluid dep_logo" id="img_name_pre" src="{{App\Utility::filePathShow(@$rowData->logo_image, 'departments')}}" width="50px">
                                    </td>
                                    <td><a href="{{ route('dept_home',$rowData->url) }}" target="_blank">{{ $rowData->name }}</a></td>
                                    <td>{{ $rowData->contact_no }}</td>
                                    <td>{{ $rowData->opening_time }}</td>


                                    <td>
                                        <div class="action-button-wrap">
                                            <a href="{{ route('department_category_list', $rowData->id ) }}" class="btn btn-outline-default" data-toggle="tooltip" data-placement="top" title="Categories"><i class="fa fa-bezier-curve"></i></i></a>
                                            <a href="{{ route('department_products_list', $rowData->id ) }}" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Products"><i class="fas fa-cube"></i></a>
                                            <a href="{{ route('department_appointments_list', $rowData->id ) }}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Appointments"><i class="fas fa-calendar-check"></i></a>

                                            <a href="{{ route('department_contact_list', $rowData->id ) }}" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Contact Us"><i class="fa fa-address-book"></i></a>
                                            <a href="{{ route('department_quote_list', $rowData->id ) }}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Quotes"><i class="fas fa-quote-right"></i></a>
                                            <a href="{{ route('client_details', $rowData->id ) }}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Client Details"><i class="fas fa-user-circle"></i></a>

                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('department_edit', $rowData->id ) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="showImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title assignContentModalLabel" id="exampleModalLabel">View Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="" class="showImgInModal" alt="" width="100%">
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

        //=== START:: show image in modal =====//
        $('body').on('click', '.dep_logo', function() {
            var imgSrc = $(this).attr('src');
            $(".showImgInModal").attr("src", imgSrc);
            $("#showImgModal").modal('show');
        });
        //=== END:: show image in modal =====//

        var activeTR = '<?= @$activeTR ?>';
        $("#TR__" + activeTR).addClass('activeTR');
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop