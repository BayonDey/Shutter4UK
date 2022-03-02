<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Model\ProductFilter;
use App\Utility;
use App\Model\UserPermission;
use App\Model\Supplier;
use App\Model\ProductType;
use App\Model\Band;
use App\Model\Product;
use App\Model\GuideText;

class ProductFilterController extends Controller
{

  public function product_filters()
  {
    if (UserPermission::checkPermission('create_filters') > 0) {

      $pFilterColor = ProductFilter::where('type_id', 1)->orderBy('name')->get();
      $pFilterFeatures = ProductFilter::where('type_id', 2)->orderBy('name')->get();
      $pFilterBuy = ProductFilter::where('type_id', 3)->orderBy('name')->get();

      $dataRow = [];
      if (isset($_GET['id'])) {
        $dataRow = ProductFilter::find($_GET['id']);
      }

      $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

      return view('admin.filters.filter_list', [
        'filters' => [],
        'dataRow' => $dataRow,
        'pFilterColor' => $pFilterColor,
        'pFilterFeatures' => $pFilterFeatures,
        'pFilterBuy' => $pFilterBuy,
        'activeTR' => $activeTR,
      ]);
    } else {
      Session::flash('error', 'Access deny! Please contact with Super Admin.');
      return redirect()->route('dashboard');
    }
  }

  public function product_filter_save(Request $request)
  {
    $inputs = $request->input();
    $id = $request->id;
    $validate = $request->validate(
      [
        'type_id' => 'required',
        'name' => 'required',
      ]
    );

    if ($request->hasFile('image')) {
      $inputs['image'] = Utility::saveImage($request->file('image'), 'v3_product_filters', 'image');
    }

    if ($request->id == null) {
      if (UserPermission::checkPermission('create_filters', 'add') > 0) {

        $create = ProductFilter::create($inputs);
        if ($create) {
          $id = $create->id;

          Session::flash('success', 'Filter created successfully');
        }
      } else {
        Session::flash('error', 'Access deny! Please contact with Super Admin.');
        return redirect()->route('product_filters');
      }
    } else {
      $id = $request->id;
      if (UserPermission::checkPermission('create_filters', 'edit') > 0) {

        $ProductFilter = ProductFilter::find($id);
        $old_image = $ProductFilter->image;
        unset($inputs['_token']);

        $update = ProductFilter::where('id', $request->id)->update($inputs);
        if ($update) {
          if (($old_image != '') && ($request->hasFile('image'))) {
            Utility::unlinkFile($ProductFilter->image, 'v3_product_filters');
          }
          Session::flash('success', 'Filter update successfully');
        }
      } else {
        Session::flash('error', 'Access deny! Please contact with Super Admin.');
        return redirect()->route('product_filters');
      }
    }
    return redirect()->route('product_filters', ['tr' => $id]);
  }

  public function product_filters_delete($id)
  {
    if (UserPermission::checkPermission('create_filters', 'delete') > 0) {
      $dataRow = ProductFilter::find($id);
      if ($dataRow) {
        $dataRow->delete();
        Session::flash('success', 'Delete successfully');
      }
      return redirect()->route('product_filters');
    } else {
      Session::flash('error', 'Access deny! Please contact with Super Admin.');
      return redirect()->route('product_filters');
    }
  }



  public function assign_product_filters()
  {
    if (UserPermission::checkPermission('assign_filters') > 0) {
      $supplierList = Supplier::where('is_delete', '0')->get();
      $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
      $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
      $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();


      $pFilterColor = ProductFilter::where('type_id', 1)->orderBy('name')->get();
      $pFilterFeatures = ProductFilter::where('type_id', 2)->orderBy('name')->get();
      $pFilterBuy = ProductFilter::where('type_id', 3)->orderBy('name')->get();

      return view('admin.filters.assign_product_filters', [
        'supplierList' => $supplierList,
        'pTypes' => $pTypes,
        'bandList' => $bandList,
        'productList' => $productList,
        'pFilterColor' => $pFilterColor,
        'pFilterFeatures' => $pFilterFeatures,
        'pFilterBuy' => $pFilterBuy,
      ]);
    } else {
      Session::flash('error', 'Access deny! Please contact with Super Admin.');
      return redirect()->route('dashboard');
    }
  }


  public function product_filter_matrix_save(Request $request)
  {
    $inputs = $request->input();

    $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
    $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
    $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
    $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

    $li_product = 0;
    if ($product_ids != 0) {

      foreach ($product_ids as $product_id) {
        if (ProductFilter::update_matrix_product_filter($product_id, $request)) {
          $li_product++;
        }
      }
      Session::flash('success', "Filter assigned successfully  ");
    } elseif (($product_ids != 0) || ($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
      if ($band_ids != 0) {
        $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_ids);
      } else {
        $productList = GuideText::product_list_filter($supplier_id, $product_type_id, $band_ids);
      }
      foreach ($productList as $productRow) {
        if (ProductFilter::update_matrix_product_filter($productRow->id, $request)) {
          $li_product++;
        }
      }

      Session::flash('success', "Filter assigned successfully  ");
    } else {
      Session::flash('error', "You have not made a selection");
    }

    return redirect()->route('assign_product_filters');
    // dd($inputs);
  }

  public function manageColourPalette()
  {
    if (UserPermission::checkPermission('manage_colour_palette') > 0) {
      // $colourPalette = DB::table('v3_product_filters as pf')
      //   ->leftJoin('colour_palette as cp', 'pf.id', '=', 'cp.filter_id')
      //   ->select('pf.*', 'cp.value_colour_palette')
      //   ->where('pf.type_id', '1')
      //   ->orderBy('name')
      //   ->get();
      $colourPalette = ProductFilter::where('type_id', 1)->orderBy('name')->get();
      // dd($colourPalette);
      return view('admin.filters.manage_colour_palette', [
        'colourPalette' => $colourPalette
      ]);
    } else {
      Session::flash('error', 'Access deny! Please contact with Super Admin.');
      return redirect()->route('dashboard');
    }
  }

  public function update_colour_palette($id)
  {
    if (UserPermission::checkPermission('manage_colour_palette') > 0) {

      $colourPalette = ProductFilter::find($id);
      if ($colourPalette->colour_palette == '1') {
        $colourPalette->colour_palette = '0';
      } else {
        $colourPalette->colour_palette = '1';
      }
      // dd($colourPalette);
      if ($colourPalette->save()) {
        echo 1;
      } else {
        echo 0;
      }
    } else {
      Session::flash('error', 'Access deny! Please contact with Super Admin.');
      return redirect()->route('dashboard');
    }
  }
}
