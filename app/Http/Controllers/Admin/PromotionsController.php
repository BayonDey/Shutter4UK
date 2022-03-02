<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Discounts;
use App\Model\Promotions;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Model\UserPermission;
use App\Model\Supplier;
use App\Model\ProductType;
use App\Model\Band;
use App\Model\ManageContent;
use App\Model\Product;
use App\Utility;
use App\Model\GuideText;

class PromotionsController extends Controller
{
    public function promotionsList()
    {
        if (UserPermission::checkPermission('edit_promotions') > 0) {
            $promotionList = Promotions::orderBy('id', 'DESC')->get();
            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.promotions.promotion_list', ['promotionList' => $promotionList, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function promotionsCreate()
    {
        if (UserPermission::checkPermission('edit_promotions', 'add') > 0) {
            return view('admin.promotions.promotion_form');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('promotions_list');
        }
    }

    public function promotionsEdit($id)
    {
        if (UserPermission::checkPermission('edit_promotions', 'edit') > 0) {
            $promotionData = Promotions::find($id);
            return view('admin.promotions.promotion_form', ['promotionData' => $promotionData]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('promotions_list');
        }
    }

    public function promotions_store(Request $request)
    {
        $inputs = $request->input();
        if ($inputs['type'] == 'Free Delivery') {
            $inputs['x'] = '0';
        }
        // dd($inputs);
        $validate = $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'x' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'code' => 'required',
            ]
        );
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
        }

        $id = 0;
        if ($request->id == null) {

            if ($inputs['start_date'] > $inputs['end_date']) {
                Session::flash('error', 'End date must be greater than start date');
                return redirect()->route('promotions_create');
            }

            $create = Promotions::create($inputs);
            if ($create) {
                $id = $create->id;

                Session::flash('success', 'Promotion creaeted successfully');
            }
        } else {
            $id = $request->id;

            if ($inputs['start_date'] > $inputs['end_date']) {
                Session::flash('error', 'End date must be greater than start date');
                return redirect()->route('promotions_edit', $id);
            }

            $data = Promotions::find($id);
            unset($inputs['_token']);

            $update = Promotions::where('id', $id)->update($inputs);
            if ($update) {
                Session::flash('success', 'Promotion update successfully');
            }
        }

        return redirect()->route('promotions_list', ['tr' => $id]);
    }

    public function promotionsDelete($id)
    {
        if (UserPermission::checkPermission('edit_promotions', 'delete') > 0) {
            $delete = Promotions::find($id)->delete();
            if ($delete) {
                Session::flash('success', 'Promotion delete successfully');
            }
            return redirect()->route('promotions_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('promotions_list');
        }
    }


    public function extraDiscounts()
    {
        if (UserPermission::checkPermission('extra_discounts') > 0) {
            $discount_type = (isset($_GET['type'])) ? $_GET['type'] : 'active';

            if ($discount_type == 'active') {
                $discount_type_filter = '>=';
            } else {
                $discount_type_filter = '<';
            }
            $discountList = DB::table('discounts as d')
                ->join('v2_products as p', 'p.id', '=', 'd.swatch_id')
                ->join('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
                ->join('v2_categories as c', 'c.id', '=', 'p.parent_id')
                ->join('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
                ->select(
                    'd.*',
                    'p.name',
                    'p.product_type_id',
                    'p.parent_id',
                    'pt.pname as type_name',
                    'c.name as cat_name',
                    's.supplier_name',
                )->where('d.end_date', $discount_type_filter, date('Y-m-d'))->orderBy('id', 'DESC')->get();
            // dd($discountList);
            return view('admin.promotions.extra_discounts_list', [
                'discount_type' => $discount_type,
                'discountList' => $discountList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function extraDiscountsCreate()
    {
        if (UserPermission::checkPermission('extra_discounts', 'add') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $discountImages = ManageContent::whereIn('content_key', ['discount_image_1', 'discount_image_2', 'discount_image_3'])->get();
            // dd($discountImages);
            return view('admin.promotions.extra_discounts_form', [
                'discountData' => [],
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList,
                'discountImages' => $discountImages,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('extra_discounts');
        }
    }

    public function extraDiscountsEdit($id)
    {
        if (UserPermission::checkPermission('extra_discounts', 'edit') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            $discountData = Discounts::find($id);
            $discountImages = ManageContent::whereIn('content_key', ['discount_image_1', 'discount_image_2', 'discount_image_3'])->get();

            return view('admin.promotions.extra_discounts_form', [
                'discountData' => $discountData,
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList,
                'discountImages' => $discountImages,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('extra_discounts');
        }
    }

    public function extraDiscounts_store(Request $request)
    {
        $inputs = $request->all();

        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        $validate = $request->validate(
            [
                // 'x' => 'required', 
                'start' => 'required',
                'end' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'promotiontext' => 'required',
            ]
        );

        $inputs['x'] = $x = ($request->x == null) ? 0 : $request->x;
        $inputs['start'] = ($request->start == null) ? 0 : $request->start;
        $inputs['end'] = ($request->end == null) ? 0 : $request->end;
        $inputs['start_date'] = $start_date = ($request->start_date == null) ? '' : $request->start_date;
        $inputs['end_date'] = $end_date = ($request->end_date == null) ? '' : $request->end_date;
        $inputs['promotiontext'] = ($request->promotiontext == null) ? '' : $request->promotiontext;
        $inputs['fixeddiscount'] = $fixeddiscount = ($request->fixeddiscount == null) ? 0 : $request->fixeddiscount;
        // dd($inputs);
        if ($request->hasFile('promotionimgone')) {
            $inputs['promotionimgone'] = Utility::saveImage($request->file('promotionimgone'), 'discounts', 'promotionimgone');
        }
        if ($request->hasFile('promotionimgtwo')) {
            $inputs['promotionimgtwo'] = Utility::saveImage($request->file('promotionimgtwo'), 'discounts', 'promotionimgtwo');
        }
        if ($request->hasFile('promotionimgthree')) {
            $inputs['promotionimgthree'] = Utility::saveImage($request->file('promotionimgthree'), 'discounts', 'promotionimgthree');
        }
        if (($x == 0) && ($fixeddiscount == 0)) {
            Session::flash('error', "Percentage Off & Fixed Value both are 0");
        } elseif (($start_date == '') || ($end_date == '')) {
            Session::flash('error', "Please select date");
        } elseif ($start_date >= $end_date) {
            Session::flash('error', "End date must be greater than start date");
        } else {
            if ($request->id == null) {
                if ($product_ids != 0) {
                    foreach ($product_ids as $product_id) {
                        $inputs['swatch_id'] = $product_id;

                        Discounts::create($inputs);
                    }
                    Session::flash('success', "Dicsount added successfully");
                } elseif (($product_ids != 0) || ($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
                    if ($band_ids != 0) {
                        $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_ids);
                    } else {
                        $productList = GuideText::product_list_filter($supplier_id, $product_type_id);
                    }
                    foreach ($productList as $product) {
                        $inputs['swatch_id'] = $product->id;
                        Discounts::create($inputs);
                    }
                    Session::flash('success', "Dicsount added successfully");
                } else {
                    Session::flash('error', "You have not made a selection");
                }
            } else {
                $discount = Discounts::find($request->id);
                $old_promotionimgone = $discount->promotionimgone;
                $old_promotionimgtwo = $discount->promotionimgtwo;
                $old_promotionimgthree = $discount->promotionimgthree;

                unset($inputs['_token']);
                $update = Discounts::where('id', $request->id)->update($inputs);
                Session::flash('success', "Dicsount update successfully");
                if ($update) {
                    if (($old_promotionimgone != '') && ($request->hasFile('promotionimgone'))) {
                        Utility::unlinkFile($old_promotionimgone, 'discounts');
                    }
                    if (($old_promotionimgtwo != '') && ($request->hasFile('promotionimgtwo'))) {
                        Utility::unlinkFile($old_promotionimgtwo, 'discounts');
                    }
                    if (($old_promotionimgthree != '') && ($request->hasFile('promotionimgthree'))) {
                        Utility::unlinkFile($old_promotionimgthree, 'discounts');
                    }
                }
            }
        }


        return redirect()->route('extra_discounts');
    }



    public function extraDiscountsDelete($id)
    {
        if (UserPermission::checkPermission('extra_discounts', 'delete') > 0) {
            $delete = Discounts::find($id)->delete();
            if ($delete) {
                Session::flash('success', 'Discount delete successfully');
            }
            return redirect()->route('extra_discounts');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('extra_discounts');
        }
    }


    public function popup_promotion()
    {
        return view('admin.promotions.popup_promotion', ['discountList' => []]);
    }


    public function collection_promo_banner()
    {
        return view('admin.promotions.collection_promo_banner');
    }

    public function promotion_countdown()
    {
        return view('admin.promotions.promotion_countdown');
    }
}
