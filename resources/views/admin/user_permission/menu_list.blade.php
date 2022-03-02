@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Manage Menu</h3>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="fas fa-home"></i> Home</a>
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
                        <form action="{{route('updateAllMenus')}}" method="post">
                            @csrf()
                            <div class="row">
                                <div class="col-md-8">Menu List</div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-warning edit_menu"><i class='fa fa-pencil-alt'></i> Edit Menu</button>
                                    <button type="button" class="btn btn-danger cancel_edit" style="display: none;"><i class='fa fa-ban'></i> Cancel</button>
                                    <button type="submit" class="btn btn-primary save_edit" style="display: none;"><i class='fa fa-check'></i> Save</button>

                                    <a href="{{ route('menu_create')}}">
                                        <button type="button" class="btn btn-success"> Create new menu »</button>
                                    </a>

                                </div>
                            </div>


                            <div class="card-body table-responsive p-2 produt-inner-wrap">
                                <table id="example1" class="table table-head-fixed text-nowrap">
                                    @if(!empty($menuList))
                                    @foreach($menuList as $i => $menu)
                                    <tr class="pMenuTR " id="pMenu__{{$menu->id}}">
                                        <td class="pMenuNameTD" id="pMenuName__{{$menu->id}}">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fa fa-{{$menu->icon_class}} detaShow0"></i> &nbsp; &nbsp;
                                                    <u class="pMenuNameU detaShow" id="pMenuNameU__{{$menu->id}}"> {{ ucwords($menu->sections) }}</u> &nbsp;[ Key: {{ $menu->section_key }}]

                                                    <input type="text" class='hiddenInput0' name="icon_class[{{$menu->id}}]" value="{{$menu->icon_class}}" style="display: none;" required>
                                                    <input type="text" class='hiddenInput' name="sections[{{$menu->id}}]" value="{{ ucwords($menu->sections) }}" style="display: none;" required>
                                                </div>
                                            </div>

                                            @if(isset($subMenus[$menu->id]) && (count($subMenus[$menu->id]) > 0))
                                            <div class="" id="appendSubMenu__{{$menu->id}}">
                                                <table class="table text-nowrap m-16px">
                                                    <?php
                                                    foreach ($subMenus[$menu->id] as $row) {
                                                    ?>
                                                        <tr class="subMenuTR " id="subMenuTR__ ">
                                                            <td>
                                                                <div class="card item-card">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <span class='detaShow0'><i class="fa fa-{{$row->icon_class}}"></i> &nbsp;&nbsp; </span>
                                                                            <span class='detaShow'> {{$row->sections}} &nbsp; [ Key: {{ $row->section_key }}]</span>


                                                                            <input type="text" class='hiddenInput0' name="icon_class[{{$row->id}}]" value="{{$row->icon_class}}" style="display: none;" required>
                                                                            <input type="text" class='hiddenInput' name="sections[{{$row->id}}]" value="{{ ucwords($row->sections) }}" style="display: none;" required>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                </table>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </table>
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


        $(".edit_menu").click(function() {
            $(".edit_menu").hide();
            $(".cancel_edit, .save_edit").show();

            $(".detaShow").hide(500);
            $(".hiddenInput").show(500);
        });

        $(".cancel_edit").click(function() {
            $(".cancel_edit, .save_edit").hide();
            $(".edit_menu").show();

            $(".hiddenInput").hide(500);
            $(".detaShow").show(500);
        });

    });
</script>


@stop