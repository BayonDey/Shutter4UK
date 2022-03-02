<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ManageContent;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\StandardEmails;
use App\Model\Supplier;

class OrderController extends Controller
{
    public function getOrderList(Request $request)
    {
        $status = ($request->st != '') ? $request->st : "New";
        $orderList = Order::where('delete', 0)->where('is_sample_order', 0)->where('status', $status)->get();
        $standard_emails = StandardEmails::orderBy('template_name')->get();
        // dd($request->st);
        return view('admin.order.order_list', [
            'orderList' => $orderList,
            'status' => $status,
            'standard_emails' => $standard_emails,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }

    public function getOrderDetails($id)
    {
        $order = Order::find($id);
        $orderDetails = DB::table('v2_products as p')
            ->leftJoin('v2_order_details as od', 'od.product_id', '=', 'p.id')
            ->leftJoin('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
            ->leftJoin('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
            ->leftJoin('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->leftJoin('v2_band as b', 'b.id', '=', 'p.band_id')
            ->select(
                'p.name',
                'p.image_name',
                'p.supplied_name',
                'p.max_width',
                'p.max_drop',
                'p.description',
                'pt.pname as p_type_name',
                'pc.name as p_cat_name',
                'b.name as band_name',
                's.supplier_name',
                'od.product_id',
                'od.order_id',
                'od.trade_price',
                'od.sale_discount',
                'od.retail_price',
                'od.express_delivery',
                'od.status',
            )->where('od.order_id', $id)
            ->get();
        // dd($orderDetails);
        return view('admin.order.order_details', [
            'order' => $order,
            'orderDetails' => $orderDetails,
        ]);
    }

    public function updateOrderAddress(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);

        $update = Order::where('id', $request->id)->update($inputs);
        if ($update) {
            Session::flash('success', 'Address Update successfully');
        }

        return redirect()->route('order_details', $request->id);
    }

    public function updateOrderCancel($id)
    {
        $page = (isset($_GET['page']) && (($_GET['page'] != ''))) ? $_GET['page'] : 'order';
        $supplierId = (isset($_GET['supplierId']) && (($_GET['supplierId'] != 0))) ? $_GET['supplierId'] : 0;
        $orderData =  Order::find($id);

        $update = Order::where('id', $id)->update(['status' => 'Cancelled']);
        if ($update) {
            Session::flash('success', 'Order cancelled successfully');
        }
        if ($page == 'order') {
            return redirect()->route('order_list', ['st' => 'Cancelled', 'tr' => $id]);
        } elseif ($page == 'sample') {
            return redirect()->route('order_sample', ['st' => 'Cancelled', 'tr' => $id]);
        } elseif ($page == 'supplier_sample') {
            return redirect()->route('supplier_order_sample', ['st' => $orderData->status, 'supplierId' => $supplierId]);
        }
    }

    public function updateOrderStatus(Request $request)
    {
        $update = Order::where('id', $request->id)->update(['status' => $request->status]);
        if ($update) {
            Session::flash('success', 'Update status successfully');
        }
        return redirect()->route('order_details', $request->id);
    }

    public function updateOrderStatus_multiple(Request $request) // Use for change status && Generate pdf
    {
        $inputs = $request->input();

        $page = (isset($request->page) && (($request->page != ''))) ? $request->page : 'order';
        $supplierId = (isset($request->supplierId) && (($request->supplierId != 0))) ? $request->supplierId : 0;

        if ($request->generate_pdf == 'generate_pdf') {
            if (isset($request->checkbox_order) && (count($request->checkbox_order) > 0)) {
                $orderIds = $request->checkbox_order;
                $contentDetails = ManageContent::get_content_data(['contact_email', 'contact_no', 'contact_address']);
                $data['contentDetails'] = $contentDetails;

                if ($page == 'order') {
                    $orders = Order::whereIn('id', $orderIds)->get();
                    // dd($contentDetails);
                    $data['orders'] = $orders;
                    $pdf = PDF::loadView('admin.order.order_list_pdf', $data);
                    return $pdf->download(time() . '_order.pdf');
                } elseif ($page == 'sample') { // Sample order
                    $orders = Order::whereIn('id', $orderIds)->get();
                    // dd($orders);
                    $data['orders'] = $orders;
                    $pdf = PDF::loadView('admin.order.order_sample_pdf', $data);
                    return $pdf->download(time() . '_order_sample.pdf');
                } elseif ($page == 'supplier_sample') { // Supplier Sample order
                    $orders = Order::whereIn('id', $orderIds)->get();

                    $data['orders'] = $orders;
                    // dd($data);
                    $pdf = PDF::loadView('admin.order.supplier_order_sample_pdf', $data);
                    return $pdf->download(time() . '_supplier_sample.pdf');
                }
            }
        } else {
            if ($request->status_top == '') {
                Session::flash('error', 'Status not selected');
            } elseif (($request->status_top != '') && (isset($request->checkbox_order))) {
                $update = Order::whereIn('id', $request->checkbox_order)->update(['status' => $request->status_top]);
                if ($update) {
                    Session::flash('success', 'Update status successfully');
                }
            } else {
                Session::flash('error', 'Please select order');
            }
            if ($page == 'order') {
                return redirect()->route('order_list', ['st' => $request->status_top]);
            } elseif ($page == 'sample') {
                return redirect()->route('order_sample', ['st' => $request->status_top]);
            } elseif ($page == 'supplier_sample') {
                return redirect()->route('supplier_order_sample', ['st' => $request->status_top, 'supplierId' => $supplierId]);
            }
        }
    }

    public function orderDeleteAndRestore($id)
    {
        $page = (isset($_GET['page']) && (($_GET['page'] != ''))) ? $_GET['page'] : 'order';
        $supplierId = (isset($_GET['supplierId']) && (($_GET['supplierId'] != 0))) ? $_GET['supplierId'] : 0;

        $order = Order::find($id);
        $deleteVal = ($order->delete == 1) ? 0 : 1;
        $update = Order::where('id', $id)->update(['delete' => $deleteVal]);
        if ($update) {
            Session::flash('success', 'Deleted successfully');
        }
        if ($page == 'order') {
            return redirect()->route('order_list', ['st' => $order->status, 'tr' => $id]);
        } elseif ($page == 'sample') {
            return redirect()->route('order_sample', ['st' => $order->status, 'tr' => $id]);
        } elseif ($page == 'supplier_sample') {
            return redirect()->route('supplier_order_sample', ['st' => $order->status, 'supplierId' => $supplierId]);
        }
    }


    // public function generateOrderPDF(Request $request)
    // {
    //     $orderIds = $request->orderIds;
    //     // $orders = Order::whereIn('id', $orderIds)->get();
    //     // $contactDetails = ManageContent::whereIn('content_key', ['contact_email', 'contact_no', 'contact_address'])->get();
    //     // dd($contactDetails);

    //     $data = [
    //         'title' => 'Welcome to ItSolutionStuff.com',
    //         'date' => date('m/d/Y')
    //     ];
    //     // dd('ok');
    //     $pdf = PDF::loadView('admin.order.order_list_pdf', $data);

    //     return $pdf->download('itsolutionstuff.pdf');
    // }


    public function  OrderPDF(Request $request) // used only for view structure
    {
        // $pdf = PDF::loadView('admin.order.order_list_pdf', []);
        // return $pdf->download('itsolutionstuff.pdf');
        return view('admin.order.order_list_pdf', []);
    }



    public function order_sample()
    {
        $status = (isset($_GET['st']) && ($_GET['st'] != '')) ? $_GET['st'] : 'New';
        $orderList = Order::where('delete', 0)->where('is_sample_order', 1)->where('status', $status)->get();
        $standard_emails = StandardEmails::orderBy('template_name')->get();
        // dd($status);
        return view('admin.order.order_sample', [
            'orderList' => $orderList,
            'status' => $status,
            'standard_emails' => $standard_emails,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }


    public function sampleOrderPDF(Request $request)
    {
        // $orderIds = $request->orderIds;
        // // $orders = Order::whereIn('id', $orderIds)->get();
        // // $contactDetails = ManageContent::whereIn('content_key', ['contact_email', 'contact_no', 'contact_address'])->get();
        // // dd($contactDetails);
        // $data = [
        //     // 'orders' => $orders,
        //     // 'contactDetails' => $contactDetails
        // ];

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        dd($data);
        $pdf = PDF::loadView('admin.order.order_sample_pdf', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

    public function supplier_order_sample()
    {
        $suppliers = Supplier::where('is_delete', '0')->get();
        $supplierId = $suppliers[0]->supplier_id;
        $status = (isset($_GET['st']) && ($_GET['st'] != '')) ? $_GET['st'] : 'Incomplete';
        $supplierId = (isset($_GET['supplierId']) && ($_GET['supplierId'] > 0)) ? $_GET['supplierId'] : $supplierId;
        $orderList =   DB::table('v2_orders as o')
            ->join('v2_order_details as od', 'od.order_id', '=', 'o.id')
            ->select(
                'o.id',
                'o.user_id',
                'o.date',
                'o.invoice_number',
                'o.b_title',
                'o.b_firstname',
                'o.b_lastname',
                'o.total_price',
                'o.status',
            )
            ->where('o.status', $status)
            ->where('o.is_sample_order', 1)
            ->where('o.delete', '0')
            ->where('od.supplier_id', $supplierId)
            ->distinct('o.id')
            ->orderBy('o.id', 'DESC')
            ->get();
        $standard_emails = StandardEmails::orderBy('template_name')->get();

        // dd($orderList);
        return view('admin.order.supplier_order_sample', [
            'suppliers' => $suppliers,
            'supplierId' => $supplierId,
            'orderList' => $orderList,
            'status' => $status,
            'standard_emails' => $standard_emails,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }


    public function createManualOrder()
    {
        return view('admin.order.create_manual_order');
    }
    public function createManualQuote()
    {
        return view('admin.order.create_manual_quote');
    }
}
