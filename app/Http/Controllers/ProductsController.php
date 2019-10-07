<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products()
    {
        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->paginate(20);

        $categoryCount = array();
        foreach ($categories as $category) {
            $categoryID = $category->id;
            $categoryCount[] = DB::table('products')->where('category_id', $categoryID)->count();
        }


        return view('affiliate.products', compact('products', 'categories', 'categoryCount', 'index'));
    }

    public function show($slug)
    {

        $index = 0;
        $categoryDetails = DB::table('categories')->where('category_slug', $slug)->first();
        $category = $categoryDetails->id;


        $subCategories=DB::table('subcategories')->where('parent_category_id',$category)->get();
        $subcategoryCount = array();
        foreach ($subCategories as $subCategory) {
            $subCategoryID = $subCategory->id;
            $subCategoryCount[] = DB::table('products')->where('subcategory_id', $subCategoryID)->count();
        }

        $name = $categoryDetails->category_name;
        $items = DB::table('products')->where('category_id', $category)->count();

        $categories = DB::table('categories')->get();
        $products = DB::table('products')->where('category_id', $category)->paginate(20);

        $categoryCount = array();
        foreach ($categories as $category) {
            $categoryID = $category->id;
            $categoryCount[] = DB::table('products')->where('category_id', $categoryID)->count();
        }



        $categoryCount = array();


        return view('affiliate.category', compact('subcategoryCount','subCategories','products', 'categories', 'categoryCount', 'index', 'name', 'items'));
    }


    public function addVisit(Request $request)
    { }
}
