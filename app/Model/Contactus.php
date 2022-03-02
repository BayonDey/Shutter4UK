<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table = 'contactus_details';
    public $timestamps = false;

    protected $fillable = [
        'ref_no', 'contact_name', 'contact_email', 'contact_phone', 'contact_message',
        'department_name', 'status', 'date', 'email_subject', 'email_body', 'admin_subject',
        'admin_body'
    ];

    
    public static function contactus_details_list($selectIds)
    {
        $la_dataList = Contactus::whereIn('id', $selectIds)->get();
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['ref_no'] = 'Contact us';
        $returnArr[0]['contact_name'] = '';
        $returnArr[0]['contact_email'] = '';
        $returnArr[0]['contact_phone'] = '';
        $returnArr[0]['contact_message'] = '';
        $returnArr[0]['department_name'] = '';
        $returnArr[0]['date'] = '';
        $returnArr[0]['email_subject'] = '';
        $returnArr[0]['email_body'] = '';
        $returnArr[0]['admin_subject'] = '';
        $returnArr[0]['admin_body'] = '';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['ref_no'] = ' ';
        $returnArr[1]['contact_name'] = '';
        $returnArr[1]['contact_email'] = '';
        $returnArr[1]['contact_phone'] = '';
        $returnArr[1]['contact_message'] = '';
        $returnArr[1]['department_name'] = '';
        $returnArr[1]['date'] = '';
        $returnArr[1]['email_subject'] = '';
        $returnArr[1]['email_body'] = '';
        $returnArr[1]['admin_subject'] = '';
        $returnArr[1]['admin_body'] = '';

        $returnArr[2]['sl_no'] = 'Sl no';
        $returnArr[2]['ref_no'] = 'Ref no';
        $returnArr[2]['contact_name'] = 'Contact name';
        $returnArr[2]['contact_email'] = 'Contact email';
        $returnArr[2]['contact_phone'] = 'Contact phone';
        $returnArr[2]['contact_message'] = 'Contact message';
        $returnArr[2]['department_name'] = 'Department name';
        $returnArr[2]['date'] = 'Date';
        $returnArr[2]['email_subject'] = 'Email subject';
        $returnArr[2]['email_body'] = 'Email body';
        $returnArr[2]['admin_subject'] = 'Admin subject';
        $returnArr[2]['admin_body'] = 'Admin body';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1;
                $returnArr[$index]['ref_no'] = $row->ref_no;
                $returnArr[$index]['contact_name'] = $row->contact_name;
                $returnArr[$index]['contact_email'] = $row->contact_email;
                $returnArr[$index]['contact_phone'] = $row->contact_phone;
                $returnArr[$index]['contact_message'] = $row->contact_message;
                $returnArr[$index]['department_name'] = $row->department_name;
                $returnArr[$index]['date'] =$row->date;
                $returnArr[$index]['email_subject'] = $row->email_subject;
                $returnArr[$index]['email_body'] = strip_tags($row->email_body);
                $returnArr[$index]['admin_subject'] = $row->admin_subject;
                $returnArr[$index++]['admin_body'] = strip_tags($row->admin_body);
            }
        }
        // dd($returnArr);
        return $returnArr;
    }
}
