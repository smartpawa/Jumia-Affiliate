<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
   public function show($slug){


    $index = 0;
    $categoryDetails = DB::table('subcategories')->where('subcategory_slug', $slug)->first();
    $category = $categoryDetails->parent_category_id;


    $name = $categoryDetails->subcategory_name;
    $items = DB::table('products')->where('subcategory_id', $category)->count();

    $categories = DB::table('categories')->get();
    $products = DB::table('products')->where('subcategory_id', $category)->paginate(20);




    $categoryCount = array();

    //dd($subcategories);
    return view('affiliate.subcategory', compact('products', 'categories',  'index', 'name', 'items'));


   }

}
