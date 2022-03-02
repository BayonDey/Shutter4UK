<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment_mng_tbl';
    public $timestamps = false;

    protected $fillable = [
        'ref_id', 'ap_title', 'ap_firstname', 'ap_surname', 'ap_company', 'ap_email_add',
        'ap_contact_no', 'ap_property', 'ap_address_one', 'ap_address_two', 'ap_address_three',
        'ap_postcode', 'ap_town', 'first_app_date', 'first_app_time', 'second_app_date',
        'second_app_time', 'third_app_date', 'third_app_time', 'ap_additional_info',
        'department_name', 'department_url', 'created_date', 'status', 'cust_subject',
        'cust_body', 'admin_subject', 'admin_body'
    ];


    public static function appointment_details_list($selectIds)
    {
        $la_dataList = Appointment::whereIn('id', $selectIds)->get();
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['ref_id'] = 'Contact us';
        $returnArr[0]['contact_name'] = '';
        $returnArr[0]['ap_company'] = '';
        $returnArr[0]['ap_email_add'] = '';
        $returnArr[0]['ap_contact_no'] = '';
        $returnArr[0]['ap_address_one'] = '';
        $returnArr[0]['ap_address_two'] = '';
        $returnArr[0]['ap_address_three'] = '';
        $returnArr[0]['ap_postcode'] = '';
        $returnArr[0]['ap_town'] = '';
        $returnArr[0]['first_app_date'] = '';
        $returnArr[0]['second_app_date'] = '';
        $returnArr[0]['third_app_date'] = '';
        $returnArr[0]['ap_additional_info'] = '';
        $returnArr[0]['department_name'] = '';
        $returnArr[0]['created_date'] = '';
        $returnArr[0]['cust_subject'] = '';
        $returnArr[0]['cust_body'] = '';
        $returnArr[0]['admin_subject'] = '';
        $returnArr[0]['admin_body'] = '';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['ref_id'] = ' ';
        $returnArr[1]['contact_name'] = '';
        $returnArr[1]['ap_company'] = '';
        $returnArr[1]['ap_email_add'] = '';
        $returnArr[1]['ap_contact_no'] = '';
        $returnArr[1]['ap_address_one'] = '';
        $returnArr[1]['ap_address_two'] = '';
        $returnArr[1]['ap_address_three'] = '';
        $returnArr[1]['ap_postcode'] = '';
        $returnArr[1]['ap_town'] = '';
        $returnArr[1]['first_app_date'] = '';
        $returnArr[1]['second_app_date'] = '';
        $returnArr[1]['third_app_date'] = '';
        $returnArr[1]['ap_additional_info'] = '';
        $returnArr[1]['department_name'] = '';
        $returnArr[1]['created_date'] = '';
        $returnArr[1]['cust_subject'] = '';
        $returnArr[1]['cust_body'] = '';
        $returnArr[1]['admin_subject'] = '';
        $returnArr[1]['admin_body'] = '';

        $returnArr[2]['sl_no'] = 'Sl no';
        $returnArr[2]['ref_id'] = 'Ref no';
        $returnArr[2]['contact_name'] = 'Contact name';
        $returnArr[2]['ap_company'] = 'Company';
        $returnArr[2]['ap_email_add'] = 'Email';
        $returnArr[2]['ap_contact_no'] = 'Contact no';
        $returnArr[2]['ap_address_one'] = 'Address one';
        $returnArr[2]['ap_address_two'] = 'Address two';
        $returnArr[2]['ap_address_three'] = 'Address three';
        $returnArr[2]['ap_postcode'] = 'Postcode';
        $returnArr[2]['ap_town'] = 'Town';
        $returnArr[2]['first_app_date'] = 'First date';
        $returnArr[2]['second_app_date'] = 'Second date';
        $returnArr[2]['third_app_date'] = 'Third date';
        $returnArr[2]['ap_additional_info'] = 'Additional info';
        $returnArr[2]['department_name'] = 'Department name';
        $returnArr[2]['created_date'] = 'Created date';
        $returnArr[2]['cust_subject'] = 'Cust subject';
        $returnArr[2]['cust_body'] = 'Cust body';
        $returnArr[2]['admin_subject'] = 'Admin subject';
        $returnArr[2]['admin_body'] = 'Admin body';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1;
                $returnArr[$index]['ref_id'] = $row->ref_id;
                $returnArr[$index]['contact_name'] = $row->ap_title . " " . $row->ap_firstname . " " . $row->ap_surname;
                $returnArr[$index]['ap_company'] = $row->ap_company;
                $returnArr[$index]['ap_email_add'] = $row->ap_email_add;
                $returnArr[$index]['ap_contact_no'] = $row->ap_contact_no;
                $returnArr[$index]['ap_address_one'] = $row->ap_address_one;
                $returnArr[$index]['ap_address_two'] = $row->ap_address_two;
                $returnArr[$index]['ap_address_three'] = $row->ap_address_three;
                $returnArr[$index]['ap_postcode'] =  ($row->ap_postcode);
                $returnArr[$index]['ap_town'] = $row->ap_town;
                $returnArr[$index]['first_app_date'] =  $row->first_app_date . " " . $row->first_app_time;
                $returnArr[$index]['second_app_date'] = $row->second_app_date . " " . $row->second_app_time;
                $returnArr[$index]['third_app_date'] = $row->third_app_date . " " . $row->third_app_time;
                $returnArr[$index]['ap_additional_info'] = $row->ap_additional_info;
                $returnArr[$index]['department_name'] = $row->department_name;
                $returnArr[$index]['created_date'] = $row->created_date;
                $returnArr[$index]['cust_subject'] = $row->cust_subject;
                $returnArr[$index]['cust_body'] = strip_tags($row->cust_body);
                $returnArr[$index]['admin_subject'] = $row->admin_subject;
                $returnArr[$index++]['admin_body'] = strip_tags($row->admin_body);
            }
        }
        // dd($returnArr);
        return $returnArr;
    }
}
