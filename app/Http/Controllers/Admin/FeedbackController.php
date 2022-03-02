<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Model\Feedback;
use App\Model\Glossary;
use App\Model\ManageContent;
use App\Model\ProductHomepage;
use App\Model\ProductType;
use App\Model\UserPermission;
use App\Model\Variables;
use App\Utility;

class FeedbackController extends Controller
{
    public  function feedbackList()
    {
        if (UserPermission::checkPermission('customer_feedback') > 0) {
            $feedbackList = Feedback::orderBy('id', 'DESC')->get();
            return view('admin.content.feedback_list', [
                'feedbackList' => $feedbackList
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function feedback_promote_to_front($id)
    {
        $feedData = Feedback::find($id);
        if ($feedData->promote_to_front == 0) {
            $feedData->promote_to_front = 1;
        } else {
            $feedData->promote_to_front = 0;
        }
        if ($feedData->save()) {
            echo 1;
        } else {
            echo 0;
        }
    }


    public function blindsGlossary()
    {
        if (UserPermission::checkPermission('blind_glossary') > 0) {
            $glossaryMain = ManageContent::where('content_key', 'blind_glossary')->first();
            // dd($glossaryMain);
            $glossaryList = Glossary::get();
            return view('admin.content.blinds_glossary', [
                'glossaryMain' => $glossaryMain,
                'glossaryList' => $glossaryList,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }



    public function blindsGlossary_save(Request $request)
    {
        $inputs = $request->input();
        $validate = $request->validate(
            [
                'content_title' => 'required',
                'content_url' => 'required',
                'content_desc' => 'required',
            ]
        );
        $fields['content_title'] = $request->content_title;
        $fields['content_url'] = $request->content_url;
        $fields['content_desc'] = $request->content_desc;
        if ($request->id > 0) {
            $update = ManageContent::where('id', $request->id)->update($fields);
            if ($update) {
                Session::flash('success', 'Glossary update successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        } else {
            Session::flash('error', 'Data not found');
        }
        return redirect()->route('blinds_glossary');
    }


    public function blindsGlossary_child_create()
    {
        if (UserPermission::checkPermission('blind_glossary', 'add') > 0) {
            return view('admin.content.blinds_glossary_child_form');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function blindsGlossary_child_edit($id)
    {
        if (UserPermission::checkPermission('blind_glossary', 'edit') > 0) {
            $glossary = Glossary::find($id);
            return view('admin.content.blinds_glossary_child_form', [
                'glossary' => $glossary
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function blindsGlossary_child_save(Request $request)
    {
        $inputs = $request->input();
        $validate = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );
        $fields['title'] = $request->title;
        $fields['description'] = $request->description;

        if ($request->id == null) {
            $create = Glossary::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Glossary added successfully');
            }
        } else {
            $id = $request->id;
            $update = Glossary::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'Glossary update successfully');
            }
        }
        return redirect()->route('blinds_glossary', ['tr' => $id]);
    }

    public function blindsGlossary_child_delete($id)
    {
        if (UserPermission::checkPermission('blind_glossary', 'delete') > 0) {
            $delete = Glossary::find($id)->delete();
            if ($delete) {
                Session::flash('success', 'Glossary deleted successfully');
            } else {
                Session::flash('error', 'Something wrong');
            }
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
        return redirect()->route('blinds_glossary');
    }

    public function manageHomePage()
    {
        if (UserPermission::checkPermission('manage_home_page') > 0) {

            return view('admin.content.home_page_manage', []);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function productThumbnail()
    {

        if (UserPermission::checkPermission('manage_home_page') > 0) {
            $productTypeList = DB::table('v2_product_homepage as ph')
                ->join('v2_product_types as pt', 'pt.id', '=', 'ph.product_id')
                ->select('pt.pname', 'pt.url', 'ph.*')
                ->whereIN('ph.product_type', ['1', '2'])
                ->where('pt.deleted', '0')
                ->orderBy('orderset')
                ->get();
            return view('admin.content.product_thumbnail', [
                'productTypeList' => $productTypeList
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function update_homepage_image($id, $val)
    {
        $values = ['mng_homepagethumb' => $val];
        if ($val == 'ND') {
            $values['display_homepage'] = '0';
        } else {
            $values['display_homepage'] = '1';
        }
        $update = ProductHomepage::where('id', $id)->update($values);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function homepage_image_ordering($id, $flag)
    {
        if ($flag == 'top') {
            ProductHomepage::where('id', '!=', $id)
                ->update(['orderset' => DB::raw('orderset + 1')]);
            ProductHomepage::where('id', $id)->update(['orderset' => 1]);
        } elseif ($flag == 'up') {
            $pTypeRow = ProductHomepage::find($id);
            $pTypeRow_currentNo = $pTypeRow->orderset;

            $lessOrderType = ProductHomepage::select('id', 'orderset')
                ->where('orderset', '<', $pTypeRow_currentNo)->orderBy('orderset', 'DESC')->first();
            $pTypeRow_previousId = $lessOrderType->id;
            $pTypeRow_previousNo = $lessOrderType->orderset;

            ProductHomepage::where('id', $id)->update(['orderset' => $pTypeRow_previousNo]);
            ProductHomepage::where('id', $pTypeRow_previousId)->update(['orderset' => $pTypeRow_currentNo]);
        } elseif ($flag == 'down') {
            $pTypeRow = ProductHomepage::find($id);
            $pTypeRow_currentNo = $pTypeRow->orderset;

            $lessOrderType = ProductHomepage::select('id', 'orderset')
                ->where('orderset', '>', $pTypeRow_currentNo)->orderBy('orderset')->first();
            $pTypeRow_nextId = $lessOrderType->id;
            $pTypeRow_nextNo = $lessOrderType->orderset;

            ProductHomepage::where('id', $id)->update(['orderset' => $pTypeRow_nextNo]);
            ProductHomepage::where('id', $pTypeRow_nextId)->update(['orderset' => $pTypeRow_currentNo]);
        } elseif ($flag == 'bottom') {
            $li_totalPType = ProductHomepage::count();
            $pTypeRow = ProductHomepage::find($id);
            $pTypeRow_currentNo = $pTypeRow->orderset;

            ProductHomepage::where('id', '!=', $id)->where('orderset', '>', $pTypeRow_currentNo)
                ->update(['orderset' => DB::raw('orderset - 1')]);
            ProductHomepage::where('id', $id)->update(['orderset' => $li_totalPType]);
        }

        return redirect()->route('product_thumbnail');
    }

    public function productThumbnail_edit($id)
    {
        $pThumbnail = ProductHomepage::find($id);
        $pType = ProductType::find($pThumbnail->product_id);
        return view('admin.content.product_thumbnail_form', [
            'pThumbnail' => $pThumbnail,
            'pType' => $pType,
        ]);
    }

    public function productThumbnail_save(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;
        if ($request->id > 0) {
            $pThumbnail = ProductHomepage::find($id);
            if (!empty($pThumbnail)) {
                $old_thumb_image = $pThumbnail->thumb_image;


                $pThumbnail->ALT_tag = $request->ALT_tag;
                $pThumbnail->ALT_tag_desc = $request->ALT_tag_desc;
                $pThumbnail->alt_tag_desc_mobile = $request->alt_tag_desc_mobile;
                $pThumbnail->TotalChar = $request->TotalChar;

                if ($request->hasFile('thumb_image')) {
                    $pThumbnail->thumb_image = Utility::saveImage($request->file('thumb_image'), 'v2_product_homepage', 'thumb_image');
                }
                if ($pThumbnail->save()) {
                    if (($old_thumb_image != '') && ($request->hasFile('thumb_image'))) {
                        Utility::unlinkFile($old_thumb_image, 'v2_product_homepage');
                    }
                    Session::flash('success', 'Data update successfully.');
                }
            } else {
                Session::flash('error', 'Data not found.');
            }
        } else {
            Session::flash('error', 'Data not found.');
        }
        return redirect()->route('productThumbnail_edit', $id);
    }

    public function home_page_slide_form()
    {
        return view('admin.content.home_page_slide_form', []);
    }


    public function thumb_sale_img()
    {
        $thumb_sale_img = Variables::getVariables(['HP_ThumbSaleImgTitle', 'HP_ThumbSaleImg', 'HP_ThumbSaleAlt', 'HP_ThumbSaleoption']);
        // dd($thumb_sale_img);
        return view('admin.content.thumb_sale_img', [
            'thumb_sale_img' => $thumb_sale_img
        ]);
    }

    public function thumb_sale_img_update(Request $request)
    {
        $inputs = $request->input();
        $HP_ThumbSaleImgTitle = $request->HP_ThumbSaleImgTitle;
        $HP_ThumbSaleAlt = $request->HP_ThumbSaleAlt;
        $HP_ThumbSaleoption = $request->HP_ThumbSaleoption;

        Variables::where('name', 'HP_ThumbSaleImgTitle')->update(['value' => $HP_ThumbSaleImgTitle]);
        Variables::where('name', 'HP_ThumbSaleAlt')->update(['value' => $HP_ThumbSaleAlt]);
        Variables::where('name', 'HP_ThumbSaleoption')->update(['value' => $HP_ThumbSaleoption]);
        if ($request->hasFile('HP_ThumbSaleImg')) {
            $HP_ThumbSaleImg = Utility::saveImage($request->file('HP_ThumbSaleImg'), 'variables', 'HP_ThumbSaleImg');
            Variables::where('name', 'HP_ThumbSaleImg')->update(['value' => $HP_ThumbSaleImg]);
        }
        Session::flash('success', 'Data update successfully.');
        return redirect()->route('thumb_sale_img');
    }


    public function big_thumb_sale_img()
    {
        return view('admin.content.big_thumb_sale_img', []);
    }


    public function top_slider_img()
    {
        return view('admin.content.top_slider_img', []);
    }
}
