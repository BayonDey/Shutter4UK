@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Quote Details</h3>
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
                                <h3 class="heading mb-4"><b>Subject:</b> Get a Quote Shutters4UK Ref Id - {{$quote->ref_id}}</h3>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info" href="{{ route('quote_list', ['tr'=>$quote->id]) }}">
                                    << Back to list</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-warning" href="{{ route('generate_pdf_single', ['flag' => 'quote', 'id' => $quote->id]) }}">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                        <table id="example1" class="table table-head-fixed text-nowrap">
                            <tr>
                                <td colspan="3">LOGO</td>

                            </tr>
                            <tr>
                                <td colspan="3">The following customer has been in contact requesting a quotation.</td>
                            </tr>
                            <tr>
                                <td colspan="3">Quotation: Ref {{$quote->ref_id}}</td>
                            </tr>
                            <tr>
                                <td>Quotation Details</td>
                                <td></td>
                                <td>Date: {{ date('d-m-Y', strtotime($quote->created_date)) }}</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td> {{$quote->gq_title}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td> {{$quote->gq_firstname}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Surname:</td>
                                <td> {{$quote->gq_surname}}</td>
                                <td></td>
                            </tr>
                            <?php
                            if ($quote->gq_company != '') {
                            ?>
                                <tr>
                                    <td>Company name:</td>
                                    <td colspan="2"> {{$quote->gq_company}}</td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>Email address:</td>
                                <td> {{$quote->gq_email_add}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Contact number:</td>
                                <td> {{$quote->gq_contact_no}}</td>
                                <td></td>
                            </tr>
                            <!-- <tr>
                                <td>Interested Products:</td>
                                <td colspan="2"> {{$quote->ap_additional_info}}</td>
                            </tr> -->
                            <?php
                            if ($quote->gq_additional_info != '') {
                            ?>
                                <tr>
                                    <td>Additional info:</td>
                                    <td colspan="2"> {{$quote->gq_additional_info}}</td>
                                </tr>
                            <?php
                            }
                            ?>
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