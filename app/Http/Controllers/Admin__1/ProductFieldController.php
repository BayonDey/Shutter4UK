<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

use App\Utility;
use App\Model\ProductFields;
use App\Model\UserPermission;

class ProductFieldController extends Controller
{
    public function getProductTemplateFieldList()
    {
        if (UserPermission::checkPermission('product_fields') > 0) {
            $product_fields = ProductFields::orderBy('field_name', 'ASC')->get();

            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.product.product_field_list', ['product_fields' => $product_fields, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function create_field()
    {
        if (UserPermission::checkPermission('product_fields', 'add') > 0) {

            return view('admin.product.product_field_form', ['pField' => (object) []]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('products_field_list');
        }
    }

    public function edit_field($id)
    {
        if (UserPermission::checkPermission('product_fields', 'edit') > 0) {
            $pField = ProductFields::find($id);

            return view('admin.product.product_field_form', ['pField' => $pField]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('products_field_list');
        }
    }

    public function storeProductField(Request $request)
    {
        $inputs = $request->input();

        if ($request->hasFile('FieldImage')) {
            $inputs['FieldImage'] = Utility::saveImage($request->file('FieldImage'), 'v2_product_fields', 'FieldImage');
        }
        $validate = $request->validate(
            [
                'field_name' => 'required',
            ]
        );
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
        }
        $id = 0;
        if ($request->id == null) {
            $create = ProductFields::create($inputs);
            if ($create) {
                $id = $create->id;

                Session::flash('success', 'Field creaeted successfully');
            }
        } else {
            $id = $request->id;
            $ProductFields = ProductFields::find($id);
            unset($inputs['_token']);

            $update = ProductFields::where('id', $request->id)->update($inputs);
            if ($update) {
                if (($ProductFields->FieldImage != '') && ($request->hasFile('FieldImage'))) {
                    Utility::unlinkFile($ProductFields->FieldImage, 'v2_product_fields');
                }
                Session::flash('success', 'Field update successfully');
            }
        }


        return redirect()->route('products_field_list', ['tr' => $id]);
    }

    public function delete_field($id)
    {
        if (UserPermission::checkPermission('product_fields', 'delete') > 0) {
            $delete = ProductFields::find($id)->delete();
            if ($delete) {
                Session::flash('success', 'Field deleted successfully');
            }
            return redirect()->route('products_field_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('products_field_list');
        }
    }
}
