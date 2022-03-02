@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Download Product Image</h3>
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

                        <form action="#" method="POST" id="band_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{@$glossary->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="label-title">Choose Product Type</span>
                                        <select name="type_id" id="type_id" class="form-control select2">
                                            <option value="0">Select product type...</option>

                                            @foreach($productTypes as $type)
                                            <option value="{{$type->id}}">{{$type->pname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="download_url"></div>

                                <div class="col-md-12">
                                    <div class="button-action">
                                        <button type="button" class="btn btn-info create_zip_file">Create Zip</button>
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

        $("#type_id").change(function() {
            $('.download_url').html('');

        });


        $('.create_zip_file').click(function() {

            var type_id = $('#type_id').val();

            $('.download_url').html('<i class="fa fa-spin fa-spinner"> </i>');

            setTimeout(function() {
                $('.download_url').html('<a href="' + base_url + '/download-zip/' + type_id + '" class="btn btn-warning"><i class="fa fa-cloud-download-alt"> </i> &nbsp; Download Zip</a>')
            }, 3000);


            $.ajax({
                type: 'POST',
                url: base_url + '/create-zip',
                data: {
                    _token: '<?= csrf_token() ?>',
                    type_id: type_id,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.return == 0) {
                        $.alert({
                            title: 'Alert!',
                            content: data.msg,
                        });
                        setTimeout(function() {
                            $('.download_url').html('');
                        }, 3000);
                    }
                    console.log(data);
                }
            });

        });
    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop