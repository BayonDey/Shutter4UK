@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Manage Colour Palette</h3>
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
                        
                        <div class="card-body table-responsive p-2">
                            <table id="example1" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Colours</th>
                                        <th>Select Colour palette</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($colourPalette) > 0)
                                    @foreach($colourPalette as $i => $rowData)
                                    <tr id="TR__{{$rowData->id }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <img src="{{App\Utility::filePathShow($rowData->image, 'v3_product_filters')}}" alt="" width="40px">
                                            {{ $rowData->name }}
                                        </td>

                                        <td>
                                            <input type="checkbox" class="colorCheck" id="colorCheck__{{ $rowData->id }}" {{ ($rowData->colour_palette == 1) ? 'checked' : '' }}>
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
        $(".colorCheck").click(function() {
            var colorCheck = $(this).attr('id');
            var colorCheckId = colorCheck.split('__')[1];

            $.ajax({
                type: 'GET',
                url: base_url + '/update_colour_palette/' + colorCheckId,
                data: {},
                dataType: "json",

                success: function(returnData) {
                    if (returnData) {
                        $.alert({
                            title: 'Success!',
                            content: "Colour palette update successfully",
                        });
                    } else {
                        $.alert({
                            title: 'Alert!',
                            content: "Something wrong",
                        });
                    }
                }
            });
        });


    });

    $("body").tooltip({
        selector: '[data-toggle=tooltip]'
    });
</script>
@stop