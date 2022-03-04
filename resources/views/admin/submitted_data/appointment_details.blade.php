@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Appointment Details</h3>
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
                                <h3 class="heading mb-4"><b>Subject:</b> Appointment Shutters4UK Ref Id - {{$appointment->ref_id}}</h3>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info" href="{{ route('appointment_list', ['tr'=>$appointment->id]) }}">
                                    << Back to list</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-warning" href="{{ route('generate_pdf_single', ['flag' => 'appointment', 'id' => $appointment->id]) }}">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <tr>
                                <td colspan="3">LOGO</td>

                            </tr>
                            <tr>
                                <td colspan="3">The following customer has been in contact requesting an appointment site visit.</td>
                            </tr>
                            <tr>
                                <td colspan="3">Appointment: Ref {{$appointment->ref_id}}</td>
                            </tr>
                            <tr>
                                <td>Appointment Details</td>
                                <td></td>
                                <td>Date: {{$appointment->created_date}}</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td> {{$appointment->ap_title}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td> {{$appointment->ap_firstname}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Surname:</td>
                                <td> {{$appointment->ap_surname}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Email address:</td>
                                <td> {{$appointment->ap_email_add}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Contact number:</td>
                                <td> {{$appointment->ap_contact_no}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Property No. Name:</td>
                                <td> {{$appointment->ap_property}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Address Line 1:</td>
                                <td> {{$appointment->ap_address_one}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Postcode:</td>
                                <td> {{$appointment->ap_postcode}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Town:</td>
                                <td> {{$appointment->ap_town}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Interested Products:</td>
                                <td> {{$appointment->ap_additional_info}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td rowspan="3">Appointment Time:</td>
                                <td>
                                    <b>Date :</b> {{$appointment->first_app_date}} <b>Time :</b> {{$appointment->first_app_time}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Date :</b> {{$appointment->second_app_date}} <b>Time :</b> {{$appointment->second_app_time}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Date :</b> {{$appointment->third_app_date}} <b>Time :</b> {{$appointment->third_app_time}}
                                </td>
                                <td></td>
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