<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{


    public function index()
    {
        $subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('categories')->get();
        $categoryCount = categoryCount();
        $trendingProducts = DB::table('products')->orderBy('visits', 'DESC')->paginate(8);
        return view('affiliate.index', compact('subcats','categoryCount', 'trendingProducts', 'categories', 'index'));
    }
    public function products()
    {
        $subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.products', compact('subcats','products', 'categories', 'categoryCount', 'index'));
    }

    public function show($slug)
    {
        $subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);

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
        $cat_id = $category;

        //dd($subcategories);
        return view('affiliate.category', compact('subcats','cat_id', 'categoryCount', 'subcategories', 'products', 'categories',  'index', 'name', 'items'));
    }


    public function addVisitCount(Request $request)
    {



        $id = $request->id;
        DB::table('products')->where('id', $id)->increment('visits', 1);
    }

    public function popular()
    {
        $subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->orderBy('visits', 'DESC')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.popular', compact('subcats','products', 'categories', 'categoryCount', 'index'));
    }

    public function cheapest()
    {
        $subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);
        $index = 0;
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->orderBy('current_price', 'ASC')->paginate(20);

        $categoryCount = categoryCount();


        return view('affiliate.popular', compact('subcats','products', 'categories', 'categoryCount', 'index'));
    }

    public function search(Request $request)
    {$subcats=DB::table('subcategories')->inRandomOrder()->paginate(14);
        $keyword = $request->input('search');
        $index = 0;
        //return $request->input('search');
        $index = 0;
        $categories = DB::table('categories')->get();
        $keyword = $request->input('search');
        $products = Product::where('product_name', 'like', '%' .$keyword. '%')
<<<<<<< HEAD
                            ->paginate(14);

                            $products->appends (array ('search' => $keyword));
            $categoryCount = categoryCount();
        return view('affiliate.searchproducts', compact('keyword','subcats','products', 'categories', 'categoryCount', 'index'));
=======
                            ->paginate(10);

                            $products->appends (array ('keyword' => $keyword));
            $categoryCount = array();
            foreach ($categories as $category) {
                    $categoryID = $category->id;
                    $categoryCount[] = DB::table('products')->where('category_id', $categoryID)->count();
            }
        return view('affiliate.searchproducts', compact('products', 'categories', 'categoryCount', 'index'));
>>>>>>> cd402777ef2d7115370619255704670a2cac29cb
        //return $products;
        //exit();

    }
}
