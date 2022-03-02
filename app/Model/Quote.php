<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'getquote_mng_tbl';
    public $timestamps = false;

    protected $fillable = [
        'ref_id', 'gq_title', 'gq_firstname', 'gq_surname', 'gq_company', 'gq_email_add',
        'gq_contact_no', 'gq_additional_info', 'department_name', 'department_url',
        'created_date', 'status', 'cust_subject', 'cust_body', 'admin_subject', 'admin_body'
    ];


    public static function quote_list($selectIds)
    {
        $la_dataList = Quote::whereIn('id', $selectIds)->get();
        $returnArr[0]['sl_no'] = 'Sl no';
        $returnArr[0]['ref_id'] = 'Ref no';
        $returnArr[0]['contact_name'] = 'Contact name';
        $returnArr[0]['gq_company'] = 'Company';
        $returnArr[0]['gq_email_add'] = 'Email';
        $returnArr[0]['gq_contact_no'] = 'Contact no';
        $returnArr[0]['gq_additional_info'] = 'Additional info';
        $returnArr[0]['department_name'] = 'Department name';
        $returnArr[0]['created_date'] = 'Date';
        $returnArr[0]['cust_subject'] = 'Cust subject';
        $returnArr[0]['cust_body'] = 'Cust body';
        $returnArr[0]['admin_subject'] = 'Admin subject';
        $returnArr[0]['admin_body'] = 'Admin body';

        $returnArr[1]['sl_no'] = ' ';
        $returnArr[1]['ref_id'] = ' ';
        $returnArr[1]['contact_name'] = ' ';
        $returnArr[1]['gq_company'] = ' ';
        $returnArr[1]['gq_email_add'] = ' ';
        $returnArr[1]['gq_contact_no'] = ' ';
        $returnArr[1]['gq_additional_info'] = ' ';
        $returnArr[1]['department_name'] = ' ';
        $returnArr[1]['created_date'] = ' ';
        $returnArr[1]['cust_subject'] = ' ';
        $returnArr[1]['cust_body'] = ' ';
        $returnArr[1]['admin_subject'] = ' ';
        $returnArr[1]['admin_body'] = ' ';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1;
                $returnArr[$index]['ref_id'] = $row->ref_id;
                $returnArr[$index]['contact_name'] = $row->gq_title . " " . $row->gq_firstname . " " . $row->gq_surname;
                $returnArr[$index]['gq_company'] = $row->gq_company;
                $returnArr[$index]['gq_email_add'] = $row->gq_email_add;
                $returnArr[$index]['gq_contact_no'] = $row->gq_contact_no;
                $returnArr[$index]['gq_additional_info'] = $row->gq_additional_info;
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
