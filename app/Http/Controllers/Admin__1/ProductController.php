<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Session;
use App\Utility;

class ProductController extends Controller
{
    public function product_category_list()
    {
        return view(
            'admin.products.product_category_list',
            []
        );
    }
}
