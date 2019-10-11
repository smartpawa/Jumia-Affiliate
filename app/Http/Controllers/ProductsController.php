<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function filterProducts(Request $request)
    {
        $products = DB::table('products')->orderBy('current_price', 'ASC')->paginate(20);
        return view('affiliate.filteredproducts', compact('products'));
    }


    public function index()
    {
        $index = 0;
        $categories = DB::table('categories')->get();
        $categoryCount = categoryCount();
        $trendingProducts = DB::table('products')->orderBy('visits', 'DESC')->paginate(12);
        return view('affiliate.index', compact('categoryCount', 'trendingProducts', 'categories', 'index'));
    }
    public function products()
    {
        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.products', compact('products', 'categories', 'categoryCount', 'index'));
    }

    public function show($slug)
    {

        $index = 0;
        $categoryDetails = DB::table('categories')->where('category_slug', $slug)->first();
        $category = $categoryDetails->id;


        $subcategories = DB::table('subcategories')->where('parent_category_id', $category)->get();


        $name = $categoryDetails->category_name;
        $items = DB::table('products')->where('category_id', $category)->count();

        $categories = DB::table('categories')->get();
        $products = DB::table('products')->where('category_id', $category)->paginate(20);



        //COUNT ITEMS IN CATEGORIES
        $categoryCount = categoryCount();


        //dd($subcategories);
        return view('affiliate.category', compact('categoryCount', 'subcategories', 'products', 'categories',  'index', 'name', 'items'));
    }


    public function addVisitCount(Request $request)
    {



        $id = $request->id;
        DB::table('products')->where('id', $id)->increment('visits', 1);
    }

    public function popular()
    {

        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->orderBy('visits', 'DESC')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.popular', compact('products', 'categories', 'categoryCount', 'index'));
    }

    public function cheapest()
    {

        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->orderBy('current_price', 'ASC')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.popular', compact('products', 'categories', 'categoryCount', 'index'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $index = 0;
        //return $request->input('search');
        $categories = DB::table('categories')->get();
        $categoryCount = categoryCount();

        $products = Product::where('product_name', 'like', '%' . $keyword . '%')->paginate(20);
        return view('affiliate.searchproducts', compact('products', 'categoryCount', 'categories', 'index'));
        //return $products;
        //exit();

    }
}
