<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

use App\Model\ProductTemplate;

use App\Model\ProductFields;
use App\Model\TemplateLandingValue;
use App\Model\UserPermission;

class ProductTemplateController extends Controller
{


    public function getProductTemplateList()
    {
        if (UserPermission::checkPermission('product_templates') > 0) {
            $product_templates = ProductTemplate::where('status_deleted', 0)->orderBy('name', 'ASC')->get();

            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.product.pro_template_list', ['product_templates' => $product_templates, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function createProductTemplate()
    {
        if (UserPermission::checkPermission('product_templates', 'add') > 0) {
            $proTemplate['id'] = 0;
            $proTemplate['name'] = '';
            return view('admin.product.pro_template_form', [
                'id' => 0, 'proTemplate' => (object) $proTemplate
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product-template-list');
        }
    }

    public function editProductTemplate($id)
    {
        if (UserPermission::checkPermission('product_templates', 'edit') > 0) {
            $proTemplate = ProductTemplate::find($id);
            $pFields = ProductFields::orderBy('field_name')->get();
            // dd($pFields);
            return view('admin.product.pro_template_form', [
                'id' => $id,
                'proTemplate' => $proTemplate,
                'pFields' => $pFields,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product-template-list');
        }
    }

    public function storeProductTemplate(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
        ]);
        if ($request->id == 0) {
            $create = ProductTemplate::create(['name' => $request->name]);
            $id = $create->id;
            Session::flash('success', 'Template created successfully');
        } else {
            $id = $request->id;
            $proTemplate = ProductTemplate::find($request->id);
            $proTemplate->name = $request->name;
            $proTemplate->save();

            if (isset($request->landFieldId) && (count($request->landFieldId) > 0)) {
                foreach ($request->landFieldId as $rowId => $value) {
                    TemplateLandingValue::where('id', $rowId)->update(['value' => $value]);
                }
            }
            // dd($request->input());

            Session::flash('success', 'Template update successfully');
        }
        return redirect()->route("product_template_edit", $id);
    }

    public function add_field_to_template(Request $request)
    {
        $validate = $request->validate([
            'field_id' => 'required',
            'template_id' => 'required',
        ]);
        $create = TemplateLandingValue::create(['field_id' => $request->field_id, 'template_id' => $request->template_id, 'value' => '']);
        if ($create) {
            Session::flash('success', 'Fild added successfully');
        } else {
            Session::flash('error', 'No data added');
        }
        return redirect()->route('product_template_edit', $request->template_id);
    }


    public function delete_template($id)
    {
        if (UserPermission::checkPermission('product_templates', 'delete') > 0) {
            $delete = ProductTemplate::where('id', $id)->update(['status_deleted' => 1]);
            if ($delete) {
                Session::flash('success', 'Template deleted successfully');
            } else {
                Session::flash('error', 'No data deleted');
            }
            return redirect()->route('product-template-list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product-template-list');
        }
    }

    public function deleteTemplateLandingFields_ajax(Request $request)
    {
        if (isset($request->selectedIds) && (count($request->selectedIds) > 0)) {
            TemplateLandingValue::whereIn('id', $request->selectedIds)->delete();
            Session::flash('success', 'Filds deleted successfully');
        } else {
            Session::flash('error', 'No data selected');
        }
        echo 1;
        // return redirect()->route('product_template_edit', $request->template_id);
    }
}
