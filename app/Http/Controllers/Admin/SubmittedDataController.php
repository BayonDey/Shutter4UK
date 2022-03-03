<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use PDF;
use App\Model\Appointment;
use App\Model\Contactus;
use App\Model\Quote;
use App\Utility;
use Illuminate\Http\Request;

class SubmittedDataController extends Controller
{
    public function appointment_list()
    {
        $appointments = Appointment::get();
        return view('admin.submitted_data.appointment_list', [
            'appointments' => $appointments,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }

    public function appointment_details($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.submitted_data.appointment_details', [
            'appointment' => $appointment,
        ]);
    }

    public function quote_list()
    {
        $quotes = Quote::get();
        return view('admin.submitted_data.quote_list', ['quotes' => $quotes]);
    }

    public function quote_details($id)
    {
        $quote = Quote::find($id);
        return view('admin.submitted_data.quote_details', [
            'quote' => $quote,
        ]);
    }
    public function contactus_list()
    {
        $Contactus = Contactus::get();
        return view('admin.submitted_data.contactus_list', ['Contactus' => $Contactus]);
    }

    public function contactus_details($id)
    {
        $dataRow = Contactus::find($id);
        return view('admin.submitted_data.contactus_details', [
            'dataRow' => $dataRow,
        ]);
    }

    public function generate_csv_submitted(Request $request)
    {
        $inputs = $request->input();
        $selectIds = $request->selectIds;
        if (count($selectIds) > 0) {
            if ($request->csv_type == 'contact_us') {
                $returnArr = Contactus::contactus_details_list($selectIds);
            } elseif ($request->csv_type == 'appointments') {
                $returnArr = Appointment::appointment_details_list($selectIds);
            } elseif ($request->csv_type == 'quotes') {
                $returnArr = Quote::quote_list($selectIds);
            }
            Utility::arrayToCSV($returnArr, $request->csv_type . "_" . time());
        }
    }

    public function generate_pdf_single($flag, $id)
    {
        if ($flag == 'appointment') {
            $appointment = Appointment::find($id);
            // dd($appointment);
            $pdf = PDF::loadView('admin.submitted_data.single_appointment_pdf', ['appointment' => $appointment]);
            return $pdf->download(time() . '_order.pdf');
        } elseif ($flag == 'contact_us') {
            $dataRow = Contactus::find($id);
            $pdf = PDF::loadView('admin.submitted_data.single_contactus_pdf',['dataRow'=>$dataRow]);
            return $pdf->download(time() . '_contact.pdf');
        } elseif ($flag == 'quote') {
            $quote = Quote::find($id);
            $pdf = PDF::loadView('admin.submitted_data.single_quote_pdf', ['quote' => $quote]);
            return $pdf->download(time() . '_quotes.pdf');
        }
    }
}
