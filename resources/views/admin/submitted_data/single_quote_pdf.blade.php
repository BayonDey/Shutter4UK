<div style="width:500px; margin-left:auto;margin-right:auto;">
    <h3 style="font-family: Helvetica, sans-serif;font-size:20px;">Quote Details</h3>
    <table id="example1" style="width:100%; border-spacing: 0;">
        <!-- <tr>
        <td colspan="3">LOGO</td>
        </tr> -->
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; font-weight:normal; padding-top:50px; padding-bottom:50px;">The following customer has been in contact requesting a quotation.</td>
        </tr>
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; color:#333; padding-bottom:15px; border-bottom:2px solid #555;">Quotation: Ref {{$quote->ref_id}}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px;">Quotation Details</td>
            <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px; text-align:right;">Date: {{ date('d-m-Y', strtotime($quote->created_date)) }}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Title:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_title}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>First Name:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_firstname}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Surname:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_surname}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <?php
        if ($quote->gq_company != '') {
        ?>
            <tr>
                <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Company name:</b></td>
                <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_company}}</td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Email address:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_email_add}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact number:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_contact_no}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <!-- <tr>
        <td>Interested Products:</td>
        <td colspan="2"> {{$quote->ap_additional_info}}</td>
        </tr> -->
        <?php
        if ($quote->gq_additional_info != '') {
        ?>
            <tr>
                <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Additional info:</b></td>
                <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$quote->gq_additional_info}}</td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3" style="padding-top:50px; padding-bottom:10px;">
            <hr>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;">Thank you for your custom</td>
        </tr>
        <tr>
            <hr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:50px; padding-bottom:10px;text-align: center;">{{ App\Model\ManageContent::get_content_data(['contact_address'])['contact_address']->content_sub_title }}</td>
        </tr>
    </table>

 </div>