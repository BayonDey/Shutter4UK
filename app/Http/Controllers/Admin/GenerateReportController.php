<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Band;
use App\Model\GenerateReport;
use App\Model\IpTrackingadmin;
use App\Utility;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

class GenerateReportController extends Controller
{
    public function generate_report()
    {
        // $la_bands = Band::where('deleted', 0)->orderBy('name')->get();
        // dd($la_bands);
        return view('admin.admin_manage.generate_report');
    }


    public function dn_generate_report(Request $request)
    {
        $inputs = $request->input();

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $band_id = $request->band_id;
        $band_ids = $request->band_ids;
        $order_status = $request->order_status;
        if ($request->report_type == 'admin_ip_address') {
            if (($request->start_date == null) || ($request->end_date == null)) {
                Session::flash('error', 'Please select date range.');
            } else {
                $outputArr = GenerateReport::admin_ip_address_list($start_date, $end_date);
                Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
            }
        } elseif ($request->report_type == 'product_details') {
            $outputArr = GenerateReport::product_details_list($start_date, $end_date);
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
        } elseif ($request->report_type == 'price_matrix') {
            // if (($request->start_date == null) || ($request->end_date == null)) {
            //     Session::flash('error', 'Please select date range.');
            // } else {
            $outputArr = GenerateReport::price_matrix_list($band_id);
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
            // }
        } elseif ($request->report_type == 'group_price_matrix') {
            $outputArr = GenerateReport::group_price_matrix_list($band_ids);
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
        } elseif ($request->report_type == 'product_sales_analysis') {
            if (($request->start_date == null) || ($request->end_date == null)) {
                Session::flash('error', 'Please select date range.');
            } else {
                $outputArr = GenerateReport::product_sales_analysis($start_date, $end_date);
                Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
            }
        } elseif ($request->report_type == 'product_sample') {
            $outputArr = GenerateReport::product_sample_list();
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
        } elseif ($request->report_type == 'order_details') {
            $outputArr = GenerateReport::order_details_list($start_date, $end_date, $order_status);
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
        } elseif ($request->report_type == 'samples_ordered') {
            $outputArr = GenerateReport::samples_ordered_list($start_date, $end_date);
            Utility::arrayToCSV($outputArr, $request->report_type . "_" . time());
        }


        return redirect()->route('generate_report');
        // dd($inputs);
    }
}
