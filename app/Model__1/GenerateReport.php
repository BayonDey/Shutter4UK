<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenerateReport extends Model
{
    public static function admin_ip_address_list($start_date, $end_date)
    {
        $la_dataList = IpTrackingadmin::whereBetween('date', [$start_date . " 00:00:00", $end_date . "23:59:59"])->get();
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['ip'] = 'Report Type: Admin ip log';
        $returnArr[0]['UserName'] = '';
        $returnArr[0]['url'] = "Date Range: $start_date - $end_date";
        $returnArr[0]['action'] = '';
        $returnArr[0]['date'] = '';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['ip'] = '';
        $returnArr[1]['UserName'] = '';
        $returnArr[1]['url'] = '';
        $returnArr[1]['action'] = '';
        $returnArr[1]['date'] = '';

        $returnArr[2]['sl_no'] = 'Sl No.';
        $returnArr[2]['ip'] = 'IP Address';
        $returnArr[2]['UserName'] = 'User Name';
        $returnArr[2]['url'] = 'Url';
        $returnArr[2]['action'] = 'Action';
        $returnArr[2]['date'] = 'Date';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = ($i + 1);
                $returnArr[$index]['ip'] = $row->ip;
                $returnArr[$index]['UserName'] = $row->UserName;
                $returnArr[$index]['url'] = $row->url;
                $returnArr[$index]['action'] = $row->action;
                $returnArr[$index++]['date'] = $row->date;
            }
        }
        // dd($returnArr);
        return $returnArr;
    }

    public static function product_details_list($start_date, $end_date)
    {
        $la_dataList = DB::table('v2_products as p')
            ->leftJoin('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
            ->leftJoin('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
            ->leftJoin('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->leftJoin('v2_band as b', 'b.id', '=', 'p.band_id')
            ->select(
                'p.id',
                'p.name',
                'p.supplied_name',
                'p.trade_percentage',
                'p.lead_time_days',
                'p.sale_end',
                'p.max_width',
                'p.max_drop',
                'p.description',
                'pt.pname as p_type_name',
                'pc.name as p_cat_name',
                'b.name as band_name',
                's.supplier_name',
            )
            ->where('p.product_type_id', '!=', 0)
            ->where('p.deleted', 0)
            ->orderBy('name')
            ->get();
        // dd($la_dataList);
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['id'] = '';
        $returnArr[0]['name'] = 'Report Type: Products List';
        $returnArr[0]['p_type_name'] = "";
        $returnArr[0]['p_cat_name'] = "";
        $returnArr[0]['band_name'] = '';
        $returnArr[0]['supplier_name'] = '';
        $returnArr[0]['supplied_name'] = '';
        // $returnArr[0]['url'] = '';
        $returnArr[0]['trade_percentage'] = '';
        $returnArr[0]['lead_time_days'] = '';
        $returnArr[0]['sale_end'] = '';
        $returnArr[0]['max_width'] = '';
        $returnArr[0]['max_drop'] = '';
        $returnArr[0]['description'] = '';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['id'] = '';
        $returnArr[1]['name'] = '';
        $returnArr[1]['p_type_name'] = '';
        $returnArr[1]['p_cat_name'] = '';
        $returnArr[1]['band_name'] = '';
        $returnArr[1]['supplier_name'] = '';
        $returnArr[1]['supplied_name'] = '';
        // $returnArr[1]['url'] = '';
        $returnArr[1]['trade_percentage'] = '';
        $returnArr[1]['lead_time_days'] = '';
        $returnArr[1]['sale_end'] = '';
        $returnArr[1]['max_width'] = '';
        $returnArr[1]['max_drop'] = '';
        $returnArr[1]['description'] = '';

        $returnArr[2]['sl_no'] = 'Sl No.';
        $returnArr[2]['id'] = 'ID';
        $returnArr[2]['name'] = 'Product Name';
        $returnArr[2]['p_type_name'] = 'Product Type';
        $returnArr[2]['p_cat_name'] = 'Product Category';
        $returnArr[2]['band_name'] = 'Band Name';
        $returnArr[2]['supplier_name'] = 'Supplier Name';
        $returnArr[2]['supplied_name'] = 'Supplied Name';
        // $returnArr[2]['url'] = 'URL';
        $returnArr[2]['trade_percentage'] = 'Trade Discount(%)';
        $returnArr[2]['lead_time_days'] = 'Lead Time(D)';
        $returnArr[2]['sale_end'] = 'Sale End';
        $returnArr[2]['max_width'] = 'Max Width';
        $returnArr[2]['max_drop'] = 'Max Drop';
        $returnArr[2]['description'] = 'Description';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = ($i + 1);
                $returnArr[$index]['id'] = $row->id;
                $returnArr[$index]['name'] = $row->name;
                $returnArr[$index]['p_type_name'] = $row->p_type_name;
                $returnArr[$index]['p_cat_name'] = $row->p_cat_name;
                $returnArr[$index]['band_name'] = $row->band_name;
                $returnArr[$index]['supplier_name'] = $row->supplier_name;
                $returnArr[$index]['supplied_name'] = $row->supplied_name;
                // $returnArr[$index]['url'] = Product::get_view_site_link($row->id, 'product');
                $returnArr[$index]['trade_percentage'] = $row->trade_percentage;
                $returnArr[$index]['lead_time_days'] = $row->lead_time_days;
                $returnArr[$index]['sale_end'] = $row->sale_end;
                $returnArr[$index]['max_width'] = $row->max_width;
                $returnArr[$index]['max_drop'] = $row->max_drop;
                $returnArr[$index++]['description'] = strip_tags($row->description);
            }
        }
        // dd($returnArr);
        return $returnArr;
    }


    public static function price_matrix_list($band_id)
    {
        $lo_band = Band::find($band_id);
        $la_dataList = DB::table('v2_product_price as pp')
            ->leftJoin('v2_option as o', 'o.option_id', '=', 'pp.option_id')
            ->select(
                'pp.*',
                'o.option_name',
            )
            ->where('pp.band_id', $band_id)
            ->orderBy('pp.price_id', 'DESC')
            ->get();
        // dd($lo_band);
        $returnArr[0]['price_id'] = '';
        $returnArr[0]['width_min'] = 'Report Type:';
        $returnArr[0]['width_max'] = "Price matrix";
        $returnArr[0]['height_min'] = '';
        $returnArr[0]['height_max'] = 'Band Name: ';
        $returnArr[0]['price'] = $lo_band->name;
        $returnArr[0]['option_name'] = '';

        $returnArr[1]['price_id'] = '';
        $returnArr[1]['width_min'] = '';
        $returnArr[1]['width_max'] = '';
        $returnArr[1]['height_min'] = '';
        $returnArr[1]['height_max'] = '';
        $returnArr[1]['price'] = '';
        $returnArr[1]['option_name'] = '';

        $returnArr[2]['price_id'] = 'Sl No.';
        $returnArr[2]['width_min'] = 'Width min';
        $returnArr[2]['width_max'] = 'Width max';
        $returnArr[2]['height_min'] = 'Height min';
        $returnArr[2]['height_max'] = 'Height max';
        $returnArr[2]['price'] = 'Price';
        $returnArr[2]['option_name'] = 'Option name';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['price_id'] = ($i + 1);
                $returnArr[$index]['width_min'] = $row->width_min;
                $returnArr[$index]['width_max'] = $row->width_max;
                $returnArr[$index]['height_min'] = $row->height_min;
                $returnArr[$index]['height_max'] = $row->height_max;
                $returnArr[$index]['price'] = $row->price;
                $returnArr[$index++]['option_name'] = $row->option_name;
            }
        }
        // dd($returnArr);
        return $returnArr;
    }

    public static function group_price_matrix_list($band_ids)
    {
        $la_dataList = DB::table('v2_product_price as pp')
            ->leftJoin('v2_band as b', 'b.id', '=', 'pp.band_id')
            ->leftJoin('v2_option as o', 'o.option_id', '=', 'pp.option_id')
            ->select(
                'pp.*',
                'b.name',
                'o.option_name',
            )
            ->whereIn('pp.band_id', $band_ids)
            ->orderBy('b.name')
            ->get();
        // dd($la_dataList);
        $returnArr[0]['price_id'] = '';
        $returnArr[0]['name'] = '';
        $returnArr[0]['width_min'] = 'Report Type:';
        $returnArr[0]['width_max'] = "Price matrix Group";
        $returnArr[0]['height_min'] = '';
        $returnArr[0]['height_max'] = '';
        $returnArr[0]['price'] = '';
        $returnArr[0]['option_name'] = '';

        $returnArr[1]['price_id'] = '';
        $returnArr[1]['name'] = '';
        $returnArr[1]['width_min'] = '';
        $returnArr[1]['width_max'] = '';
        $returnArr[1]['height_min'] = '';
        $returnArr[1]['height_max'] = '';
        $returnArr[1]['price'] = '';
        $returnArr[1]['option_name'] = '';

        $returnArr[2]['price_id'] = 'Sl No.';
        $returnArr[2]['name'] = 'Band Name';
        $returnArr[2]['width_min'] = 'Width min';
        $returnArr[2]['width_max'] = 'Width max';
        $returnArr[2]['height_min'] = 'Height min';
        $returnArr[2]['height_max'] = 'Height max';
        $returnArr[2]['price'] = 'Price';
        $returnArr[2]['option_name'] = 'Option name';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['price_id'] = ($i + 1);
                $returnArr[$index]['name'] = $row->name;
                $returnArr[$index]['width_min'] = $row->width_min;
                $returnArr[$index]['width_max'] = $row->width_max;
                $returnArr[$index]['height_min'] = $row->height_min;
                $returnArr[$index]['height_max'] = $row->height_max;
                $returnArr[$index]['price'] = $row->price;
                $returnArr[$index++]['option_name'] = $row->option_name;
            }
        }
        // dd($returnArr);
        return $returnArr;
    }

    public static function product_sales_analysis($start_date, $end_date)
    {
        $la_dataList = DB::table('v2_products as p')
            ->leftJoin('v2_band as b', 'b.id', '=', 'p.band_id')
            ->leftJoin('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
            ->leftJoin('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->join('v2_order_details as od', 'od.product_id', '=', 'p.id')
            ->leftJoin('v2_orders as o', 'o.id', '=', 'od.order_id')
            ->select(
                'p.id',
                'p.name',
                'p.supplied_name',
                'p.trade_percentage',
                'p.lead_time_days',
                'p.sale_end',
                'p.max_width',
                'p.max_drop',
                'p.description',
                'pc.name as p_cat_name',
                'b.name as band_name',
                's.supplier_name',
                'od.*',
                'o.is_sample_order',
                'o.extra_discount',
            )
            ->where('p.product_type_id', '!=', 0)
            ->where('p.deleted', 0)
            ->whereBetween('o.date', [$start_date . " 00:00:00", $end_date . " 23:59:59"])
            ->orderBy('product_name')
            ->get();
        // dd($la_dataList);
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['name'] = 'Report Type: ';
        $returnArr[0]['p_type_name'] = "Product sales analysis";
        $returnArr[0]['p_cat_name'] = "";
        $returnArr[0]['band_name'] = "Date Range: $start_date - $end_date";
        $returnArr[0]['supplier_name'] = '';
        $returnArr[0]['supplied_name'] = '';
        $returnArr[0]['trade_percentage'] = '';
        $returnArr[0]['lead_time_days'] = '';
        $returnArr[0]['sale_end'] = '';
        $returnArr[0]['max_width'] = '';
        $returnArr[0]['max_drop'] = '';
        $returnArr[0]['net_sale'] = ' ';
        $returnArr[0]['net_cost'] =  '';
        $returnArr[0]['extra_discount'] = ' ';
        $returnArr[0]['is_sample_order'] = ' ';


        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['name'] = '';
        $returnArr[1]['p_type_name'] = '';
        $returnArr[1]['p_cat_name'] = '';
        $returnArr[1]['band_name'] = '';
        $returnArr[1]['supplier_name'] = '';
        $returnArr[1]['supplied_name'] = '';
        $returnArr[1]['trade_percentage'] = '';
        $returnArr[1]['lead_time_days'] = '';
        $returnArr[1]['sale_end'] = '';
        $returnArr[1]['max_width'] = '';
        $returnArr[1]['max_drop'] = '';
        $returnArr[1]['net_sale'] = ' ';
        $returnArr[1]['net_cost'] =  '';
        $returnArr[1]['extra_discount'] = ' ';
        $returnArr[1]['is_sample_order'] = ' ';

        $returnArr[2]['sl_no'] = 'Sl No.';
        $returnArr[2]['name'] = 'Product Name';
        $returnArr[2]['p_type_name'] = 'Product Type';
        $returnArr[2]['p_cat_name'] = 'Product Category';
        $returnArr[2]['band_name'] = 'Band Name';
        $returnArr[2]['supplier_name'] = 'Supplier Name';
        $returnArr[2]['supplied_name'] = 'Supplied Name';
        $returnArr[2]['trade_percentage'] = 'Trade Discount(%)';
        $returnArr[2]['lead_time_days'] = 'Lead Time(D)';
        $returnArr[2]['sale_end'] = 'Sale End';
        $returnArr[2]['max_width'] = 'Max Width';
        $returnArr[2]['max_drop'] = 'Max Drop';
        $returnArr[2]['net_sale'] = 'Net Sale';
        $returnArr[2]['net_cost'] = 'Net Cost';
        $returnArr[2]['extra_discount'] = 'Extra Discount';
        $returnArr[2]['is_sample_order'] = 'Sample';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = ($i + 1);
                $returnArr[$index]['name'] = $row->product_name;
                $returnArr[$index]['p_type_name'] = $row->product_type_name;
                $returnArr[$index]['p_cat_name'] = $row->p_cat_name;
                $returnArr[$index]['band_name'] = $row->band_name;
                $returnArr[$index]['supplier_name'] = $row->supplier_name;
                $returnArr[$index]['supplied_name'] = $row->supplied_name;
                $returnArr[$index]['trade_percentage'] = $row->trade_percentage;
                $returnArr[$index]['lead_time_days'] = $row->lead_time_days;
                $returnArr[$index]['sale_end'] = $row->sale_end;
                $returnArr[$index]['max_width'] = $row->max_width;
                $returnArr[$index]['max_drop'] = $row->max_drop;
                $returnArr[$index]['net_sale'] = ($row->final_price / 1.2);
                $returnArr[$index]['net_cost'] = $row->trade_price;
                $returnArr[$index]['extra_discount'] = $row->extra_discount;
                $returnArr[$index++]['is_sample_order'] = $row->is_sample_order;
            }
        }
        // dd($returnArr);
        return $returnArr;
    }


    public static function product_sample_list()
    {
        $la_dataList = DB::table('v2_products as p')
            ->leftJoin('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
            ->leftJoin('v2_band as b', 'b.id', '=', 'p.band_id')
            ->leftJoin('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
            ->leftJoin('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->select(
                'p.id',
                'p.name',
                'p.supplied_name',
                'p.allow_samples',
                'pt.pname as p_type_name',
                'pc.name as p_cat_name',
                'b.name as band_name',
                's.supplier_name'
            )
            ->where('p.product_type_id', '!=', 0)
            ->where('p.deleted', 0)
            ->orderBy('p.name')
            ->get();
        // dd($la_dataList);
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['name'] = 'Report Type: ';
        $returnArr[0]['p_type_name'] = "Product Sample";
        $returnArr[0]['p_cat_name'] = "";
        $returnArr[0]['band_name'] = "";
        $returnArr[0]['supplier_name'] = '';
        $returnArr[0]['supplied_name'] = '';
        $returnArr[0]['is_sample_order'] = ' ';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['name'] = '';
        $returnArr[1]['p_type_name'] = "";
        $returnArr[1]['p_cat_name'] = "";
        $returnArr[1]['band_name'] = "";
        $returnArr[1]['supplier_name'] = '';
        $returnArr[1]['supplied_name'] = '';
        $returnArr[1]['is_sample_order'] = ' ';

        $returnArr[2]['sl_no'] = 'SL No.';
        $returnArr[2]['name'] = 'Product Name';
        $returnArr[2]['p_type_name'] = "Product Type";
        $returnArr[2]['p_cat_name'] = "Product Category";
        $returnArr[2]['band_name'] = "Band Name";
        $returnArr[2]['supplier_name'] = 'Supplier Name';
        $returnArr[2]['supplied_name'] = 'Supplied Name';
        $returnArr[2]['is_sample_order'] = 'Sample Order';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1;
                $returnArr[$index]['name'] = $row->name;
                $returnArr[$index]['p_type_name'] = $row->p_type_name;
                $returnArr[$index]['p_cat_name'] = $row->p_cat_name;
                $returnArr[$index]['band_name'] =  $row->band_name;
                $returnArr[$index]['supplier_name'] =  $row->supplier_name;
                $returnArr[$index]['supplied_name'] = $row->supplied_name;
                $returnArr[$index++]['is_sample_order'] = ($row->allow_samples == 'y') ? 'Yes' : 'No';
            }
        }
        return $returnArr;
    }

    public static function order_details_list($start_date, $end_date, $order_status)
    {
        if ($order_status != 'all') {
            $la_dataList = DB::table('v2_orders as o')
                ->join('v2_order_details as od', 'od.order_id', '=', 'o.id')
                ->select(
                    'o.*',
                    'od.trade_price AS total_trade_price',
                    'od.retail_price AS total_retail_price'
                )
                ->where('o.delete', 0)
                ->whereBetween('o.date', [$start_date . " 00:00:00", $end_date . " 23:59:59"])
                ->where('o.status', $order_status)->get();
        } else {
            $la_dataList = DB::table('v2_orders as o')
                ->join('v2_order_details as od', 'od.order_id', '=', 'o.id')
                ->select(
                    'o.*',
                    'od.trade_price AS total_trade_price',
                    'od.retail_price AS total_retail_price'
                )
                ->where('o.delete', 0)
                ->whereBetween('o.date', [$start_date . " 00:00:00", $end_date . " 23:59:59"])->get();
        }

        // dd($la_dataList);
        $returnArr[0]['sl_no'] = '';
        $returnArr[0]['Order_Number'] = 'Report Type: ';
        $returnArr[0]['Order_Date'] = "Order Details List";
        $returnArr[0]['Is_Sample_Order'] = "";
        $returnArr[0]['Invoice_Number'] = "";
        $returnArr[0]['Name'] = '';
        $returnArr[0]['Billing_Address'] = '';
        $returnArr[0]['Shipping_Address'] = ' ';
        $returnArr[0]['Type'] = ' ';
        $returnArr[0]['Total_Trade_Price'] = ' ';
        $returnArr[0]['Total_Goods_Price'] = ' ';
        $returnArr[0]['sale_discount'] = ' ';
        $returnArr[0]['Promotion_Discount'] = ' ';
        $returnArr[0]['Delivery_Type'] = ' ';
        $returnArr[0]['Delivery_Price'] = ' ';
        $returnArr[0]['VAT_Percentage'] = ' ';
        $returnArr[0]['Total_Price'] = ' ';


        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['Order_Number'] = '';
        $returnArr[1]['Order_Date'] = "";
        $returnArr[1]['Is_Sample_Order'] = "";
        $returnArr[1]['Invoice_Number'] = "";
        $returnArr[1]['Name'] = '';
        $returnArr[1]['Billing_Address'] = '';
        $returnArr[1]['Shipping_Address'] = ' ';
        $returnArr[1]['Type'] = ' ';
        $returnArr[1]['Total_Trade_Price'] = ' ';
        $returnArr[1]['Total_Goods_Price'] = ' ';
        $returnArr[1]['sale_discount'] = ' ';
        $returnArr[1]['Promotion_Discount'] = ' ';
        $returnArr[1]['Delivery_Type'] = ' ';
        $returnArr[1]['Delivery_Price'] = ' ';
        $returnArr[1]['VAT_Percentage'] = ' ';
        $returnArr[1]['Total_Price'] = ' ';


        $returnArr[2]['sl_no'] = 'Sl No.';
        $returnArr[2]['Order_Number'] = 'Order Number';
        $returnArr[2]['Order_Date'] = "Order Date";
        $returnArr[2]['Is_Sample_Order'] = "Is Sample Order?";
        $returnArr[2]['Invoice_Number'] = "Invoice Number";
        $returnArr[2]['Name'] = 'Name';
        $returnArr[2]['Billing_Address'] = 'Billing Address';
        $returnArr[2]['Shipping_Address'] = 'Shipping Address';
        $returnArr[2]['Type'] = 'Type';
        $returnArr[2]['Total_Trade_Price'] = 'Total Trade Price';
        $returnArr[2]['Total_Goods_Price'] = 'Total Goods Price';
        $returnArr[2]['sale_discount'] = 'Sale discount';
        $returnArr[2]['Promotion_Discount'] = 'Promotion Discount';
        $returnArr[2]['Delivery_Type'] = 'Delivery Type';
        $returnArr[2]['Delivery_Price'] = 'Delivery Price';
        $returnArr[2]['VAT_Percentage'] = 'VAT Percentage';
        $returnArr[2]['Total_Price'] = 'Total Price';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1;
                $returnArr[$index]['Order_Number'] = $row->id;
                $returnArr[$index]['Order_Date'] = $row->date;
                $returnArr[$index]['Is_Sample_Order'] = $row->is_sample_order;
                $returnArr[$index]['Invoice_Number'] =  $row->invoice_number;
                $returnArr[$index]['Name'] =  "$row->b_title $row->b_firstname  $row->b_lastname  ";
                $returnArr[$index]['Billing_Address'] = $row->b_address1;
                $returnArr[$index]['Shipping_Address'] = $row->s_address1;
                $returnArr[$index]['Type'] = $row->type;
                $returnArr[$index]['Total_Trade_Price'] = $row->total_trade_price;
                $returnArr[$index]['Total_Goods_Price'] = $row->total_retail_price;
                $returnArr[$index]['sale_discount'] = $row->sale_discount;
                $returnArr[$index]['Promotion_Discount'] = $row->promotion_discount;
                $returnArr[$index]['Delivery_Type'] = $row->delivery_type;
                $returnArr[$index]['Delivery_Price'] = $row->delivery_price;
                $returnArr[$index]['VAT_Percentage'] = $row->VAT_percentage;
                $returnArr[$index++]['Total_Price'] = $row->total_price;
            }
        }
        // dd($la_dataList);
        return $returnArr;
    }


    public static function samples_ordered_list($start_date, $end_date)
    {
        DB::statement("SET SQL_MODE=''");
        $la_dataList = DB::table('v2_products as p')
            ->leftJoin('v2_order_details as od', 'od.product_id', '=', 'p.id')
            ->leftJoin('v2_orders as o', 'o.id', '=', 'od.order_id')
            ->leftJoin('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
            ->leftJoin('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
            ->leftJoin('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->leftJoin('v2_band as b', 'b.id', '=', 'p.band_id')
            ->select(
                'p.name',
                // 'o.*',
                'p.supplied_name',
                'pt.pname as p_type_name',
                'pc.name as p_cat_name',
                'b.name as band_name',
                's.supplier_name',
                DB::raw('COUNT(od.product_id) as total_sample')
            )
            ->whereBetween('o.date', [$start_date . " 00:00:00", $end_date . " 23:59:59"])
            ->where('o.is_sample_order', 1)
            // ->where('p.deleted', 0)
            ->orderBy('p.name')
            ->groupBy('od.product_id')
            ->get();

        // dd($la_dataList);
        $returnArr[0]['sl_no'] = ''; 
        $returnArr[0]['name'] = "Report Type: ";
        $returnArr[0]['p_type_name'] = "Order Sample";
        $returnArr[0]['p_cat_name'] = '';
        $returnArr[0]['band_name'] = 'Date Range: ';
        $returnArr[0]['supplier_name'] = "$start_date - $end_date";
        $returnArr[0]['supplied_name'] = '';
        $returnArr[0]['sample_order'] = ' ';

        $returnArr[1]['sl_no'] = '';
        $returnArr[1]['name'] = '';
        $returnArr[1]['p_type_name'] = '';
        $returnArr[1]['p_type_name'] = "";
        $returnArr[1]['p_cat_name'] = "";
        $returnArr[1]['band_name'] = "";
        $returnArr[1]['supplier_name'] = '';
        $returnArr[1]['supplied_name'] = '';
        $returnArr[1]['sample_order'] = ' ';

        $returnArr[2]['sl_no'] = 'SL No.'; 
        $returnArr[2]['name'] = "Product Name";
        $returnArr[2]['p_type_name'] = "Product Type";
        $returnArr[2]['p_cat_name'] = "Product Category";
        $returnArr[2]['band_name'] = "Band Name";
        $returnArr[2]['supplier_name'] = 'Supplier Name';
        $returnArr[2]['supplied_name'] = 'Supplied Name';
        $returnArr[2]['sample_order'] = 'Sample Order';

        if (count($la_dataList) > 0) {
            $index = 3;
            foreach ($la_dataList as $i => $row) {
                $returnArr[$index]['sl_no'] = $i + 1; 
                $returnArr[$index]['name'] = $row->name;
                $returnArr[$index]['p_type_name'] = $row->p_type_name;
                $returnArr[$index]['p_cat_name'] = $row->p_cat_name;
                $returnArr[$index]['band_name'] =  $row->band_name;
                $returnArr[$index]['supplier_name'] =  $row->supplier_name;
                $returnArr[$index]['supplied_name'] = $row->supplied_name;
                $returnArr[$index++]['sample_order'] = $row->total_sample;
            }
        }
        return $returnArr;
    }
}
