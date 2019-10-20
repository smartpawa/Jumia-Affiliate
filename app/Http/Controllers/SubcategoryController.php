<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
   public function show($slug){
    $subcats=DB::table('subcategories')->inRandomOrder()->paginate(10);

    $index = 0;
    $categoryDetails = DB::table('subcategories')->where('subcategory_slug', $slug)->first();
    $category = $categoryDetails->parent_category_id;


    $name = $categoryDetails->subcategory_name;
    $items = DB::table('products')->where('subcategory_id', $category)->count();

    $categories = DB::table('maincategories')->get();
    $products = DB::table('products')->where('subcategory_id', $category)->paginate(20);



    $categoryCount = categoryCount();;

    //dd($subcategories);
    return view('affiliate.subcategory', compact('subcats','categoryCount','products', 'categories',  'index', 'name', 'items'));


   }

}
