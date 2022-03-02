<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Model\UserPermission;
use App\Model\Supplier;
use App\Model\ProductType;
use App\Model\Band;
use App\Model\Product;
use App\Model\GuideText;


class DiscountController extends Controller
{

    public function assign_discount_product()
    {
        if (UserPermission::checkPermission('assign_product_discount') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            return view('admin.discout_matrix.assign_discount_product', [
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function assign_discount_product_save(Request $request)
    {
        $inputs = $request->input();
        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        $percentage_off = $request->percentage_off;
        $discount_start = $request->discount_start;
        $discount_end = $request->discount_end;
        if ($percentage_off == 0) {
            Session::flash('error', "Percentage Off must be greater than 0");
        } elseif (($discount_start == '') || ($discount_end == '')) {
            Session::flash('error', "Please select date");
        } elseif ($discount_start >= $discount_end) {
            Session::flash('error', "End date must be greater than start date");
        } else {
            if ($product_ids != 0) {

                foreach ($product_ids as $product_id) {
                    $fields = [
                        'x' => $request->percentage_off,
                        'start_date' => $request->discount_start,
                        'end_date' => $request->discount_end,
                    ];

                    Product::where('id', $product_id)->update($fields);
                }
                Session::flash('success', "Update successfully");
            } elseif (($product_ids != 0) || ($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
                if ($band_ids != 0) {
                    $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_ids);
                } else {
                    $productList = GuideText::product_list_filter($supplier_id, $product_type_id);
                }
                // dd($productList);
                foreach ($productList as $product) {
                    $fields = [
                        'x' => $request->percentage_off,
                        'start_date' => $request->discount_start,
                        'end_date' => $request->discount_end,
                    ];

                    Product::where('id', $product->id)->update($fields);
                }
                Session::flash('success', "Update successfully");
            } else {
                Session::flash('error', "You have not made a selection");
            }
        }


        return redirect()->route('assign_discount_product');
    }


    public function discount_product_list()
    {
        if (UserPermission::checkPermission('discount_product_list') > 0) {
            $productList = DB::table('v2_products as p')
                ->join('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
                ->join('v2_categories as pc', 'pc.id', '=', 'p.parent_id')
                ->join('suppliers as s', 'p.supplier_id', '=', 's.supplier_id')

                ->select(
                    'p.id',
                    'p.name',
                    'p.parent_id',
                    'p.supplier_id',
                    'p.image_name',
                    'p.product_type_id',
                    'p.x',
                    'p.start_date',
                    'p.end_date',
                    'pt.pname as product_type_name',
                    'pc.name as category_name',
                    's.supplier_name as supplier_name'
                )
                ->where('p.x', '>', '0')
                // ->where('p.start_date', '<=', date('Y-m-d'))
                ->where('p.end_date', '>=', date('Y-m-d'))
                ->where('p.deleted', '0')
                ->where('p.promote_to_front', 't')
                ->where('pt.promote_to_front', 't')
                ->where('pc.promote_to_front', 't')
                ->where(
                    function ($query) {
                        return $query
                            ->where('pt.op_extra_promo_code',  'Y')
                            ->orWhere('pc.op_extra_promo_code',  'Y');
                    }
                )

                ->orderBy('pt.pname')
                ->get();
            // dd($productList);

            return view('admin.discout_matrix.discount_product_list', ['productList' => $productList]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function delete_discount_product(Request $request)
    {
        $inputs = $request->input();

        if (count($request->proIds) == 0) {
            Session::flash('error', 'Product not selected');
        } else {
            $update = Product::whereIn('id', $request->proIds)->update(['x' => 0, 'start_date' => '1970-01-01', 'end_date' => '1970-01-01']);

            if ($update) {
                Session::flash('success', "Delete discount successfully");
            } else {
                Session::flash('error', "Something wrong");
            }
        }
        echo 1;
        // return redirect()->route('discount_product_list');
    }
}
