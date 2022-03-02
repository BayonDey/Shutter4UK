<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Page;

class ProductTab extends Model
{
    protected $table = 'v2_product_tabs';
    public $timestamps = false;

    protected $fillable = [
        'name', 'product_id', 'page_id', 'order_no'
    ];



    public function pageContent()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }


    public static function getAssignedContentListForProduct($pId)
    {
        $product = Product::find($pId);
        $proTabs = ProductTab::where('product_id', $product->id)->orderBy('order_no')->get();
        $html = '';
        if ((count($product->tabs) > 0)) {
            $html = "<table class='table'>";
            $html .= "<tr><th>Tab Title</th><th>Assigned Content</th><th>Action</th></tr>";
            foreach ($proTabs as $i => $tab) {
                $_SESSION['assign_content'][] = $tab;
                $html .= "<tr>";
                $html .= "<td>$tab->name</td>";
                $html .= "<td>" . $tab->pageContent->title . "</td>";
                $html .= "<td><select class='selectAssignedTab' id='selectAssignedTab_$tab->id'>";
                $html .= "<option value='0'>Select...</option>";
                $html .= "<option value='edit'>Edit</option>";
                $html .= "<option value='delete'>Delete</option>";
                if (count($proTabs) > 1) {
                    if ($i == 0) {
                        $html .= "<option value='down'>Move down</option>";
                    }elseif($i == (count($proTabs) - 1)){
                        $html .= "<option value='up'>Move up</option>";
                    }else{
                        $html .= "<option value='up'>Move up</option>";
                        $html .= "<option value='down'>Move down</option>";
                    }
                }

                $html .= "</select></td></tr>";
            }
            $html .= "<table>";
        } else {
            $html = "<p class='error'>No content tabs have been assigned to this product</p>";
        }
        return $html;
    }

    public static function getAssignedContentListUnsaved($id, $flag, $hitNo)
    {
        $html = '';
        if ($hitNo == 'reload') {
            if ($flag == 'assignContentType') {
                $data = $_SESSION['assign_content']['type'][$id];
            } else {
                $data = $_SESSION['assign_content']['cat'][$id];
            }
            if (count($data) > 0) {
// dd($data);
                $html = "<table class='table'>";
                $html .= "<tr><th>Tab Title</th><th>Assigned Content</th><th>Action</th></tr>";

                foreach ($data as $i => $tab) {
                    // $_SESSION['assign_content'][] = $tab;
                    $html .= "<tr>";
                    $html .= "<td>" . $tab['name'] . "</td>";
                    $html .= "<td>" . Page::find($tab['page_id'])->title   . "</td>";
                    $html .= "<td><select class='selectAssignedTab' id='selectAssignedTab_$i'>";
                    $html .= "<option value='0'>Select...</option>";
                    $html .= "<option value='edit'>Edit</option>";
                    $html .= "<option value='delete'>Delete</option>";
                    // if (count($data) > 1) {
                    //     if ($i == 0) {
                    //         $html .= "<option value='down'>Move down</option>";
                    //     }elseif($i == (count($data) - 1)){
                    //         $html .= "<option value='up'>Move up</option>";
                    //     }else{
                    //         $html .= "<option value='up'>Move up</option>";
                    //         $html .= "<option value='down'>Move down</option>";
                    //     }
                    // }
                    $html .= "</select></td></tr>";
                }
                $html .= "<table>";
            } else {

                $html = "<p class='error'>Unfortunately, as content is saved at product level, existing tabs cannot be retrieved when bulk editing multiple products. 
                All current product content tabs will be over written with any tabs assigned within this window.</p>";
            }
        } else {

            if ($flag == 'assignContentType') {
                $_SESSION['assign_content']['type'][$id] = [];
            } else {
                $_SESSION['assign_content']['cat'][$id] = [];
            }

            $html = "<p class='error'>Unfortunately, as content is saved at product level, existing tabs cannot be retrieved when bulk editing multiple products. 
            All current product content tabs will be over written with any tabs assigned within this window.</p>";
        }
        return $html;
    }
}
