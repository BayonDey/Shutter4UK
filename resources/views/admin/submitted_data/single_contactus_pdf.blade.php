<div style="width:500px; margin-left:auto;margin-right:auto;">
                   
    <h3 style="font-family: Helvetica, sans-serif;font-size:20px;">Contact Details</h3>
    <h4 style="font-family: Helvetica, sans-serif;font-size:14px; font-weight:normal"><b>Subject:</b> Enquiry Shutters4UK ref - {{$dataRow->ref_no}}</h4>
        
    <table id="example1" style="width:100%; border-spacing: 0;">
        <!-- <tr>
            <td colspan="3">LOGO</td>
        </tr> -->
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:14px; font-weight:normal; padding-top:50px; padding-bottom:50px;">The following customer has been in contact requesting some information.</td>
        </tr>
        <tr>
            <td colspan="3" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; color:#333; padding-bottom:15px; border-bottom:2px solid #555;">Contact Us: Ref {{$dataRow->ref_no}}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px;">Contact Us Details</td>
            <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:18px; font-weight:normal; padding-top:50px; padding-bottom:20px; text-align:right;">Date: {{ date('d-m-Y', strtotime($dataRow->date)) }}</td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact name:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$dataRow->contact_name}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact email:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$dataRow->contact_email}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact phone:</b></td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$dataRow->contact_phone}}</td>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"></td>
        </tr>
        <?php
        if ($dataRow->department_name != '') {
        ?>
            <tr>
                <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Department name:</b></td>
                <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$dataRow->department_name}}</td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"><b>Contact message:</b></td>
            <td colspan="2" style="font-family: Helvetica, sans-serif;font-size:14px; color:#333; font-weight:normal; padding-top:5px; padding-bottom:5px;"> {{$dataRow->contact_message}}</td>
            
        </tr>
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