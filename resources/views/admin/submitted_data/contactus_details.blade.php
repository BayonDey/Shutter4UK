@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Contact Details</h3>
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

                    <div class="card card-outline card-warning p-3">
                        <div class="row col-md-12">
                            <div class="col-md-8">
                                <h3 class="heading mb-4"><b>Subject:</b> Enquiry Shutters4UK ref - {{$dataRow->ref_no}}</h3>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info" href="{{ route('contactus_list', ['tr'=>$dataRow->id]) }}">
                                    << Back to list</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-warning" href="{{ route('generate_pdf_single', ['flag' => 'contact_us', 'id' => $dataRow->id]) }}">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <tr>
                                <td colspan="3">LOGO</td>

                            </tr>
                            <tr>
                                <td colspan="3">The following customer has been in contact requesting some information.</td>
                            </tr>
                            <tr>
                                <td colspan="3">Contact Us: Ref {{$dataRow->ref_no}}</td>
                            </tr>
                            <tr>
                                <td>Contact Us Details</td>
                                <td></td>
                                <td>Date: {{ date('d-m-Y', strtotime($dataRow->date)) }}</td>
                            </tr>
                            <tr>
                                <td>Contact name:</td>
                                <td> {{$dataRow->contact_name}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Contact email:</td>
                                <td> {{$dataRow->contact_email}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Contact phone:</td>
                                <td> {{$dataRow->contact_phone}}</td>
                                <td></td>
                            </tr>
                            <?php
                            if ($dataRow->department_name != '') {
                            ?>
                                <tr>
                                    <td>Department name:</td>
                                    <td colspan="2"> {{$dataRow->department_name}}</td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>Contact message:</td>
                                <td colspan="2"> {{$dataRow->contact_message}}</td>

                            </tr>

                            <tr>
                                <td colspan="3">Thank you for your custom</td>
                            </tr>
                            <tr>
                                <hr>
                                <td colspan="3" style="text-align: center;">{{ App\Model\ManageContent::get_content_data(['contact_address'])['contact_address']->content_sub_title }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection