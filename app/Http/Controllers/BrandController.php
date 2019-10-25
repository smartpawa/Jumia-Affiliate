<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function show($slug)
    {
        $subcats = DB::table('subcategories')->inRandomOrder()->paginate(14);

        $index = 0;
        $categoryDetails = DB::table('brands')->where('brand_slug', $slug)->first();
        $category = $categoryDetails->id;


        $name = $categoryDetails->brand_name;
        $items = DB::table('products')->where('brand_id', $category)->count();

        $categories = DB::table('maincategories')->get();
        $products = DB::table('products')->where('category_id', $category)->paginate(20);

        //COUNT ITEMS IN CATEGORIES
$categoryCount=categoryCount();
        $cat_id = $category;

        //dd($subcategories);
        return view('affiliate.brand', compact('subcats', 'cat_id', 'categoryCount', 'products', 'categories', 'index', 'name', 'items'));
    }
}
