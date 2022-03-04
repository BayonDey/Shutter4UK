<div style="width:500px; margin-left:auto;margin-right:auto;">
    <h3 style="font-family: Helvetica, sans-serif;font-size:20px;">Appointment Details</h3>
    <h4 style="font-family: Helvetica, sans-serif;font-size:14px; font-weight:normal"><b>Subject:</b> Appointment Shutters4UK Ref Id - {{$appointment->ref_id}}</h4>

    <table id="example1"  style="width:100%; border-spacing: 0;">
        <!-- <tr>
            <td colspan="3"><img src="http://localhost:82/Shutter4UK/public/admin/dist/img/shutters4uk-logo.png" alt="Laravel" /></td>
        </tr> -->
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; font-weight:normal; padding-top:50px; padding-bottom:50px;">The following customer has been in contact requesting an appointment site visit.</td>
        </tr>
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; color:#333; padding-bottom:15px; border-bottom:2px solid #555;">Appointment: Ref {{$appointment->ref_id}}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px;">Appointment Details</td>
            <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px; text-align:right;">Date: {{$appointment->created_date}}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Title:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_title}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>First Name:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_firstname}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Surname:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_surname}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Email address:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_email_add}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact number:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_contact_no}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Property No. Name:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_property}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Address Line 1:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_address_one}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Postcode:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_postcode}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Town:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_town}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top:50px; padding-bottom:10px;">
            <hr>
            </td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Interested Products:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$appointment->ap_additional_info}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td rowspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Appointment Time:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;">
                <b>Date :</b> {{$appointment->first_app_date}} <b>Time :</b> {{$appointment->first_app_time}}
            </td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;">
                <b>Date :</b> {{$appointment->second_app_date}} <b>Time :</b> {{$appointment->second_app_time}}
            </td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;">
                <b>Date :</b> {{$appointment->third_app_date}} <b>Time :</b> {{$appointment->third_app_time}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" style="padding-bottom:50px; padding-top:10px"><hr></td>
        </tr>
        <tr>
            <hr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:50px; padding-bottom:10px;text-align: center;">{{ App\Model\ManageContent::get_content_data(['contact_address'])['contact_address']->content_sub_title }}</td>
        </tr>
    </table>
</div>