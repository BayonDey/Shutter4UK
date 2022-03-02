<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Utility;
use App\Model\BlogCategory;
use App\Model\BlogCatMap;
use App\Model\BlogPgTemplate;
use App\Model\BlogPost;
use App\Model\UserPermission;

class BlogController extends Controller
{
    public function manageHomepage()
    {
        if (UserPermission::checkPermission('blog_homepage') > 0) {
            return view('admin.blog.blog_homepage');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    //================== START :: BLOG CATEGORY ++++++++++++++++++++++//
    public function blogCatList()
    {
        if (UserPermission::checkPermission('blog_categories') > 0) {
            $blogCats = BlogCategory::orderBy('cat_name')->get();
            return view('admin.blog.blog_cat_list', [
                'blogCats' => $blogCats,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function blogCatCreate()
    {
        if (UserPermission::checkPermission('blog_categories', 'add') > 0) {
            return view('admin.blog.blog_cat_form');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_cat_list');
        }
    }

    public function blogCatEdit($template_id)
    {
        if (UserPermission::checkPermission('blog_categories', 'edit') > 0) {
            $blogCat = BlogCategory::where('template_id', $template_id)->first();
            return view('admin.blog.blog_cat_form', ['blogCat' => $blogCat]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_cat_list');
        }
    }

    public function blogCat_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'title' => 'required',
                'cat_name' => 'required',
                'url' => 'required',
            ]
        );

        $fields['title'] = $request->title;
        $fields['cat_name'] = $request->cat_name;
        $fields['url'] = $request->url;
        $fields['description'] = ($request->description == null) ? '' : $request->description;

        if ($request->hasFile('img_name')) {
            $fields['img_name'] = Utility::saveImage($request->file('img_name'), 'blog_category_tbl', 'img_name');
        }

        if ($request->id == null) {
            $fields['date_time'] = date('Y-m-d H:i:s');
            $create = BlogCategory::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Blog category added successfully');
            }
        } else {
            $id = $request->id;
            $cat = BlogCategory::where('template_id', $id)->first();
            $old_img_name = $cat->img_name;
            $update = BlogCategory::where('template_id', $id)->update($fields);
            if ($update) {
                if (($old_img_name != '') && ($request->hasFile('img_name'))) {
                    Utility::unlinkFile($old_img_name, 'blog_category_tbl');
                }
                Session::flash('success', 'Blog category update successfully');
            }
        }
        return redirect()->route('blog_cat_list', ['tr' => $id]);
    }

    public function blogCatDelete($template_id)
    {
        if (UserPermission::checkPermission('blog_categories', 'delete') > 0) {
            $cat = BlogCategory::where('template_id', $template_id)->first();
            if ($cat->stats_deleted == 0) {
                $val['stats_deleted'] = 1;
            } else {
                $val['stats_deleted'] = 0;
            }
            $update = BlogCategory::where('template_id', $template_id)->update($val);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_cat_list');
        }
    }

    //================== END :: BLOG CATEGORY ++++++++++++++++++++++//

    //================== START :: BLOG POST ++++++++++++++++++++++//

    public function blogPostList()
    {
        if (UserPermission::checkPermission('blog_posts') > 0) {
            $blogposts = BlogPost::where('stats_deleted', 0)->orderBy('template_id', 'DESC')->get();
            return view('admin.blog.blog_post_list', [
                'blogposts' => $blogposts,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function blogPostCreate()
    {
        if (UserPermission::checkPermission('blog_posts', 'add') > 0) {
            $blogCats = BlogCategory::where('stats_deleted', 0)->get();
            return view('admin.blog.blog_post_form', [
                'blogCats' => $blogCats,
                'blogCatIds' => [],
                'blogTemps' => [],
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_post_list');
        }
    }


    public function blogPostEdit($template_id)
    {
        if (UserPermission::checkPermission('blog_posts', 'edit') > 0) {
            $blogpost = BlogPost::where('template_id', $template_id)->first();
            $blogCats = BlogCategory::where('stats_deleted', 0)->get();
            $blogCatsMap = BlogCatMap::select(DB::raw('group_concat(category_id) as category_ids'))
                ->where('blog_id', $template_id)->first();
            $blogCatIds = explode(",", $blogCatsMap->category_ids);

            $blogTemps = BlogPgTemplate::where('template_id', $template_id)->get();
            // dd($blogCatIds);
            return view('admin.blog.blog_post_form', [
                'blogpost' => $blogpost,
                'blogCats' => $blogCats,
                'blogCatIds' => $blogCatIds,
                'blogTemps' => $blogTemps,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_post_list');
        }
    }


    public function blogPost_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        // dd($inputs);
        $validate = $request->validate(
            [
                'title' => 'required',
                'url' => 'required',
                'description' => 'required',
                'bytext' => 'required',
                'meta_robots' => 'required',
            ]
        );

        $fields['title'] = $request->title;
        $fields['url'] = $request->url;
        $fields['description'] = $request->description;
        $fields['bytext'] = $request->bytext;
        $fields['meta_robots'] = ($request->meta_robots == null) ? '' : 'IndexFollow';
        $fields['promote_to_front'] = $request->promote_to_front;

        $catIds = (isset($request->catId)) ? $request->catId : [];


        $template_title = $request->template_title;
        $template_description = $request->template_description;
        $temp_footer_desc = $request->temp_footer_desc;
        if ($request->hasFile('template_image')) {
            $template_image = $request->file('template_image');
        }

        $e_template_title = $request->e_template_title;
        $e_template_description = $request->e_template_description;
        $e_temp_footer_desc = $request->e_temp_footer_desc;
        if ($request->hasFile('e_template_image')) {
            $e_template_image = $request->file('e_template_image');
        }

        if ($request->hasFile('img_name')) {
            $fields['img_name'] = Utility::saveImage($request->file('img_name'), 'blog_page_templates', 'img_name');
        }

        if ($request->id == null) {
            $fields['date_time'] = date('Y-m-d H:i:s');
            $create = BlogPost::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Blog added successfully');
            }
        } else {
            $id = $request->id;
            $post = BlogPost::where('template_id', $id)->first();
            $old_img_name = $post->img_name;
            $update = BlogPost::where('template_id', $id)->update($fields);
            if ($update) {
                if (($old_img_name != '') && ($request->hasFile('img_name'))) {
                    Utility::unlinkFile($old_img_name, 'blog_page_templates');
                }
                Session::flash('success', 'Blog update successfully');
            }
        }
        BlogCatMap::where('blog_id', $id)->delete();
        if (count($catIds) > 0) {
            foreach ($catIds as $catid) {
                BlogCatMap::create(['blog_id' => $id, 'category_id' => $catid]);
            }
        }

        if (count($template_title) > 0) {
            foreach ($template_title as $key => $rowTemp) {
                if ($rowTemp != '') {
                    $tempFilds['template_id'] = $id;
                    $tempFilds['template_title'] = $rowTemp;
                    $tempFilds['template_description'] = ($template_description[$key] == null) ? '' : $template_description[$key];
                    $tempFilds['temp_footer_desc'] = ($temp_footer_desc[$key] == null) ? '' : $temp_footer_desc[$key];

                    if (isset($template_image[$key])) {
                        $tempFilds['template_image'] = Utility::saveImage($template_image[$key], 'pg_templates', 'template_image');
                    }
                    BlogPgTemplate::create($tempFilds);
                }
            }
        }
// dd($e_template_image);
        if ((isset($e_template_title)) && (count($e_template_title) > 0)) {
            foreach ($e_template_title as $key => $rowTemp) {
                if ($rowTemp != '') {
                    $tempFilds['template_id'] = $id;
                    $tempFilds['template_title'] = $rowTemp;
                    $tempFilds['template_description'] = ($e_template_description[$key] == null) ? '' : $e_template_description[$key];
                    $tempFilds['temp_footer_desc'] = ($e_temp_footer_desc[$key] == null) ? '' : $e_temp_footer_desc[$key];

                    if (isset($e_template_image[$key])) {
                        $tempFilds['template_image'] = Utility::saveImage($e_template_image[$key], 'pg_templates', 'template_image');
                    }
                    BlogPgTemplate::where('id', $key)->update($tempFilds);
                }
            }
        }

        return redirect()->route('blog_post_list', ['tr' => $id]);
    }


    public function blogPostPromote($template_id)
    {
        $post = BlogPost::where('template_id', $template_id)->first();
        if ($post->promote_to_front == 't') {
            $val['promote_to_front'] = 'f';
        } else {
            $val['promote_to_front'] = 't';
        }
        $update = BlogPost::where('template_id', $template_id)->update($val);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function blogPostDelete($template_id)
    {
        if (UserPermission::checkPermission('blog_posts', 'edit') > 0) {
            $post = BlogPost::where('template_id', $template_id)->first();

            $val['stats_deleted'] = 1;

            $update = BlogPost::where('template_id', $template_id)->update($val);
            if ($update) {
                Session::flash('success', 'Delete successfully.');
            } else {
                Session::flash('error', 'Something wrong.');
            }
            return redirect()->route('blog_post_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('blog_post_list');
        }
    }
}
