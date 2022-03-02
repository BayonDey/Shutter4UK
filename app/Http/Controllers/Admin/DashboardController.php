<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Band;
use App\Model\Department;
use App\Model\DepartmentProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Model\Product;
use App\Model\Order;
use App\Model\ProductType;
use App\Model\Supplier;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminDashboard()
    {

        $product_types = [];
        $suppliers = [];

        $data = [];
        $data['li_user'] = $li_user = User::select('id')->where('access_group', 'Buyer')->count();
        $data['li_product'] = DepartmentProduct::select('id')->where('status', '1')->count();
        $data['li_order'] = $li_order = Order::select('id')->where('delete', 0)->count();
        $data['li_department'] = Department::select('id')->count();
        $start = microtime(true);

        $data['order_no']['o_New'] = 0;
        $data['order_no']['o_Complete'] = 0;
        $data['order_no']['o_Incomplete'] = 0;
        $data['order_no']['o_Failed'] = 0;
        $data['order_no']['o_Cancelled'] = 0;
        $data['order_no']['o_Quote'] = 0;
        $data['order_no']['o_Refunded'] = 0;
        $data['order_no']['o_Unpaid'] = 0;

        $all_count = DB::select("SELECT COUNT(o.id) as order_count, o.status FROM v2_orders as o WHERE o.delete = 0 GROUP BY o.status");
        foreach ($all_count as $row) {
            if ($row->status == 'New') {
                $data['order_no']['o_New'] = $row->order_count;
            } elseif ($row->status == 'Complete') {
                $data['order_no']['o_Complete'] = $row->order_count;
            } elseif ($row->status == 'Incomplete') {
                $data['order_no']['o_Incomplete'] = $row->order_count;
            } elseif ($row->status == 'Failed') {
                $data['order_no']['o_Failed'] = $row->order_count;
            } elseif ($row->status == 'Cancelled') {
                $data['order_no']['o_Cancelled'] = $row->order_count;
            } elseif ($row->status == 'Quote') {
                $data['order_no']['o_Quote'] = $row->order_count;
            } elseif ($row->status == 'Refunded') {
                $data['order_no']['o_Refunded'] = $row->order_count;
            } elseif ($row->status == 'Unpaid') {
                $data['order_no']['o_Unpaid'] = $row->order_count;
            }
        }
        $time = microtime(true) - $start;
        // dd($all_count);

        $countSaleReport = DB::select("SELECT date_format(date, '%Y-%m') as order_date, count(o.id) as order_no 
        FROM v2_orders as o 
        --  WHERE o.delete = 0 
         GROUP BY order_date ORDER BY order_date DESC LIMIT 0,12");
       $saleRepMonthList = $saleRepOrderList = [];
       foreach($countSaleReport as $row){
           $saleRepMonthList[] = date('M Y', strtotime($row->order_date));
           $saleRepOrderList[] = $row->order_no;
       }
       $data['saleRepMonthList'] = json_encode($saleRepMonthList);
       $data['saleRepOrderList'] = json_encode($saleRepOrderList);
        // dd($saleRepMonthList);

        $data['product_types'] = $product_types;
        $data['suppliers'] = $suppliers;
        return view('admin.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
