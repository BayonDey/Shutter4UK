<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'v2_categories';
    public $timestamps = false;

    protected $fillable = [
        'name', 'parent_id', 'image_name', 'image_logo', 'description', 'product_type_id', 
        'first_swatch_image', 'second_swatch_image', 'third_swatch_image', 'thumbnail1_description', 
        'thumbnail3_description',  'express_delivery', 'tag_cloud', 'order_no', 'x', 'start_date', 'end_date', 'code', 'discount_text', 'promote_to_front', 'Delivery_Text', 'Delivery_Text_TOP', 'Delivery_Text_BOTTOM', 'productfeature_text_1', 'productfeature_text_2', 'productfeature_text_3', 'productfeature_text_4', 'productfeature_text_5', 'productfeature_text_6', 'productfeature_text_7', 'productfeature_text_8', 'productfeature_text_9', 'productfeature_text_10', 'deleted', 'AltTag_MainImg', 'AltTag_ImgLogo', 'circle_logoimage', 'circle_logoimage_AltTag', 'TagCloudMeasurement', 'TagCloudKeyworkOrPhase', 'TagCloudAreaOrPostCodes', 'first_swatch_UploadPDF', 'second_swatch_UploadPDF', 'third_swatch_UploadPDF', 'textforpdf', 'leftcornerimage', 'AltTag_leftcornerimage', 'leftcornerimagetext', 'collectionlogooption', 'saleimage', 'brandname', 'assigneddeliverydate', 'HolidayLeadText', 'HolidayLeadDate', 'choosetemplateoption', 'assign_template_id', 'louvres_only_available', 'searchrslt', 'op_extra_promo_code', 'mngMessageText', 'mngMessageDate', 'mngMessagechk', 'f_scroll_content', 'f_scroll_image', 'f_footer_scroll'
    ];
}

